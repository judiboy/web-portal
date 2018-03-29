<?php
// get ID of the vehicle to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/vehicle.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$vehicle = new Vehicle($db);
//$category = new Category($db);
 
// set ID property of vehicle to be read
$vehicle->id = $id;
 
// read the details of vehicle to be read
$vehicle->readOne();
// set page headers
$page_title = "VIEW ONE VEHICLE";
include_once "layout_header.php";
 
// read vehicles button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> View Vehicle";
    echo "</a>";
echo "</div>";

// HTML table for displaying a vehicle details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Photo</td>";
        echo "<td>{$vehicle->photo}</td>";
    echo "</tr>";
	echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>{$vehicle->id}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Driver ID</td>";
        echo "<td>{$vehicle->driverid}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Plate No</td>";
        echo "<td>{$vehicle->plateno}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Type</td>";
        echo "<td>{$vehicle->type}</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Make</td>";
        echo "<td>{$vehicle->make}</td>";
    echo "</tr>";
	
    echo "<tr>";
        echo "<td>Model</td>";
        echo "<td>{$vehicle->model}</td>";
    echo "</tr>";	

	echo "<tr>";
        echo "<td>Color</td>";
        echo "<td>{$vehicle->color}</td>";
    echo "</tr>";
	
	echo "<tr>";
        echo "<td>Active</td>";
        echo "<td>{$vehicle->active}</td>";
    echo "</tr>";
	
	echo "<tr>";
        echo "<td>Free</td>";
        echo "<td>{$vehicle->free}</td>";
    echo "</tr>";
	
	echo "<tr>";
        echo "<td>Latitude</td>";
        echo "<td>{$vehicle->locationlat}</td>";
    echo "</tr>";
	
	echo "<tr>";
        echo "<td>Longitude</td>";
        echo "<td>{$vehicle->locationlong}</td>";
    echo "</tr>";	    
 
echo "</table>"; 
// set footer
include_once "layout_footer.php";
?>
