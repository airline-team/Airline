<?php
require_once 'constants.php';
if(isset($_POST['submit'])) {
    $company_name = mysqli_real_escape_string($dbc, trim($_POST['company_name']));
    $company_email = mysqli_real_escape_string($dbc, trim($_POST['company_email']));
    $company_phone = mysqli_real_escape_string($dbc, trim($_POST['company_phone']));
    $company_age = mysqli_real_escape_string($dbc, trim($_POST['company_age']));
    $company_info = mysqli_real_escape_string($dbc, trim($_POST['company_info']));

    if(!empty($company_name) && !empty($company_email) && !empty($company_phone) && !empty($company_age) && !empty($company_info)) {

        $query = "SELECT * FROM `company` WHERE company_name = '$company_name'";
        $data = mysqli_query($dbc, $query);

        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `company` (company_name, company_email,company_phone,company_age,company_info) 
                     VALUES ('$company_name','$company_email','$company_phone','$company_age','$company_info')";
            mysqli_query($dbc,$query);
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header("Location: " . $home_url . '/list_company.php');
        }
        else {
            echo '<span style="color: red; font-size: 30px;"><center>Данная компания уже соданна</center> </span>';
        }
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
    }
}
else{
    echo '<span style="color: red; font-size: 30px;"><center>GET запрос не пройдет!</center> </span>';
}