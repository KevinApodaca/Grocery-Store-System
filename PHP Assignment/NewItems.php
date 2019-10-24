<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PHP Assignment for CS3360 with Nigel Ward, Fall 2019 semester at the University of Texas at EL Paso">
    <meta name="author" content="Kevin Apodaca">

    <title>PHP Assignment - Kevin Apodaca</title>

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
                            <p style = "color:white;">Welcome to the interface for the PLU, please enter a name of the name for your item as well as its unique PLU. If you cannot find this database_information please ask 
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
                    <h1 style="color:orange;" align = "center"><b>Add New Items</b></h1>
                    <p align = "center" style="color:white;"> Please fill out the appropriate information for each item, remember to spell the name correctly</p>
	<!-- Table were users can input information. -->
	<form action="NewItems.php" method="POST">
		<div>
            <!-- Stretch entire page -->
			<table border = "3" style="width: 100%">
				<tr bgcolor = "orange">
					<th><i>Name of Grocery Item<i></th>
					<th><i>PLU Identifier<i></th>
					<th><i>Picture of Item<i></th>
				</tr>
				<tr>
                    <!-- Inputs for each of the three attributes -->
					<td align="center"><input type="text" name="grocery_name"></td>
					<td align="center"><input type="text" name="grocery_value"></td>
					<td align="center"><input type="text" name="grocery_image"></td>
				</tr>
			</table>
        </div>
        <!-- Information To Display All Items -->
		<input type="submit" name="submit" value="Add New Item">
        <h1 style= "color:orange;" align = "center"><b>Grocery Items</b></h1>
        <p align = "center" style="color:white;">Below will be displayed the full inventory of all the items that have been added so far.</p>
	</form>
    
    <!-- Call to -->
	<form action="SearchItem.php">
	<input type = "submit" value = "Search for an Item" />
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
/**
 * @author Kevin Apodaca
 * @version 1.0
 * @since 9/24/19
 * Description: This PHP script will add new grocery items to the database, using the name of the item, the PLU identifier, and a picture
 */

 /** Setting all variables needed. */
$item_name = $_POST['grocery_name'];
$item_plu = $_POST['grocery_value'];
$item_image = $_POST['grocery_image'];
$item_file = "/Users/Kevin 1/Desktop/PHP Assignment/items.txt";
$database_info = array();

/**
 * This function will be used to insert new items into the database text file by appending the information and inserting it as a new line.
 */
function addItem($item_name, $item_plu, $item_image)
{
     /** Setting all variables needed. */
    global $item_file;
    global $database_info;

    /** Checking if the file is empty, then we open the file. */
    if (! empty($item_name)) {
        $file_pointer = fopen($item_file, "a") or die ("The items file was not found");
        fwrite($file_pointer, ($item_name . " " . $item_plu . " " . $item_image . "\n")); // appending item information into a single line.
        fclose($file_pointer);
        $file_pointer = fopen($item_file, "r") or die ("The items file was not found");
        $tracker = 0;
        /** While loop that will iterate through the file until it reaches the end of the file. */
        while (! feof($file_pointer)) {
            $database_info[$tracker] = fgets($file_pointer); // adding information to text file.
            $tracker++;
        }
        /** Built in PHP function to sort items from lowest to highest. */
        sort($database_info);
        /** File no longer needed. */
        fclose($file_pointer); 
    }
}
/**
 * This function will be used to display the inventory of items that have been stored since the session started.
 */
function displayItems()
{
     /** Setting all variables needed. */
    global $item_file;
    global $database_info;
    $iterator = 0; // will be used to iterate through the database line by line

    if (sizeof($info) != 0){//eliminates the one previous entry that always got printed out.
        $iterator = 1;
    } 

    /** For loop will go through the entire database file and print out the lines. */
    for (; $iterator < sizeof($database_info); $iterator++) {
        $placeholder = preg_split("/[\s,]+/", $database_info[$iterator]); //using built in preg-split to quickly organize the file for printing.
        echo '<img src="' . $placeholder[2] . '" alt="icon" width="500" height="500" />'; // printing out the grocery item picture that the user submitted.
        echo "\t". $placeholder[0] . " " . $placeholder[1] . "<br/>"; // printing out the name of the grocery item and the PLU identifier, then going to the next line.s
    }
}
/** Calling the relevant PHP scripts */
addItem($item_name, $item_plu, $item_image);
displayItems();
?>