<?php
/**
  * Use an HTML form to edit an entry in the
  * users table.
  *
  */
require "../config.php";
require "../common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password);
    $user =[
      "per_id"        => $_POST['per_id'],
      "per_firstname" => $_POST['per_firstname'],
      "per_lastname"  => $_POST['per_lastname'],
      "per_email"     => $_POST['per_email'],
      "per_age"       => $_POST['per_age'],
      "per_location"  => $_POST['per_location'],
      "date"      => $_POST['date']
    ];

    $sql = "UPDATE personne
            SET per_id = :per_id,
              per_firstname = :per_firstname,
              per_lastname = :per_lastname,
              per_email = :per_email,
              per_age = :per_age,
              per_location = :per_location,
              date = :date
            WHERE per_id = :per_id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['per_id'])) {
  try {
    $connection = new PDO($dsn, $username, $password);
    $per_id = $_GET['per_id'];
    $sql = "SELECT * FROM personne WHERE per_id = :per_id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':per_id', $per_id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>


<div id="mainRead">


<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo $_POST['per_firstname']; ?> successfully updated.
<?php endif; ?>

<h2>Edit a user</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'per_id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

</div>
<div class="back">
  <a href="loggedin.php">Back to home</a>
</div>
<?php require "templates/footer.php"; ?>
