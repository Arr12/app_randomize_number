<?php
if(empty($_GET['page'])){
    require('page/home.php');
}
else{
    if($_GET['page']=='nomer'){
        require('page/nomer.php');
    }
    else if($_GET['page']=='nama'){
        require('page/nama.php');
    }
    else{
        echo "<meta http-equiv='refresh' content='0; index.php' />";
    }
}
?>