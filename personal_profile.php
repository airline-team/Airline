<?php
if(empty($_COOKIE['username'])){
	$home_url = 'http://' . $_SERVER['HTTP_HOST'];
	header("Location: " . $home_url . '/login.php');
}
else {
	include 'constans.php';
	$dbc = mysqli_connect($host, $username_db, $password_db, $db_name);
	$user_id = (int)$_COOKIE['user_id'];
	$sql = "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'";
	$result = $dbc -> query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Info</title>
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
			<li><a href="exit.php">Выйти</a><li>
		</ul>
		</div>
		</div>	 
		
		<div class="lk"><h1>Личный кабинет</h1></div>
		
		<div class="table_block">		
		<table class="demotable">
 
		<colgroup>
			<col class="col1"/>
			<col span="2" class="col2"/>
		</colgroup>
		<tbody>
		<?php while ($row = $result -> fetch_assoc()):; ?>
			<tr>
				<td>ФИО:</td>
				<td><?php echo $row['user_fio'];?></td>
			</tr>
			<tr>
				<td>Телефон:</td>
				<td><?php echo $row['user_phone'];?></td>
			</tr>
			<tr>
				<td>Отдыхали в:</td>
				<td><?php echo $row['user_trip'];?></td>
			</tr>
		<?php endwhile;?>	
		</tbody>
		</table>

	</div>
	
	 <footer class="footer">
		<div class="footer-copyright text-center py-3">© 2020 Copyright: Airline VolSU</div>
	 </footer>	
	
</body>
</html>