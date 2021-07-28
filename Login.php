<!doctype html>
<html>
<head>
  <title>Login</title>
</head>
<style>
  /*
  FITME TOP BAR
  */


<meta name="viewport" content="width=device-width, initial-scale=1">

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 10%;
}
.imag {
    /*opacity: 0.5; */
    background-repeat: no-repeat;
    background-size: 100% 100%;
    border-radius: 12px;
    max-width: 100%;
    display: block;
    height: auto
}
/*
BUTTON
*/
html, body {
  height: 100%;
  top: 100px;
  left: 2px;

}

.wrap {
  height: 100%;
  position: absolute;
  top:30%;
  width: 60%;
  left: 0%;
  display: flex;
  align-items: left;
  justify-content: left;
}


.button {
  width: 140px;
  height: 40px;
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  }

.button:hover {
  background-color: #ffc506da;
  box-shadow: 0px 15px 20px  #413d3d;
  color: #fff;
  transform: translateY(-7px);
}

 * {
  box-sizing: border-box;
  margin: 5px;
  padding: 0px;

  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Ubuntu, "Helvetica Neue", sans-serif;
}


:root {
  --border-width: 3px;

  --bkg-color: #DBE8D8;
  --accent-color: #000;
/*  background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);*/
}

body {
  background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
}

.card {
    border-radius: 12px
}

.card1 {
    background-image: url("Pictures/Qpbwdo.jpg");
    margin-top: 20px
}

.Home_screen_logo
{
    position: absolute;
    top: 15%;
    width: 20%;
    left: 67%;
}


.second {
    background: #DBE8D8;
    border-radius: 12px
}

.welcome {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
    font-size: 23px;
    font-weight:
}



.under {
    font-size: 8px;
    color: #413d3d;
    padding-top: 40px
}

.lower {
    font-size: 8px;
    color: #42A5F5;
    position: relative;
    top: 90%
    left: 50%;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: var(--bkg-color);
}
/*
Text fields
*/
.wrapper {
  display: block;
  position: relative;
  width: 300px;
}


.textfield {
  padding: 10px;

  border: var(--border-width) solid var(--accent-color);
  border-radius: 5px;

  background-color: var(--bkg-color);
  width: 96%;
  outline: none;

  font-size: 16px;
}


.placeholder {
  position: absolute;
  left: 9px;
  top: 13px;
  padding: 0 4px;
  color: var(--accent-color);

  background-color: var(--bkg-color);
  transform-origin: top left;
  transition: all 120ms ease-in;
}

.textfield:focus + .placeholder, .textfield:not(:placeholder-shown) + .placeholder {
  top: -5px;
  transform: scale(0.8);
  font-weight: bold;
}

</style>
<body>

<div>
<img src="Pictures/GYM.jpg" class= "imag">
</div>  

  <div class="card p-5 card1 container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row no-gutters">                    
                      <img src="Pictures/logo_w.png" class="Home_screen_logo"></div>
                    <div class="col-md-6 second pl-4 pr-4">
                        <h2 class="welcome text-primary">Welcome</h2>
                        <br>
                        <div class="col-md-6 second pl-4 pr-4">
                        <h4>Your personal fitness companion :)<h4>
                        </div>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                          <label class="wrapper">
                            <input type="text" class="textfield" name="lg-email"   required>
                            <span class="placeholder">Email</span>
                             <!--        <input type="input" class="textfield" placeholder=" "/>!-->
                         <label>
                          <label class="wrapper">
                            <input type="password" class="textfield" name="lg-pass"   required>
                              <span class="placeholder">Password</span>
                              <!--        <input type="input" class="textfield" placeholder=" "/>!-->
                          <label>
                         <div class="wrap">
                          <button class="button" name="submit" >Sign-in</button>
                        </div>
                      </form>
                        <div class="wrap1">
                        </div><br></br><br></br><!--
                        <div class="row">
                            <div class="col-sm-4 under">
                            </div>
                            <div class="col-sm-4 under">
                            </div>
                            <div class="col-md-1	">
                                <p> </p>
                            </div>
                        </div> !-->
                    </div>
                    <div class="col-md-2">
                        <p class="lower">FITME 2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>				                            
</body>
</html>


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


  
  if(isset($_POST['Register'])){
    header('Location: Registration.php');
  }
  if(isset($_POST['submit']))
  {
    $email = $_POST['lg-email'];
    $pass = $_POST['lg-pass'];

    $sql_query = "SELECT Mem_ID AS MEMID FROM MEMBERS WHERE Email='$email' AND Password='$pass' ";
    $stmt= oci_parse($con, $sql_query);
    /*echo $sql_query;*/
    oci_define_by_name($stmt, 'MEMID', $mem_id);
    oci_execute($stmt);
    $arrm=oci_fetch_array($stmt);
    /*echo $mem_id;*/

    if ($mem_id) 
    {
      session_start();
      $_SESSION['lg-email'] = htmlentities($_POST['lg-email']);
      $_SESSION['lg-pass'] = htmlentities($_POST['lg-pass']);
      header('Location: Dashboard.php');
    } 
    else 
    { 
      header('Location: Login.php');
    }

  }

?>