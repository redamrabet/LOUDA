<?php include "templates/header.php"; ?>


<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
?>


<div id="mainIndex">

  <h2>Welcome back, <?=$_SESSION['name']?>!</h2>
  <div class="row">
    <a href= "create.php" class="col-sm-3">CREATE</a>
    <a  href="read.php" class="col-sm-3">READ</a>
    <a href="update.php" class="col-sm-3">UPDATE</a>
    <a  href="delete.php" class="col-sm-3">DELETE</a>
  </div>

</div>


<?php include "templates/footer.php"; ?>
