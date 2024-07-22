<?php
ob_start();
session_start();
include "views/header.php";
include "model/connect.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/user.php";

$list_user = loadAll_user();
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
    
    case "login":
        if(isset($_POST['login'])){
            foreach($list_user as $item){
            // extract($list_user);
            if($_POST['user_name'] == "" || $_POST['user_password'] == ""){
                $check = "Vui lòng điền đầy đủ thông tin";
            }
            else if($_POST['user_name'] == $item['tai_khoan'] && $_POST['user_password'] == $item['mat_khau']){
                $_SESSION['user'] = $_POST['user_name'];
                $_SESSION['pass'] = $_POST['user_password'];
                $_SESSION['role'] = $item['id_chuc_vu'];
                header("location:index.php");
                exit();
            }else{
                $check = "Sai thông tin tài khoản hoặc mật khẩu";
            }
        }
        }
        include "views/user/login.php";
    break;

    case "sign_up":
        if(isset($_POST['dangky'])){
            $user_exiest = false;
            foreach($list_user as $item){
                if($_POST['user_name'] === $item['tai_khoan']){
                    $user_exiest = true;
                }
            }
            if($user_exiest == true){
                $check_re = "Tài khoản đã tồn tại";
            }else if($_POST['user_name'] == "" || $_POST['user_password'] == "" || $_POST['email'] == "" || $_POST['sdt'] == ""){
                $check_re = "Vui lòng điền đầy đủ thông tin";
            }else{
                $_SESSION['user'] = $_POST['user_name'];
                $_SESSION['pass'] = $_POST['user_password'];
                $_SESSION['email'] = $item['email'];
                $_SESSION['sdt'] = $item['sdt'];
                insert_user($_SESSION['user'],$_SESSION['pass'],$_SESSION['email'],$_SESSION['sdt']);
                $check_re = "Đăng ký thành công, đăng nhập ngay thôi (●'◡'●).";
            }
        }
        
        include "views/user/sign_up.php";
    break;    

    case "log_out":
        session_unset();
        header("location:index.php");
        exit();
        include "views/home.php";
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
ob_end_flush(); 
?>