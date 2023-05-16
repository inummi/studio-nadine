<?php

require SITE_ROOT .'/app/database/connect.php';


//Формирование категорий
function giveCategoriesServices(){
    global $link;
    $query = "
        SELECT
             services.id, categories.id as cat_id, services.name, categories.name as category_name, services.description, categories.description as category_desc, services.price
        FROM
            services
        LEFT JOIN categories ON categories.id=services.category_id 
        ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($ServWithCategories = []; $row = mysqli_fetch_assoc($result); $ServWithCategories[] = $row);
    
    return $ServWithCategories;
}

// Услуги с привязкой к конкретной категории
function getServiceByCategories(){
    $arr = giveCategoriesServices();
    $res = [];
	
    foreach ($arr as $service) {
	$res[$service['category_name']][] = ['id' => $service['id'], 'service' => $service['name'], 'description' => $service['description'], 'price' => $service['price'], 'category_id' => $service['cat_id'], 'category_name' => $service['category_name']];
    }
    return $res;
}
/*
echo '<pre>';
print_r(getServiceByCategories());
echo '</pre>';

*/

$serv_name = '';
$description = '';
$price = '';
$choice_category = '';
$msg = '';

//Добавление новой услуги
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-add_service']){ 
    
    $serv_name = trim(htmlspecialchars($_POST['serv_name']));
    $description = trim(htmlspecialchars($_POST['description']));
    $price = trim(htmlspecialchars($_POST['price']));
    $choice_category = trim(htmlspecialchars($_POST['choice_category']));
   
    if ($serv_name === '' || $description === '' || $price === ''){
       $msg = 'Должны быть заполнены все поля'; 
    }elseif (!is_numeric($price)) {
       $msg = 'Поле "Стоимость может содержать только число"'; 
    }elseif ($choice_category === 'Выбрать категорию'){
        $msg = 'Необходимо выбрать категорию услуги';
    }else{
        $service_name_in_nadine = giveCategoriesServices();
        if ($service_name_in_nadine === '$serv_name'){
            $msg = 'Такая услуга уже есть';   
        }else{
            $query = 
                "INSERT INTO
                    services (name, description, price, category_id)
                VALUES
                    ('" . $serv_name . "', '" . $description . "', '" . $price . "', '" . $choice_category . "')
                ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            header('location: ' . BASE_URL . 'app/admin/services.php');
        }
    } 
}

//Редактирование услуги
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-edit_service']){ 
          
    $serv_name = trim(htmlspecialchars($_POST['serv_name']));
    $description = trim(htmlspecialchars($_POST['description']));
    $price = trim(htmlspecialchars($_POST['price']));
    $choice_category = trim(htmlspecialchars($_POST['choice_category']));
    
    $query = 
            "
                UPDATE 
                    services 
                SET 
                    name='" . $serv_name . "', description='" . $description . "', price='" .  $price . "' , category_id='" . $choice_category . "'
                WHERE 
                    id='" . $_GET['id'] . "'
            "; 
   
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/services.php');
}

// Удаление услуги
if (!empty($_GET['id']) && $_POST['btn-edit_delete']){ 
         
    $query = "DELETE FROM services WHERE id='" . $_GET['id'] . "'"; 
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/services.php');
}
