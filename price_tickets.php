<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Price Tickets</title>
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
			<li><a href=<?php 
					if(empty($_COOKIE['username']))echo "login.php";
					else echo "personal_profile.php";
				?>>
				<?php 
					if(empty($_COOKIE['username']))echo "Войти";
					else echo "Личный кабинет";
				?>
			</a><li>
		</ul>
		</div>
		</div>
		
		<div class="header">
		<div class="content">
			<div class="container">
		
			<div class="row">
				<div class=text_n>
				<div class="col"><b>Эконом класс</b> <br>Цены от 1 700 рублей 	&#160;  &#160; </br></div></div>
				<div class="col"><button type="button">Найти</button></div>
			</div>
			
			<div class="row">
				<div class=text_n>
				<div class="col"><b>Бизнес класс</b> <br>Цены от 30 000 рублей &#160; </br></div></div>
				<div class="col"><button type="button">Найти</button></div>
			</div>
			
			<div class="row">
			<div class=text_n>
				<div class="col"><b>Первый класс</b> <br>Цены от 140 000 рублей</br></div></div>
				<div class="col"><button type="button">Найти</button></div>
			</div>
		</div>
		</div>
		</div>
			 
		 
			  <footer class="footer">
	 <div class="footer-copyright text-center py-3">© 2020 Copyright: Airline VolSU</div>
    </footer>
			 
			 
</body>
</html>