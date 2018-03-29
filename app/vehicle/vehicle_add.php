<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/vehicle.php';
include_once 'objects/driver.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$vehicle = new Vehicle($db);
$driver = new Driver($db);
// set page headers
$page_title = "ADD VEHICLE";
include_once "layout_header.php";
 
// contents will be here
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>VIEW VEHICLE</a>";
echo "</div>";
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set vehicle property values
    $vehicle->driverid = $_POST['driverid'];
    $vehicle->plateno = $_POST['plateno'];
    $vehicle->type = $_POST['type'];
    $vehicle->make = $_POST['make'];
	$vehicle->color = $_POST['color'];
	$vehicle->photo = $_POST['photo'];
	$vehicle->active = $_POST['active'];
	$vehicle->free = $_POST['free'];
	$vehicle->locationlat = $_POST['locationlat'];
	$vehicle->locationlong = $_POST['locationlong'];
 
    // create the vehicle
    if($vehicle->create()){
        echo "<div class='alert alert-success'>vehicle was created.</div>";
    }
 
    // if unable to create the vehicle, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create vehicle.</div>";
    }
} 
?>
<!-- PHP post code will be above -->
 
<!-- HTML form for creating a vehicle -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Driver ID</td>
			<!--<td><input type='text' name='driverid' class='form-control' /></td> -->
			<td>
            
			  <?php
			// read the vehicle categories from the database
			$stmt = $driver->read();
			 
			// put them in a select drop-down
			echo "<select class='form-control' name='driverid'>";
				echo "<option>Select driver...</option>";
			 
				while ($row_driver = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_driver);
					echo "<option value='{$id}'>{$firstname}</option>";
				}
			 
			echo "</select>";
			?>
            </td>
            
            
        </tr>
 
        <tr>
            <td>Plate No</td>
            <td><input type='text' name='plateno' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Type</td>
            <td><textarea name='type' class='form-control'></textarea></td>
        </tr>
 
        <tr>
            <td>Make</td>
            <td><input type='text' name='make' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Model</td>
            <td><input type='text' name='model' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Photo</td>
            <td><input type='text' name='photo' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Color</td>
            <td><input type='text' name='color' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Active</td>
            <td><input type='text' name='active' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Free</td>
            <td><input type='text' name='free' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Latitude</td>
            <td><input type='text' name='locationlat' class='form-control' /></td>
        </tr>
		
		<tr>
            <td>Longitude</td>
            <td><input type='text' name='locationlong' class='form-control' /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Add</button>
            </td>
        </tr>
 
    </table>
</form>
<?php 
// footer
include_once "layout_footer.php";
?>