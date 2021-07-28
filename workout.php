<?php
  $db_sid = 
  "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-S7Q08M5)(PORT = 1521))
    (CONNECT_DATA =
    (SERVER = DEDICATED)
    (SERVICE_NAME = XE)))";
  $db_user = "System";
  $db_pass = "Moizmoiz1";
  $con = oci_connect($db_user,$db_pass,$db_sid); 
  if($con) 
  { /*echo "Oracle Connection Successful.";*/ } 
  else 
    { die('Could not connect to Oracle: '); }

  session_start();
  $em = $_SESSION['lg-email'];
  $pa = $_SESSION['lg-pass'];
  $sql_query = "SELECT Mem_ID AS MEMID FROM MEMBERS WHERE Email='$em' AND Password='$pa' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'MEMID', $mem_id);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);

  $sql_query = "SELECT name AS NAME FROM MEMBERS WHERE Mem_ID='$mem_id' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'NAME', $mem_name);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);

  $sql_query = "SELECT age AS AGE FROM MEMBERS WHERE Mem_ID='$mem_id' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'AGE', $mem_age);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);


  $sql_query = "SELECT gender AS GENDER FROM MEMBERS WHERE Mem_ID='$mem_id' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'GENDER', $mem_gender);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);

  $sql_query = "SELECT Conctact_Number AS CONTACT FROM MEMBERS WHERE Mem_ID='$mem_id' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'CONTACT', $mem_number);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);


  $sql_query = "SELECT Monthly_Payment AS MP FROM MEMBERS WHERE Mem_ID='$mem_id' ";
  $stmt= oci_parse($con, $sql_query);
  oci_define_by_name($stmt, 'MP', $mem_fee);
  oci_execute($stmt);
  $arrm=oci_fetch_array($stmt);
?>


<!doctype html>
<html>
<head>
  <title>Workout</title>
</head>
<body>

  <h1>Your Curent Workout Plan</h1>
  <?php
    $query2 = oci_parse($con,  "SELECT * FROM WORKOUT_PLAN WHERE Mem_ID='$mem_id'");
    oci_execute($query2);
    while($row = oci_fetch_array($query2))
    {?>
      <?php echo $row[1]; echo "   "; ?>
      <?php echo $row[2]; echo "   ";?>
      <?php echo $row[3]; echo "   ";?>
      <?php echo $row[4]; echo "   ";?></br>
    
      <?php 
    } 
  ?>


  
  

  <?php
    $query2 = oci_parse($con,  "SELECT * FROM EXERCISE WHERE PlanID='$mem_id'");
    $r = oci_execute($query2);
    while($row = oci_fetch_array($query2))
    {?>
      <?php echo $row[1]; echo "   "; ?>
      <?php echo $row[2]; echo "   ";?>
      <?php echo $row[3]; echo "   ";?>
      <?php echo $row[4]; echo "   ";?></br>
      <?php 
    }
  ?>

  <?php
    $sql_query = "SELECT TrainerID AS tid FROM WORKOUT_PLAN WHERE Mem_ID='$mem_id' ";
    $stmt= oci_parse($con, $sql_query);
    oci_define_by_name($stmt, 'tid', $tid);
    oci_execute($stmt);
    $arrm=oci_fetch_array($stmt);
  ?>

  <?php
    $query2 = oci_parse($con,  "SELECT * FROM TRAINER WHERE TrainerID='$tid'");
    $r = oci_execute($query2);
    while($row = oci_fetch_array($query2))
    {?>
      <?php echo $row[1]; echo "   "; ?>
      <?php echo $row[2]; echo "   ";?>
      <?php echo $row[3]; echo "   ";?>
      <?php echo $row[4]; echo "   ";?></br>
      <?php 
    }
  ?>




  <h2>MAKE YOUR OWN PLAN</h2>
  <div class="Workout_info">
    <form action="" method="POST">
    <label>MAKE YOUR OWN PLAN</label></br>
      <input type="radio" name="trainer_info" value="1" required> Trainer: None, Fee: 0, Gender: None</br>
      <input type="radio" name="trainer_info" value="2" required> Trainer: Muhammad Khan, Fee: 2000, Gender: Male</br>
      <input type="radio" name="trainer_info" value="3" required> Trainer: Asim Riaz, Fee: 5000, Gender: Male</br>
      <input type="radio" name="trainer_info" value="4" required> Trainer: Moiz Gohar, Fee: 4000, Gender: Male</br>
      <input type="radio" name="trainer_info" value="5" required> Trainer: Manahil Kashif, Fee: 6000, Gender: Female</br>
      
      <label for="w_type">Choose Your Plan:</label>
      <select name="w_type" id="w_type">
        <option value="Strength Training ">Building Muscle</option>
        <option value="Weight Loss">Weight Loss</option>
        <option value="Endurance Training">Endurance Training</option>
        <option value="Balanced Training ">Balanced Training</option>
      </select>
      </br>

      <label for="w_diet">Choose Your diet:</label>
      <select name="w_diet" id="w_diet">
        <option value="Kito">Kito</option>
        <option value="Paleo">Paleo</option>
        <option value="Low carb">Low carb</option>
        <option value="Vegan">Vegan</option>
        <option value="Gluten free">Gluten free</option>
        <option value="Low sugar">Low sugar</option>
        <option value="Protien">Protien</option>
      </select>
      </br>
      <input type="submit" value="submit/update" name="submit"/>
    </form>


    <div class="Exercise_info">
    <form action="" method="POST">
    <label>ADD EXERCISE</label></br>
      Name: <input type="text" name="E_name" placeholder="Name" required/>
      Equipment: <input type="text" name="E_equipment" min="0" placeholder="Name" required/>
      Reps: <input type="number" name="E_reps" min="0" placeholder="0" required/>
      Sets: <input type="number" name="E_sets" min="0" placeholder="0"  required/>
      <input type="submit" value="Add" name="Add"/>
    </form>
  </div>

  <h3>CHOOSE A PRE MADE PLAN</h3>
  

  <div class="premade_info">
    <form action="" method="POST">
    <label>Select pre made plan</label></br>
      <input type="number" name="premadeplan" min=1 max=5 placeholder="1-5">
      <input type="submit" value="Premade" name="premade"/>
    </form>
  </div>



<?php

  if(isset($_POST['submit'])) 
  {
      $data = $_POST;
      $trainer=$data['trainer_info'];
      $wtype=$data['w_type'];
      $wdiet=$data['w_diet'];
      $planid=$mem_id;
      $trainer_money;
      if($trainer == 1)
      {
        $trainer_money=0;
      }
      if($trainer == 2)
      {
        $trainer_money=2000;
      }
      if($trainer == 3)
      {
        $trainer_money=5000;
      }
      if($trainer == 4)
      {
        $trainer_money=4000;
      }
      if($trainer == 5)
      {
        $trainer_money=6000;
      }

      $query = "UPDATE MEMBERS SET Monthly_Payment='$trainer_money'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      //$result = oci_execute($query_id);

      $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      //$result = oci_execute($query_id);

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      //$result = oci_execute($query_id);

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','$trainer','$wdiet','$wtype')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      //$result = oci_execute($query_id);
      if ($result) 
      {
        echo "inserted";
      }
      else 
      {
        echo "not inserted";
      }
  }


  if(isset($_POST['Add'])) 
  {
    $data = $_POST;
    $E_name = $data['E_name'];
    $E_equipment=$data['E_equipment'];
    $E_reps=$data['E_reps'];
    $E_sets=$data['E_sets'];
    $planid=$mem_id;
    $query = "INSERT INTO EXERCISE
              values('$E_name','$planid','$E_equipment','$E_reps','$E_sets')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);
      if ($result) 
      {
        echo "inserted";
      }
      else 
      {
        echo "not inserted";
      }*/

  }

  if(isset($_POST['premade']))
  {
    $data=$_POST;
    $choice=$data['premadeplan'];
    $planid=$mem_id;
    
    
    
    if($choice==1)
    {
      $query = "UPDATE MEMBERS SET Monthly_Payment='0'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/


      $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','1,'Keto','Building Muscle')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO EXERCISE
                values('Push Ups','$planid','5kg weighted vest','10','3')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/
    }
    
    
    if($choice==2)
    {
      $query = "UPDATE MEMBERS SET Monthly_Payment='2000'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

       $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','2','High Protein','Weight Loss')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO EXERCISE
      values('Pull ups','$planid','None','10','3')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/
    }
    
    
    if($choice==3)
    {
      $query = "UPDATE MEMBERS SET Monthly_Payment='5000'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

       $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','3','Vegan','Building Muscle')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO EXERCISE
      values('Burpees','$planid','None','15','2')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/
    }
    
    
    if($choice==4)
    {
      $query = "UPDATE MEMBERS SET Monthly_Payment='4000'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

       $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','4','Low sugar','Endurance Training')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

       $query = "INSERT INTO EXERCISE
                values('Lunges','$planid','10kg Bar','25','1')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/
    }
    
    
    if($choice==5)
    {
      $query = "UPDATE MEMBERS SET Monthly_Payment='6000'  WHERE Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

       $query = "DELETE FROM EXERCISE Where PlanID='$mem_id'";
       echo $query;
       $query_id = oci_parse($con, $query);
       echo $query_id;
       /*$result = oci_execute($query_id);*/

      $query = "DELETE FROM WORKOUT_PLAN Where Mem_ID='$mem_id'";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO WORKOUT_PLAN
                values('$planid','$mem_id','5','Protien','Balanced Training')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
       /*$result = oci_execute($query_id);*/

      $query = "INSERT INTO EXERCISE
                values('Bicep curls','$planid','12kg Dumbells x2','8','3')";
      echo $query;
      $query_id = oci_parse($con, $query);
      echo $query_id;
      /*$result = oci_execute($query_id);*/
    }

  }
?>


</body>
</html>
