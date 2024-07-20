<?php
include "views/header.php";
include "model/connect.php";
include "model/sanpham.php";
include "model/danhmuc.php";

$listsanpham = load_all();
$list_dm = loadAll_danhmuc();
if(isset($_GET['act']) && ($_GET['act']) != ""){
$act = $_GET['act'];
$kyw = "";$checkshop = "";
// $list_tendm=[];$list_tensp=[];
switch($act){
    case "lien_he":
        include "views/lien_he.php";
    break;
    
    case "bao_hanh":
        include "views/bao_hanh.php";
    break;  

    case "shop":
        if(isset($_POST['search']) && $_POST['search'] != "" ){
            $kyw=$_POST['kyw'];
            $list_tensp = search_sp($kyw);
        }
        if(isset($_GET['name_dm']) && $_GET['name_dm'] != ""){
            $name_dm = $_GET['name_dm'];
            $list_tendm = search_dm($name_dm);
        }
        
        include "views/shop.php";
        break;    
    
    case "phobien":
        if(isset($_GET['gia2tr']) && $_GET['gia2tr']){
            $gia = $_GET['gia2tr'];
            $list_sp_price = load_sanpham_gia($gia);
        }else if(isset($_GET['gia5tr']) && $_GET['gia5tr']){
            $gia = $_GET['gia5tr'];
            $list_sp_price = load_sanpham_gia($gia);
        }
        
        include "views/shop.php";
        break;    

    case "detail_sp":
        if(isset($_GET['id'])){
            $listsanpham = loadone_sanpham($_GET['id']);
            extract($listsanpham);
        }
        $list_sp_decu = load_all();
        include "views/detail_product.php";
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