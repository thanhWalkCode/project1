<?php
include "views/header.php";
include "model/connect.php";
include "model/sanpham.php";
include "model/danhmuc.php";

$list = load_all();
$list_dm = loadAll_danhmuc();
if(isset($_GET['act']) && ($_GET['act']) != ""){
$act = $_GET['act'];
switch($act){
    case "chitietsp":
        include "views/chitietsp.php";
        break;    

    case "shop":
        if(isset($_POST['search'])&&$_POST['search']){
            $kyw=$_POST['kyw'];
            
        }else{
            $kyw='';
            
        }
        $listsanpham = search_sp($kyw);
        include "views/shop.php";
        break;    

    case "topsp":
        if(isset($_GET['id'])){
            $load_top10 = loadAll_sanpham_top($_GET['id']);
        }
        include "views/home.php";
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