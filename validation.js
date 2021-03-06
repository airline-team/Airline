function validate_company() {
    let company_name = document.forms["form_company"]["company_name"].value;
    let name_length = company_name.match(/[^\s]/g) != null ? company_name.match(/[^\s]/g).length : 0;
    if (name_length < 3) {
        alert("Название компании должно быть больше 2 символов");
        return false;
    }
    let company_email = document.forms["form_company"]["company_email"].value;
    let re_email = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    let valid_email = re_email.test(company_email);
    if (!valid_email){
        alert("Укажите правильно Email");
        return false;
    }
    let company_phone = document.forms["form_company"]["company_phone"].value;
    let re_phone = /^((8|\+7)[\- ]?)?(\(?\d{3,4}\)?[\- ]?)?[\d\- ]{5,10}$/;
    let valid_phone = re_phone.test(company_phone);
    if (!valid_phone){
        alert("Укажите правильно номер телефона");
        return false;
    }

    let company_age = document.forms["form_company"]["company_age"].value;
    let age_length = company_age.match(/[^\s]/g) != null ? company_age.match(/[^\s]/g).length : 0;
    if (age_length < 4) {
        alert("Укажите возраст в приведенном формате");
        return false;
    }
    let company_info = document.forms["form_company"]["company_info"].value;
    let info_length = company_info.match(/[^\s]/g) != null ? company_info.match(/[^\s]/g).length : 0;
    if (info_length < 5 || info_length > 100) {
        alert("Поле информации: минимальное количество символов,не считая пробела, 5, максимальное 100");
        return false;
    }
}
function validate_service() {
    let service_name = document.forms["form_company_service"]["service_name"].value;
    let name_length = service_name.match(/[^\s]/g) != null ? service_name.match(/[^\s]/g).length : 0;
    if (name_length < 4) {
        alert("Название сервиса должно быть больше 4 символов");
        return false;
    }
    let service_info = document.forms["form_company_service"]["service_info"].value;
    let info_length = service_info.match(/[^\s]/g) != null ? service_info.match(/[^\s]/g).length : 0;
    if (info_length < 5 || info_length > 80) {
        alert("Поле информации: минимальное количество символов,не считая пробела, 5, максимальное 80");
        return false;
    }
    let service_picture = document.forms["form_company_service"]["service_picture"].value;
    let re = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
    if (!re.exec(service_picture)) {
        alert("Файл данного типа не поддерживается !");
        return false;
    }
}