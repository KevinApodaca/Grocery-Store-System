<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP Assignment for CS3360 with Nigel Ward, Fall 2019 semester at the University of Texas at EL Paso">
    <meta name="author" content="Kevin Apodaca">

    <title>Search PLU - Kevin Apodaca</title>

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

<body bgcolor = "#005bbb"data-spy="scroll" data-target="#topNavbar2" data-offset="80">
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
                            <p style = "color:white;">Welcome to the interface for the PLU, please enter the PLU identifier of the grocery item you are searching for, if you need help please ask a store associate near you.
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
                    <h1 style="color:orange;" align = "center"><b>Search Feature</b></h1>
                    <form action="Search.php" method="POST">
                        <div>
			<table border = "3" style="width: 100%">
				<tr><th style = "color:white;" font-size= "30"><i>Search by the item PLU by entering the number below.<i></th></tr><tr>
					<td align="center"><input type="text" name="search"></td>
				</tr>
					</table>
					</div>
                    <input type="submit"  align = "center" name="Search by" value="Search For PLU">
                    <br><br>
                </form>
                <form action="NewItems.php">
	<input type = "submit" value = "Click Here To Add New Item" />
    </form>

      <!--JAVASCRIPT FILES-->
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/animatescroll.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/isotope-docs.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.directional-hover.min.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<!-- PHP SCRIPT INITIALIZING -->
<?php
include 'NewItems.php';
/**
 * @author Kevin Apodaca
 * @version 1.0
 * @since 9/24/19
 * Description: This PHP script will verify that some given PLU number is in the database.
 */

 /** Setting all variables needed. */
$search = $_POST['search'];
$database_info = array(); // empty array.
$item_file = "/Users/Kevin 1/Desktop/PHP Assignment/items.txt";

/**
 * This function will be used to search for the specific PLU that the user input.
 */
function searchByPLU()
{    //variables needed
    global $database_info;
    global $search;
    global $item_file;
    $was_found = FALSE; // hasn't been found yet.
    
    if (! empty($search)) {
        $fp = fopen($item_file, "r") or die ("The items file was not found");
        $index = 0;
        /**  While loop will iterate throughout the entire file, populating the array with the elements of the database file. */
        while (! feof($fp)) {
            $database_info[$index] = fgets($fp);
            $index ++;
        }
        /** For loop  will go through the database file and split the file by new line.*/
        for ($i = 0; $i < sizeof($database_info); $i ++) {
            $keep_track = preg_split("/[\s,]+/", $database_info[$i]);
            
            if (strcmp($keep_track[1], $search) == 0) { // checking if a comparing returns 0, if true then the strings are the same and the PLU is found. Index 1 contains the PLU
                echo '<img src="' . $keep_track[2] . '" alt="image" width="500" height="500" />'; // return image that user uploaded
                echo $keep_track[0] . " " . $keep_track[1] . "<br/>"; // return the name and the PLU.
                $was_found = TRUE; // variable needs to be updated if the condition is met.
                break;
            }
        }
        /** The PLU was never changed, thus never found. */
        if ($was_found == FALSE) {echo "PLU not in the system.";     }
    }

}
/** Calling the relevant PHP scripts */
searchByPLU();
?>