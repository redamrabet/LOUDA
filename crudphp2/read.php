<?php

/**
  * Function to query information based on
  * a parameter: in this case, location.
  *
  */

if (isset($_POST['submit'])) {
  try {
    require "../config.php";
    require "../common.php";

    $connection = new PDO($dsn, $username, $password);

    $sql = "SELECT *
    FROM personne
    WHERE per_id = :per_id";

    $location = $_POST['per_id'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':per_id', $location, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>


<div id="mainRead">

<h2>Find user based on ID</h2>

<form method="post">
  <label for="per_id">ID</label>
  <input type="text" id="location" name="per_id">
  <input type="submit" name="submit" value="View Results">
</form>



<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>


</div>

<div id="mainReadResults">

    <table>
      <thead>
        <tr class="thead">
          <th >#</th>
          <th >First Name</th>
          <th >Last Name</th>
          <th >Email Address</th>
          <th >Age</th>
          <th >Location</th>
          <th >Date</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<th><?php echo $row["per_id"]; ?></th>
<td><?php echo $row["per_firstname"]; ?></td>
<td><?php echo $row["per_lastname"]; ?></td>
<td><?php echo $row["per_email"]; ?></td>
<td><?php echo $row["per_age"]; ?></td>
<td><?php echo $row["per_location"]; ?></td>
<td><?php echo $row["date"]; ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>




  <?php } else { ?>
    > No results found for <?php echo $_POST['per_id']; ?>.
  <?php }
} ?>
</div>
<div class="back">
  <a href="loggedin.php">Back to home</a>
</div>

<?php require "templates/footer.php"; ?>
