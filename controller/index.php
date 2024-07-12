<?php
include "../model/connect.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";
if(isset($_GET['act']) && ($_GET['act'] != "")){
   $act = $_GET['act']; 
   $check = "";
   switch($act){
//danh mục
    case "deledm":
        if(isset($_GET['id']) && ($_GET['id'])){
            delete_danhmuc($_GET['id']);
        }
        $list = loadAll_danhmuc();
        include "danhmuc/listdm.php";
    break;

    case "listdm":
        $list = loadAll_danhmuc();
        include "danhmuc/listdm.php";
    break;

    case "adddm":
        if(isset($_POST['submit']) ){
            $name = $_POST['name'];
            if($name == ""){
                $check = "Bắt buộc phải nhập";
            }  
            else if(insert_danhmuc($name)==true){
                $check = "Đã thành công";
            }else{
                $check = "Lỗi nhập";
            }
            
        }
        include "danhmuc/adddm.php";
    break;
    
    case "update_dm":
        if(isset($_GET['id']) && ($_GET['id'] != "")){
            $list = loadOne_danhmuc($_GET['id']);
        }
    include "danhmuc/update_dm.php";    
    break;
    
    case "edit_dm":
        if(isset($_POST['submit']) ){
            $name = $_POST['name'];
            $id = $_POST['id'];
            if($name == ""){
                $check = "Bắt buộc phải nhập";
            }  
            else if(update_danhmuc($id,$name)==true){
                $check = "Đã thành công";
            }else{
                $check = "Lỗi nhập";
            }
            
        }
        $list = loadAll_danhmuc();
        include "danhmuc/listdm.php";
    break;

// sản phẩm
    case "list_sp":
        $list = loadAll_sanpham_home();
        include "sanpham/list_sp.php";
    break;    

    default:
    include "home.php";    
    break;
   }
}else{
    include "home.php";
}

include "footer.php";
?>