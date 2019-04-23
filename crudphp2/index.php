
<?php require "templates/header.php"; ?>


		<div class="login">

			<h1>Login</h1>

			<form action="authentication.php" method="post">

				<label for="username">
					<i class="fas fa-user" style="color:white"></i>
				</label>

				<input type="text" name="acc_username" placeholder="Username" id="username" required>

				<label for="password">
					<i class="fas fa-lock" style="color:white"></i>
				</label>

				<input type="password" name="acc_password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">

			</form>

		</div>
