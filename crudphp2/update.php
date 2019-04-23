<?php

/**
  * List all users with a link to edit
  */

try {
  require "../config.php";
  require "../common.php";

  $connection = new PDO($dsn, $username, $password);

  $sql = "SELECT * FROM personne";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>


<div id="mainUpdate">

<h2>Update users</h2>
<table>
  <thead>
    <tr class="thead">
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th>Age</th>
      <th>Location</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo $row["per_id"]; ?></td>
      <td><?php echo $row["per_firstname"]; ?></td>
      <td><?php echo $row["per_lastname"]; ?></td>
      <td><?php echo $row["per_email"]; ?></td>
      <td><?php echo $row["per_age"]; ?></td>
      <td><?php echo $row["per_location"]; ?></td>
      <td><?php echo $row["date"]; ?> </td>
      <td><a class="far fa-edit" href="update-single.php?per_id=<?php echo $row["per_id"];?>"></a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
<div class="back">
  <a href="loggedin.php">Back to home</a>
</div>
<?php require "templates/footer.php"; ?>
