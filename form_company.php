<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add company</title>
    <?php include_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <form action="add_company.php" id="form_company" name="form_company" onsubmit="return validate()" method="POST">
            <div class="form-group">
                <label style="color: white">Название компании:</label>
                <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Путешествуй в РФ">
            </div>
            <div class="form-group">
                <label style="color: white">Email:</label>
                <input type="email" id="company_email" name="company_email" class="form-control" aria-describedby="emailHelp" placeholder="your_company@box.ru">
            </div>
            <div class="form-group">
                <label style="color: white">Номер:</label>
                <input type="tel" id="company_phone" name="company_phone" class="form-control" placeholder="+79664554112">
            </div>
            <div class="form-group">
                <label style="color: white">Как давно вы на рынке</label>
                <input type="text" id="company_age" name="company_age" class="form-control" placeholder="12 месяцев">
            </div>
            <div class="form-group">
                <label style="color: white">Расскажите о самых главных достоинствах компании</label>
                <textarea style="resize: none" id="company_info" name="company_info" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    <?php include_once 'footer.php'; ?>
    <script src="validation.js"></script>
</body>
</html>