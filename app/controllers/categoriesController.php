<?php
require SITE_ROOT .'/app/database/connect.php';


//Формирование категорий
function giveAllCategories(){
    global $link;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($categories = []; $row = mysqli_fetch_assoc($result); $categories[] = $row);
    return $categories;
}

function giveOneCategory($name){
    global $link;
    $query = "SELECT * FROM categories WHERE name= '" . $name . "'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    return $row;
}


$cat_name = '';
$description = '';
$pic = '';
$msg = '';

//Добавление новой категории
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-add_cat']){ 

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name']; // Имя формируемоей картинки
        $fileTmpName = $_FILES['img']['tmp_name']; // Временно хранилище
        $path = SITE_ROOT . "\assets\img\categories\\" . $imgName; // Путь, куда сохранить
        
        $fileType = $_FILES['img']['type'];
        
        if (strpos($fileType, 'image') === false){
            die("Можно загрузить только изображение");
        }
        
        $result = move_uploaded_file($fileTmpName, $path);
        if ($result){
            $_POST['img'] = $imgName;
        }else{
            $msg = "Ошибка загрузки изображения";
        }
    }else{
        $msg = "Ошибка получения изображения";
    }
        
    $cat_name = trim(htmlspecialchars($_POST['cat_name']));
    $description = trim(htmlspecialchars($_POST['description']));
           
     if ($cat_name === '' || $description === '') {
        $msg = 'Должны быть заполнены все поля';
     }else{
         $cat_name_in_nadine = giveOneCategory($cat_name);
         if ($cat_name_in_nadine['name'] === $cat_name){
            $msg = 'Такая категория уже есть!'; 
         }else{
              $query = "INSERT INTO categories (name,description, pic) VALUES('" . $cat_name . "', '" . $description . "', '" .  $_POST['img'] . "')";
              $result = mysqli_query($link, $query) or die(mysqli_error($link));
              header('location: ' . BASE_URL . 'app/admin/categories.php');
         }
     }
    
}
/*
$query = "SELECT * FROM categories WHERE name= '" . $name . "'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    return $row;
 * 
 */
 

// Редактирование категории

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-edit_cat']){ 

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name']; // Имя формируемоей картинки
        $fileTmpName = $_FILES['img']['tmp_name']; // Временно хранилище
        $path = SITE_ROOT . "\assets\img\categories\\" . $imgName; // Путь, куда сохранить
        
        $fileType = $_FILES['img']['type'];
        
        if (strpos($fileType, 'image') === false){
            die("Можно загрузить только изображение");
        }
        
        $result = move_uploaded_file($fileTmpName, $path);
        if ($result){
            $_POST['img'] = $imgName;
        }
    }
        
    $cat_name = trim(htmlspecialchars($_POST['cat_name']));
    $description = trim(htmlspecialchars($_POST['description']));
    
    if ($_POST['img']){
       $query = "UPDATE categories SET name='" . $cat_name . "', description='" . $description . "', pic='" .  $_POST['img'] . "' WHERE id='" . $_GET['id'] . "'"; 
    }else{
       $query = "UPDATE categories SET name='" . $cat_name . "', description='" . $description . "' WHERE id='" . $_GET['id'] . "'"; 
    }
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/categories.php');
}

// Удаление категории
if (!empty($_GET['id']) && $_POST['btn-delete_cat']){ 
         
    $query = "DELETE FROM categories WHERE id='" . $_GET['id'] . "'"; 
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/categories.php');
}