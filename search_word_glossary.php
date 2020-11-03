<?php
session_start();

function countWordInAllPage($word,$indexed_pages){
    $count_word_html = 0;
    foreach ($indexed_pages as $item) {
        $link = "./html/" . $item;
        $text = file_get_contents($link);
        preg_match("/<body.*\/body>/s", $text, $html_body);
        $text = strip_tags($html_body[0]);
        $text = mb_strtolower(preg_replace('/\s+/', ' ', $text));
        $count_word_html = $count_word_html + mb_substr_count($text, $word);
    }

    return $count_word_html;
}

function searchWordOnPage($link, $query){
    $text = file_get_contents($link);
    preg_match("/<body.*\/body>/s", $text, $html_body);
    $text = strip_tags($html_body[0]);
    $text = mb_strtolower(preg_replace('/\s+/', ' ', $text));

    $count_word_html = mb_substr_count($text, $query);
    $word_all_page = [];
    $iteration_pos = 0;

    for($i=0;$i<=$count_word_html-1;$i++){
        $position = 0;
        if ($iteration_pos == 0) {
            $position = strpos($text, $query);
            $iteration_pos = $position + 1;
        }
        else {
            $position = strpos($text, $query,$iteration_pos);
            $iteration_pos = $position + 1;
        }

        if ($position === false) {
            return false;
        }
        $find_query = "";

        if ($position > 36)
            $find_query = substr($text, ($position - 36));
        else
            $find_query = substr($text, $position);

        $find_query = mb_strimwidth($find_query, 1, 100, "...", mb_internal_encoding());
        $find_query = str_replace($query, "<b>$query</b>", $find_query);

        $word_in_sentence['content'] = $find_query;
        $word_in_sentence['link'] = $link;
        $word_in_sentence['word'] = $query;

        $word_all_page[] = $word_in_sentence;
    }
    return $word_all_page;
}

function searchWordInFiles($word){
    $indexed_pages = array_slice(scandir('./html/'), 2);
    $word_all_pages = [];

    foreach ($indexed_pages as $item) {
        $word_all_page = searchWordOnPage("./html/" . $item, $word);
        if ($word_all_page !== false) {
            $word_all_pages = array_merge($word_all_pages,$word_all_page);
        }
    }

    return $word_all_pages;
}

function getAllPagesText($indexed_pages){
    $text_html_page = '';
    foreach ($indexed_pages as $item) {
        $text = file_get_contents("./html/" . $item);
        preg_match("/<body.*\/body>/s", $text, $html_body);
        $text = strip_tags($html_body[0]);
        $text = mb_strtolower(preg_replace('/\s+/', ' ', $text));
        $text_html_page = $text_html_page . ' ' . $text;
    }
    return $text_html_page;
}

$glossary = [];
$size_word_glossary = trim($_POST['number']); # Слово должно встречаться 'number' раз,чтобы попасть в Glossary
$indexed_pages = array_slice(scandir('./html/'), 2); # Файлы в нашей папке html
$text_html_page = getAllPagesText($indexed_pages);
$data = preg_split('/\s+/', $text_html_page);

foreach ($data as $word) {
    if((strlen($word) > 4) and (countWordInAllPage($word,$indexed_pages) >= $size_word_glossary)) {
        if (count($glossary) >= 1) {
            $counter = 0;
            // Проверяем глоссарий на наличия этого слово
            for ($i = 0; $i <= count($glossary) - 1; $i++) {
                if ($glossary[$i][0]['word'] == $word) $counter++;
            }
            if ($counter == 0) {
                $word_all_pages = searchWordInFiles($word);
                $glossary[] = $word_all_pages;
            }
        } else {
            // Добавление первого слова в глоссарий
            $word_all_pages = searchWordInFiles($word);
            $glossary[] = $word_all_pages;
        }
    }
}

$_SESSION['glossary'] = $glossary;
header("Location: interface_glossary.php");