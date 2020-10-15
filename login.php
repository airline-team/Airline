<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <?php include_once 'header.php'; ?>
</head>
<body>
	<div class="wrapper">
    <?php include_once 'navbar.php'; ?>
<div class="container">
<content>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label for="username"><h3>Логин:</h3></label>
		<input type="text" name="username">
		<br>
		<label for="password"><h3>Пароль:</h3></label>
		<input type="password" name="password">
		<br>
		<button type="submit" name="submit"><h4>Вход</h4></button>
	</form>
</content>
</div>
    <?php include_once 'footer.php'; ?>
</body>
</html>

<?php
session_start();
if(empty($_SESSION['username'])){
include 'constants.php';
$dbc = mysqli_connect($host, $username_db, $password_db, $db_name);
if(!isset($_SESSION['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `users` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				$_SESSION["user_id"] = $row['user_id'];
				$_SESSION["username"] = $row['username'];
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header("Location: " . $home_url . '/personal_profile.php');
			}
			else {
				echo '<span style="color: red; font-size: 30px;"><center>Извините, вы должны ввести правильные имя пользователя и пароль!</center> </span>';
			}
		}
		else {
			echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
		}
	}
}
}
else{
	$home_url = 'http://' . $_SERVER['HTTP_HOST'];
	header("Location: " . $home_url . '/error.php');
}
?>