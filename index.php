<?php
require_once('function.php');
$obj = new randomize;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Randomize Kelompok</title>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
</head>
<body>
    <div class='header'>
        <div class='logo'><a href='index.php'><img src='img/dadu.png' alt='Logo'></a></div>
        <div class='menu'>
            <ul>
                <?php 
                if(empty($_GET['page'])){
                    $obj->menu_zero();
                }else{
                    $_SESSION['link']=$_GET['page'];
                    $obj->menu();
                }
                ?>
            </ul>
        </div>
    </div>
    <div class='body'>
        <div class='judul'>
            <h1>Randomize Number</h1>
            <p>Random Number yang dapat digunakan untuk pemilihan kelompok ataupun pemilihan keberuntungan lainnya</p>
        </div>
        <div class='link'>
            <?php $obj->link(); ?>
        </div>
        <div class='content'>
            <?php require_once('content.php'); ?>  
        </div>
    </div>
    <div class='footer'>
        <p>All Right Reserved &copy; Muchammad Aryo Puruhito & Ayub Tribowo 2019</p>
    </div>
</body>
</html>