<?php
include'./includes/header.inc.php';
include'./includes/navbar.inc.php';

if(isset($_GET['page'])){
    echo $_GET['page'];
include './pages/'.$_GET['page'].'.php';
}else{
    echo '<h1>Home page</h1>';
}



include'./includes/footer.inc.php';
?>
