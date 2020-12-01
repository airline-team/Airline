<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <script
            src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
            crossorigin="anonymous"></script>
        <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
        <title>Glossary</title>
        <?php require_once 'header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <?php require_once 'navbar.php'; ?>
        <div style="text-align: center">
            <br>
            <br>
            <p style="color: darkgray; font-size: 25px;">Глоссарий:</p>

            <?php
            if (isset($_SESSION['glossary'])) {
                $glossary = $_SESSION['glossary'];
                echo "<div id=\"accordion\">";
                echo "-------------------------------------";
                for($i= 0;$i<=count($glossary)-1;$i++){
                    $word = $glossary[$i][0]['word'];
                    echo "-------------------------------------";
                    echo("<h4 style='color: darkgray'>$word</h4>
                                <div>");
                    for($j= 0;$j<=count($glossary[$i])-1;$j++){
                        $link = $glossary[$i][$j]['link'];
                        $content = $glossary[$i][$j]['content'];
                        $number_sentence = $j + 1;
                        echo ("
                        <a target='_blank' href='$link'>
                            <p>$number_sentence) $content</p>
                        </a>
                        ");
                    }
                    echo "</div>";
                    echo "-------------------------------------";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
        <?php require_once 'footer.php'; ?>
        <script src="mainer.js"></script>
</body>
</html>