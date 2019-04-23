<?php include "templates/header.php";?>




<?php


if (isset($_POST['submit'])) {
require "../config.php";
require "../common.php";

  try {
$connection = new PDO($dsn, $username, $password);


$new_user = array(
  "per_firstname" => $_POST['per_firstname'],
  "per_lastname"  => $_POST['per_lastname'],
  "per_email"     => $_POST['per_email'],
  "per_age"       => $_POST['per_age'],
  "per_location"  => $_POST['per_location']
);

$sql = "INSERT INTO personne (per_firstname, per_lastname, per_email, per_age, per_location) values (:per_firstname, :per_lastname, :per_email, :per_age, :per_location)";

$statement = $connection->prepare($sql);
$statement->execute($new_user);

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}



?>

<div id="createMain">
  <?php if (isset($_POST['submit']) && $statement){ ?>
    <?php echo $_POST['per_firstname']; ?> successfully added.
  <?php }
  ?>
  <h2>Add a user</h2>


    <form method="post">

      <div class="form-row">

        <div class="form-group col-md-6">
    	   <label for="per_firstname">First Name</label>
    	   <input class="form-control" type="text" name="per_firstname" id="firstname">
        </div>

        <div class="form-group col-md-6">
    	   <label for="per_lastname">Last Name</label>
    	   <input class="form-control" type="text" name="per_lastname" id="lastname">
        </div>

      </div>


        <div class="form-group">
    	   <label for="per_email">Email Address</label>
    	   <input class="form-control" type="text" name="per_email" id="email">
        </div>

        <div class="form-group">
    	   <label for="per_age">Age</label>
    	   <input class="form-control" type="text" name="per_age" id="age">
        </div>

        <div class="form-group">
    	   <label for="per_location">Location</label>
    	   <input  class="form-control" type="text" name="per_location" id="location">
        </div>

    	<input type="submit" name="submit" value="Submit">

    </form>

  </div>
  <div class="back">
    <a href="loggedin.php">Back to home</a>
  </div>

    <?php include "templates/footer.php"; ?>
