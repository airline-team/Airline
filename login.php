<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/
</head>
<body>
	<div class="wrapper">
	<div class="navbar">
		<div class="main">
			<a href="index.php">Главная страница</a>
		</div>
		<div class="menu">
		<ul>
			<li><a href="list_tickets.php">Список билетов</a><li>
			<li><a href="price_tickets.php">Цена билетов</a><li>
			<li><a href="#">Список компаний</a><li>
			<li><a href="#">Журнал продаж билетов</a><li>
			<li><a href="#">Войти</a><li>		
		</ul>
		</div>
		</div>	 
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

<footer class="footer">
	 <div class="footer-copyright text-center py-3">© 2020 Copyright: Airline VolSU</div>
</footer>

</body>
</html>

<?php
if(empty($_COOKIE['username'])){
include 'constans.php';
$dbc = mysqli_connect($host, $username_db, $password_db, $db_name);
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `users` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
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