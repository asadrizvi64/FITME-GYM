
<html>
<head>
  <title>Registration</title>

  <style>

    .bgsquare {
      position: absolute;
      top: 18%;
      left: 34%;
      width: 30%;
      height: 63%;
      background-color: #FFD700	;
      border-radius: 20px;
      background-image:linear-gradient(#FFA300, #FFD700);
    }
      
    .backgroundwhole
    {
      position: absolute;
      background-color: #333;
      top: 0%;
      left: 0%;
      width: 100%;
      height: 100%;
    }

    .navbar {
      overflow: hidden;
      background-color: transparent;
      position: fixed;
      top: 0;
      left: 33%;
      width: 100%;
    }

    .navbar a {
      float: left;
      text-align: center;
      padding: 16px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar a:hover {
      background: #ffc506;
      color: #413d3d;
    }

    @function remy($value) {
      @return ($value / 16px) * 1rem;
    }
    body {
      font: 100% / 1.414 "Open Sans", "Roboto", arial, sans-serif;
      background: #e9e9e9;
    }
    a,
    [type="submit"] {transition: all .25s ease-in;}
    .signup__container {
      position: absolute;
      top: 50%;
      right: 0;
      left: 0;
      margin-right: auto;
      margin-left: auto;
      transform: translateY(-50%);
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      width: remy(800px);
      height: remy(480px);
      border-radius: remy(3px);
      box-shadow: 0px remy(3px) remy(7px) rgba(0,0,0,.25);
    }
    .signup__overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,.76);
    }
    .container__child {
      width: 30%;
      color: #fff;
    }

    .heading--primary {font-size: 1.999rem;}
    .heading--secondary {font-size: 1.414rem;}
    .thumbnail__links {
      align-self: flex-end;
      width: 100%;
    }
    .thumbnail__links a {
      font-size: 1rem;
      color: #fff;
      &:focus,
      &:hover {color: rgba(255,255,255,.5);}
    }
    .signup__form {
      padding: 2.5rem;
      background: #fafafa;
    }
    lyr_label {

      font-size: 1.0rem;
      text-transform: uppercase;
      color: #EEFFEE;
    }
    .form-control {
      background-color: transparent;
      border-top: 0;
      border-right: 0;
      border-left: 0;
      border-radius: 0;
      &:focus {border-color: #111;}
    }
    [type="text"] {color: #111;}
    [type="password"] {color: #111;}
    .btn--form {
      padding: .5rem 2.5rem;
      font-size: .95rem;
      font-weight: 600;
      text-transform: uppercase;
      color: #fff;
      background: #111;
      border-radius: remy(35px);
      &:focus,
      &:hover {background: lighten(#111, 13%);}
    }
    .signup__link {
      font-size: .8rem;
      font-weight: 600;
      text-decoration: underline;
      color: #999;
      &:focus,
      &:hover {color: darken(#999, 13%);}
    }


  .wrap1 {
  height: 100%;
  position: absolute;
  top:91%;
  width: 50%;
  left: 35%;
  display: flex;
  align-items: right;
  justify-content: right;
}

.button {
  width: 120px;
  height: 30px  ;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  }

.button:hover {
  background-color: red;
  box-shadow: 0px 15px 20px  #413d3d;
  color: #fff;
  transform: translateY(-7px);
}
  </style>
</head>

<body>
<div class="backgroundwhole"></div>
<div class="bgsquare"></div>
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
?>

<div class="navbar"><img src="Pictures/logo_w.png" class="Home_screen_logo"></div>
<div class="signup__container">
  <div class="container__child signup__thumbnail">
    <form action="" method="POST">
      <div class="form-group">
        <lyr_label for=  "Name">Name---------------------------</lyr_label>
        <input class="form-control" type="text" name="Mem_name" placeholder="" required /> <br />
      </div>
      </br>
      <div class="form-group">
        <lyr_label for="Contact Number">Contact Number-------</lyr_label>
        <input class="form-control" type="text" name="Mem_Cnumber"  required /> <br />
      </div>
      </br>
      <div class="form-group">
        <lyr_label for="Age">Age-----------------------------</lyr_label>
        <input type="number" min="13" name="Mem_age" required/><br />
      </div>
      </br>
      <div class="form-group">
        <lyr_label for="Gender">Gender---------------------</lyr_label>
        <input type="radio" name="Mem_Gender" value="M" required> <b> Male </b>
        <input type="radio" name="Mem_Gender" value="F"> Female
        <input type="radio" name="Mem_Gender" value="O"> Other<br /></br>
      </div>
      <div class="form-group">
        <lyr_label for="Email">Email--------------------------</lyr_label>
        <input type="text" name="Mem_Email" required/><br /></br>
      </div>
      <div class="form-group">
        <lyr_label for="Password">Password-----------------</lyr_label>
        <input type="password" name="Mem_Password" required/><br /></br>
    </div>
    <div class="form-group">
      <lyr_label for=" Confirm Password">Confirm Password--</lyr_label>
      <input type="password" name="Mem_Cpassword" required/><br /></br>
    </div>
    <div class="form-group">
      <lyr_label for=" Joining Date">Joining Date---------------</lyr_label>
      <input type="text" value="" name="Mem_Date" placeholder="dd/mm/yyyy" required/><br /></br>
    </div>
    <!--<input type="submit" value="Sign Up" name="Submit"/>-->
    <div class="wrap1">
      <button class="button" name="Submit" >Sign-up</button>
    </div>
  </form>
  </div>
</div>

<?php
if(isset($_POST['Submit'])) 
    {
      $data = $_POST;
      $m_name=$data['Mem_name'];
      $m_gender=$data['Mem_Gender'];
      $m_age=$data['Mem_age'];
      $m_cnum=$data['Mem_Cnumber'];
      $m_date=$data['Mem_Date'];
      $m_email=$data['Mem_Email'];
      $m_pass=$data['Mem_Password'];
      $m_cpass=$data['Mem_Cpassword'];
      $m_pay=0;
      if ($m_pass !== $m_cpass) 
      {
        die('Password and Confirm password should match!');   
      }
      $query = "INSERT INTO MEMBERS
                values (mem_id_se.NEXTVAL,'$m_name','$m_gender','$m_age','$m_cnum',to_date('".$m_date."','dd/mm/yy'),'$m_email','$m_pass','$m_pay') ";
      $query_id = oci_parse($con, $query);
      $result = oci_execute($query_id);
      if ($result) 
      {
        header("Location: home.html");
        exit();
      }
      else 
      {
        echo "Insertion NOT Successful.";
      }
  }
?>
</body>
</html>