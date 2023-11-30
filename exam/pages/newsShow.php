<?php
include_once("./pages/classes/news.php");
$arr = News::getAllNewsFromDb();

if (isset($_SESSION['ruser'])){
    echo '<h1>Новости АПЛ</h1>';


echo '<div class="d-flex justify-content-between align-items-center">
  <div>Элемент 1</div>
  <div>Элемент 2</div>
</div>';


}
else{
    echo '<h1>ТОЛЬКО ДЛЯ ЗАРЕГИСТРИРОАННЫХ ПОЛЬЗОВАТЕЛЕЙ</h1>';
}
?>