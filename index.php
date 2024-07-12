<?php
include "views/header.php";
if(isset($_GET['act']) && ($_GET['act']) != ""){
$act = $_GET['act'];
switch($act){
    case "chitietsp":
    include "views/chitietsp.php";
    break;    
    
    default: 
    include "views/home.php";
    break;    
    
}
}else{
    include "views/home.php";   
}
include "views/footer.php";
?>