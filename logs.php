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
    { echo "Oracle Connection Successful."; 
  } 
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
  <title>Logs</title>
	
	<style>
    
    .Home_screen_logo
{
    position: absolute;
    
    top: 10%;
    width: 10%;
    left: 89%;
}


.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ffc506;
  color: #413d3d;
}
/* 
.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; 
}*/

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #ffc506da;
  border-right: none;
  padding: 5px;
  height: 35px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #ffc506da;
}

.searchButton {
  width: 40px;
  height: 35px;
  border: 1px solid #ffc506da;
  background: #ffc506;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}


.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

	body {
  	margin: 0;
  	font-family:  Century Gothic, sans-serif;
    background-color: #555;    }
		
		h1{
			color: white;
			font-size: 50px;
			text-align: center;
		}
		.Log_form{
		position: fixed;
		align-items: center;
		font-size: 29px;
		top: 30%;
		left: 13%;
		color: white;
		font-weight: bolder;
		}
		.Log_form input {
  		left: 0;
  		border: 0;
  		border-radius: 5px;
  		background: #232323;
  		outline: 0;
  		padding: 2em 1em 1em 1em;
 		color: white;
  		font-size: 14px ;
		}
		.reset_form form{
			position: fixed;
			top: 40%;
			left: 50%
		}
		.reset_form input{
		border: 0;
  		border-radius: 5px;
  		background: #232323;
  		outline: 0;
  		padding: 1em 1em 1em 1em;
 		color: white;
  		font-size: 18px ;
		}	
		
		
	</style>
</head>
<body>

  <div class="Log_form">
  <form action="" method="POST">
    WEIGHT: <input type="number" name="weight" min="0" max="200" step=".01" placeholder="0.00 kg" required/>
    BMI RATE: <input type="number" name="bmi_rate" min="0" placeholder="0.00" step=".01" required/>
    MUSCLE GAIN: <input type="number" name="muscle_gain" min="0" placeholder="0.00 in" step=".01" required/>
    <!--CURRENT DATE: <input type="text" value="" name="curr_date" placeholder="dd/mm/yyyy" required/>-->
    <input style="position: fixed; left: 44%; top: 40%; font-size: 18px ;padding: 1em 1em 1em 1em; " type="submit" value="Insert" name="Submit"/>
    </form>
  </div>
  <div class="navbar">
    
    <img src="Pictures/logo_w.png" class="Home_screen_logo">  
    <a href="#Dashboard">Dashboard</a>
    <a href="#Logs">Logs</a>
    <a href="#Workout plan">Workout plan</a>
    <div class="wrap">
    <div class="search">
               <input type="text" class="searchTerm" placeholder="Discover..">
               <button type="submit" class="searchButton">
                 <i class="fa fa-search"></i>
              </button>
            </div>
     </div>    
  </div>


  <div class="reset_form">
    <form action="" method="POST">
      <input type="submit" value="Reset" name="Reset"/>
  </form>
  </div>

  </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  <?php
    $query2 = oci_parse($con,  "SELECT * FROM LOGS WHERE Mem_ID='$mem_id'");
    $r = oci_execute($query2);
    while($row = oci_fetch_array($query2))
    {?>
      <?php echo "WEIGHT: "; echo $row[1]; echo "-----"; ?>
      <?php echo "BMI RATE:"; echo $row[2]; echo "-----";?>
      <?php echo "BMI RATE:"; echo $row[3]; echo "-----";?>
      <?php echo "MUSCLE GAIN:"; echo $row[4]; echo "";?></br>
    
      <?php 
    } 
    ?>
  

  <?php
if(isset($_POST['Submit'])) 
    {
      /*to_date('".$m_date."','dd/mm/yy'*/
      $data = $_POST;
      $weight=$data['weight'];
      $bmi_rate=$data['bmi_rate'];
      $muscle_gain=$data['muscle_gain'];
      /*$cur_date=$data['curr_date'];*/
      $query = "INSERT INTO LOGS
                values ('$mem_id','$weight','$bmi_rate','$muscle_gain',SYSDATE) ";
      /*echo $query;*/
      $query_id = oci_parse($con, $query);
      $result = oci_execute($query_id);
      if ($result) 
      {
        header('Location: logs.php');
      }
      else 
      {
        echo "not inserted";
      }
    }


    if(isset($_POST['Reset'])) 
    {
      $query3 = "DELETE FROM LOGS WHERE Mem_ID='$mem_id'";
      echo $query3;
      $query_id = oci_parse($con, $query3);
      $result = oci_execute($query_id);
      if ($result) 
      {
        header('Location: logs.php');
      }
      else 
      {
        echo "not reset";
      }
    }
?>



</body>
</html>