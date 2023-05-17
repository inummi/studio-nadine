<?php

require SITE_ROOT .'/app/database/connect.php';

//Формирование категорий
function giveImages(){
    global $link;
    $query = "
        SELECT
             images.id, images.pic, categories.id as cat_id, categories.name as category_name, images.description 
        FROM
            images
        LEFT JOIN categories ON categories.id=images.category_id 
        ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($imgWithCategories = []; $row = mysqli_fetch_assoc($result); $imgWithCategories[] = $row);
    
    return $imgWithCategories;
}

// Изображения с привязкой к конкретной категории
function getImagesByCategories(){
    $arr = giveImages();
    $res = [];
	
    foreach ($arr as $images) {
	$res[$images['category_name']][] = ['id' => $images['id'], 'pic' => $images['pic'], 'description' => $images['description'], 'cat_id' => $images['cat_id']];
    }
    return $res;
}

$img = '';
$description = '';
$msg = '';
$choice_category = '';

//Добавление изображения
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-add_img']){ 

    if (!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name']; // Имя формируемоей картинки
        $fileTmpName = $_FILES['img']['tmp_name']; // Временно хранилище
        $path = SITE_ROOT . "\assets\img\images\\" . $imgName; // Путь, куда сохранить
        
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
    $description = trim(htmlspecialchars($_POST['description']));
    $choice_category = trim(htmlspecialchars($_POST['choice_category']));
  
     if ($_POST['img'] === '' || $description === '') {
        $msg = 'Должны быть заполнены все поля';
     }elseif ($choice_category === 'Выбрать категорию'){
        $msg = 'Необходимо выбрать категорию услуги';
    }else{
        $query = "INSERT INTO images (pic,description,category_id) VALUES('" . $_POST['img'] . "', '" . $description . "', '" .  $choice_category . "')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        header('location: ' . BASE_URL . 'app/admin/images.php');
     }
}
    
//Редактирование изображения
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-edit_img']){ 
          

    $description = trim(htmlspecialchars($_POST['description']));
    $choice_category = trim(htmlspecialchars($_POST['choice_category']));
    
    $query = 
            "
                UPDATE 
                    images 
                SET 
                    description='" . $description . "', category_id='" . $choice_category . "'
                WHERE 
                    id='" . $_GET['id'] . "'
            "; 
   
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/images.php');
}

// Удаление изображения
if (!empty($_GET['id']) && $_POST['btn-delete_img']){ 
         
    $query = "DELETE FROM images WHERE id='" . $_GET['id'] . "'"; 
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    header('location: ' . BASE_URL . 'app/admin/images.php');
}
