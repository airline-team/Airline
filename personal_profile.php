<?php
require_once 'constants.php';
if(empty($_SESSION['username'])){
	$home_url = 'http://' . $_SERVER['HTTP_HOST'];
	header("Location: " . $home_url . '/login.php');
}
else {
	$user_id = (int)$_SESSION['user_id'];
	$sql = "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'";
	$result = $dbc -> query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Personal Info</title>
    <?php require_once 'header.php'; ?>
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
			<li><a href="list_company.php">Список компаний</a><li>
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
    <?php require_once 'footer.php'; ?>
</body>
</html>