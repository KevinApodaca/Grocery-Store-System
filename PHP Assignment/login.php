<?php 
/**
 * @author Kevin Apodaca
 * @version 1.0
 * @since 9/24/19
 * Description: This PHP script will verify that some given PLU number is in the database.
 */

session_start(); // lets PHP know a new session was initialized. 

/** Determine if a variable is declared and is different than NULL */
if (isset($_POST['Submit'])){
  $logins = array('Kevin' => 'ka_password','big_admin' => 'Admin','normal_user' => 'User'); //available logins.
  $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
  $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

  /** Determine if there are two inputs for username and password. */
if (isset($logins[$Username]) && $logins[$Username] == $Password){
  $_SESSION['UserData']['Username']=$logins[$Username];
  header("location: NewItems.php");
  exit;
}
/** Displays if the details were not valid inputs for the database. */
else {
  $disp_message="<span style='color:pink'>Please check your login credentials again</span>";
}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP Assignment for CS3360 with Nigel Ward, Fall 2019 semester at the University of Texas at EL Paso">
    <meta name="author" content="Kevin Apodaca">

    <title>Login - Kevin Apodaca</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,500,700,900' rel='stylesheet' type='text/css'>
    <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type='text/css'>
    <link href="css/material.min.css" rel="stylesheet" type='text/css'>
    <link href="css/owl.carousel.css" rel="stylesheet" type='text/css'>
    <link href="css/magnific-popup.css" rel="stylesheet" type='text/css'>
    <link href="css/animate.min.css" rel="stylesheet" type='text/css'>
    <link href="css/jquery.directional-hover.min.css" rel="stylesheet" type='text/css'>
    <link href="css/preloader.css" rel="stylesheet" type='text/css'>
    <link href="style.css?1" rel="stylesheet" type='text/css'>
    <link href="css/button-color-1.css" rel="stylesheet" type='text/css' id="buttonColorScheme">
    <link href="css/main-color-1.css" rel="stylesheet" type='text/css' id="mainColorScheme">
</head>

<body bgcolor = "#005bbb" text="orange" bgcolor="#ffff00" link="#0000f0" vlink="#0000f0" alink="#0000f0" data-spy="scroll" data-target="#topNavbar2" data-offset ="80">
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="circle"></div>
        <div class="left-door"></div>
        <div class="right-door"></div>
    </div>
    <!-- Preloader End -->
    <div class="contact-window mdl-card mdl-shadow--24dp">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h2 style= "color:orange;">PLU Interface</h2>
                            <p style = "color:white;">Welcome to the interface for the PLU, please enter your credentials to use the system, if you have forgotten your credentials please go to the system administrator for a reset.
                                a store associate.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- database_info Start -->
                    <div class="col-md-3 contact-database_info">
                        <h2 style= "color:orange;">PHP Assignment</h2>
                        <database_info>
                            <p class="Author" style = "color:white;"><i class="fa fa-id-card"></i> Author:  <span class="pull-right">Kevin Apodaca</span></p>
                            <p class="Class" style= "color:white;"><i class="fa fa-university"></i> Class:  <span class="pull-right">CS 3360</span></p>
                        </database_info>
                    </div>
                    <img src = "search.png" alt = "Search Icon">

<!-- Initialize the login form -->
<form action="" method="post" name="Login_Form">
  <table  border = "5" width="400" border="0" align="center" cellpadding="20" cellspacing="6" class="Table">
    <?php 
    /**
     * @author Kevin Apodaca
     * @version 1.0
     * @since 9/24/19
     * Description: This PHP script will verify that some given PLU number is in the database.
     */
    if (isset($disp_message)){
    ?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $disp_message;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h1 align = "center"><u>Grocery Store Login Portal<u></h1></td>
    </tr>
    <tr>
      <td align="right" valign="top"><i>Employee Username<i></td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right"><i>Employee Password<i></td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Confirm login" class="Button3"></td>
    </tr>
  </table>

</form></body>
</html>