<?php
include "../model/connect.php";
include "../model/danhmuc.php";
include "header.php";
if(isset($_GET['act']) && ($_GET['act'] != "")){
   $act = $_GET['act']; 
   $check = "";
   switch($act){

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
    
    
    default:
    include "home.php";    
    break;
   }
}else{
    include "home.php";
}

include "footer.php";
?>