<?php
// retrieve one vehicle will be here
// get ID of the vehicle to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/vehicle.php';
//include_once 'objects/category.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$vehicle = new Vehicle($db);
//$category = new Category($db);
 
// set ID property of vehicle to be edited
$vehicle->id = $id;
 
// read the details of vehicle to be edited
$vehicle->readOne();
 
?>
<!-- 'update vehicle' form will be here -->

<?php 
// set page header
$page_title = "Update vehicle";
include_once "layout_header.php";
 
// contents will be here
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read vehicles</a>";
echo "</div>"; 
?>
<!-- 'update vehicle' form will be here -->
<!-- post code will be here -->
 <?php 
// if the form was submitted
if($_POST){
 
    // set vehicle property values
    //$vehicle->id = $_POST['id'];
    $vehicle->driverid = $_POST['driverid'];
    $vehicle->plateno = $_POST['plateno'];
    $vehicle->type = $_POST['type'];
 
    // update the vehicle
    if($vehicle->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "vehicle was updated.";
        echo "</div>";
    }
 
    // if unable to update the vehicle, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update vehicle.";
        echo "</div>";
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Driver ID</td>
            <td><input type='text' name='driverid' value='<?php echo $vehicle->driverid; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Plate No</td>
            <td><input type='text' name='plateno' value='<?php echo $vehicle->plateno; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Type</td>
            <td><textarea name='type' class='form-control'><?php echo $vehicle->type; ?></textarea></td>
        </tr>
 
       
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
// set page footer
include_once "layout_footer.php";
?>
