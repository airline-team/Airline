<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Glossary Parameters</title>
        <?php require_once 'header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <?php require_once 'navbar.php'; ?>

        <div class="header">
            <form class="form" action="search_word_glossary.php" method="POST">
                <div class="search-box">
                    <span style="color: darkgray; font-size: 25px;">Чтобы слово попало в глоссарий,оно должно встретиться в тексте:</span>
                    <br>
                    <br>
                    <input style="width: 200px" type="text" placeholder="Введите сюда это число" name="number">
                    <br>
                    <br>
                    <button style="width: 200px; height: 60px" type="submit">Открыть глоссарий</button>
                </div>
            </form>
        </div>


        <?php require_once 'footer.php'; ?>
</body>
</html>
