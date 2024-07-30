<?php
ob_start();
session_start();
if(($_SESSION['role']) && ($_SESSION['role']) != ""){
    $chucvu = $_SESSION['role'];
    if($chucvu == 2){   
}
}else{
    header("location: ../index.php");
}
include "header.php";
include "../model/connect.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/user.php";
include "../model/binhluan.php";
include "../model/blog.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    $check = "";
    $check_dm = "";
    switch ($act) {
        // danh mục
        case "deledm":
            if (isset($_GET['id']) && ($_GET['id'])) {
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
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $img_dm = $_FILES['img_dm']['name'];
                $target = "../upload/icon_hang/".basename($_FILES['img_dm']['name']);
                if ($name == "") {
                    $check = "Bắt buộc phải nhập";
                }if ($img_dm == "") {
                    $check_dm = "Bắt buộc phải nhập";
                } 
                
                if(move_uploaded_file($_FILES['img_dm']['tmp_name'],$target)){
                    insert_danhmuc($name,$img_dm);
                    $check_dm = "Đã thành công";
                }
            }
            include "danhmuc/adddm.php";
            break;

        case "update_dm":
            if (isset($_GET['id']) && ($_GET['id'] != "")) {
                $list = loadOne_danhmuc($_GET['id']);
            }
            include "danhmuc/update_dm.php";
            break;

        case "edit_dm":
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $img_dm = $_FILES['img_dm']['name'];
                $id = $_POST['id'];
                $target = "../upload/icon_hang/".basename($_FILES['img_dm']['name']);
                        
                        move_uploaded_file($_FILES['img_dm']['tmp_name'],$target);
                        update_danhmuc($id, $name,$img_dm);
                        $check = "Đã thành công";
                 
                
                
                } 
            $list = loadAll_danhmuc();
            include "danhmuc/listdm.php";
            break;

        // sản phẩm        
        case "list_sp":
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $items_per_page = 4;
            $offset = ($current_page - 1) * $items_per_page;
            $listsanpham = load_page_sp_hientai($offset,$items_per_page);
            if(isset($_POST['search']) && $_POST['search'] != "" ){
                $kyw=$_POST['kyw'];
                $list_tensp = search_sp($kyw);
            }
            $total_items = load_total_sp();
            $total_pages = ceil($total_items / $items_per_page);
            include "sanpham/list_sp.php";
            break;

        case "addsp":
            if (isset($_POST['submit'])) {
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];
                $ngaydang = $_POST['ngaydang'];
                $iddm = $_POST['iddm'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['imgsp']['name'];
                $errTen = $errHinh = $errPrice = $errSoluong = $errNgaydang = $errIddm = $errMota = null;

                if (empty($tensp)) {
                    $errTen = 'Vui lòng nhập tên sản phẩm';
                }
                if ($_FILES['imgsp']['error'] != UPLOAD_ERR_OK) {
                    $errHinh = 'Vui lòng chọn ảnh';
                }
                if (empty($giasp) || $giasp <= 0) {
                    $errPrice = 'Vui lòng nhập giá sản phẩm hợp lệ';
                }
                if (empty($soluong) || $soluong <= 0) {
                    $errSoluong = 'Vui lòng nhập số lượng sản phẩm hợp lệ';
                }
                if (empty($ngaydang)) {
                    $errNgaydang = 'Vui lòng chọn ngày đăng';
                }
                if (empty($iddm)) {
                    $errIddm = 'Vui lòng chọn một danh mục';
                }
                if (empty($mota)) {
                    $errMota = 'Vui lòng nhập mô tả';
                }

                if (empty($errTen) && empty($errHinh) && empty($errPrice) && empty($errSoluong) && empty($errNgaydang) && empty($errIddm) && empty($errMota)) {
                    $target = '../upload/'.basename($_FILES['imgsp']['name']);
                    if (move_uploaded_file($_FILES['imgsp']['tmp_name'], $target)) {

                        insert_sanpham($tensp, $giasp, $hinh, $soluong, $ngaydang, $iddm, $mota);
                       
                    } else {
                        $errHinh = 'Có lỗi xảy ra khi tải file.';
                    }
                }
            }

            $list = loadAll_danhmuc();
            include "sanpham/add.php";
            break;

        

        case "sua_sp":
        {
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sp = loadone_sanpham($_GET['id']);
            }
            $list = loadAll_danhmuc();
            include "sanpham/edit.php";
            break;
        }

        case "update_sp":
        {   $errTen = $errHinh = $errPrice = $errSoluong = $errNgaydang = $errIddm = $errMota = null;
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $ngaydang = $_POST['ngaydang'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['imgsp']['name'];


                if (empty($tensp)) {
                    $errTen = 'Vui lòng nhập tên sản phẩm';
                }
                if ($_FILES['imgsp']['error'] != UPLOAD_ERR_OK) {
                    $errHinh = 'Vui lòng chọn ảnh';
                }
                if (empty($giasp) || $giasp <= 0) {
                    $errPrice = 'Vui lòng nhập giá sản phẩm hợp lệ';
                }
                if (empty($soluong) || $soluong <= 0) {
                    $errSoluong = 'Vui lòng nhập số lượng sản phẩm hợp lệ';
                }
                if (empty($ngaydang)) {
                    $errNgaydang = 'Vui lòng chọn ngày đăng';
                }
                if (empty($iddm)) {
                    $errIddm = 'Vui lòng chọn một danh mục';
                    header("location:sanpham/list.php");
                }
                if (empty($mota)) {
                    $errMota = 'Vui lòng nhập mô tả';
                }


                if ($img == "") {
                    update_sanpham_0img($id, $tensp, $giasp, $soluong, $ngaydang, $iddm, $mota);
                    
                }else{
                    $target = '../upload/' . basename($_FILES['imgsp']['name']);
                    move_uploaded_file($_FILES['imgsp']['tmp_name'], $target);

                    update_sanpham($id, $tensp, $giasp, $img, $soluong, $ngaydang, $iddm, $mota);
                }


            }

            // $list = loadAll_danhmuc();
            $list = load_all();
            include "sanpham/list_sp.php";
            break;
        }


        case "dele_sp":
        {
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            // $list = loadAll_danhmuc();
            $list = load_all();
            include "sanpham/list_sp.php";
            break;
        }
        // user
        case "list_user":
            $list = loadAll_user();
            include "admin/list_admin.php";
            break;

        case "list_cmt":
            $list = loadAll_binhluan();
            include "binhluan/list_cmt.php";
            break;    

        case "dele_cmt":
            if(isset($_GET['id']) && $_GET['id'] != 0){
                delete_binhluan($_GET['id']);
                header("location:index.php?act=list_cmt");
                exit();
            }
            break;     
        
        // blog 
        case "list_blog":
            include "blog/list_blog.php";
            break;    

        case "add_blog":
            if (!isset($_SESSION['id'])) {
                die("ID người dùng không tồn tại trong session.");
            }
            if (isset($_POST['submit'])) {
                $tieu_de_blog = $_POST['tieu_de_blog'];
                $id_user = $_POST['id_user'];
                $mota = $_POST['mota'];
                $url = $_POST['url'];
                $hinh = $_FILES['imgblog']['name'];
            
                $errTen = $errHinh = $errMota = $errUrl = null;
            
                if (empty($tieu_de_blog)) {
                    $errTen = 'Vui lòng nhập tiêu đề blog';
                }
                if ($_FILES['imgblog']['error'] != UPLOAD_ERR_OK) {
                    $errHinh = 'Vui lòng chọn ảnh';
                }
                if (empty($mota)) {
                    $errMota = 'Vui lòng nhập mô tả';
                }
                if (empty($url)) {
                    $errUrl = 'Vui lòng nhập mô tả';
                }
            
                if (empty($errTen) && empty($errHinh) && empty($errMota)) {
                    $target = '../upload/blog/' . basename($hinh);
                    if (move_uploaded_file($_FILES['imgblog']['tmp_name'], $target)) {
                        insert_blog($id_user, $tieu_de_blog, $hinh, $mota,$url);
                        echo "Bài viết đã được thêm thành công.";
                    } else {
                        $errHinh = 'Có lỗi xảy ra khi tải file.';
                    }
                }
            }
            include "blog/add.php";
            break;
        
        case "dele_blog":
            if(isset($_GET['id']) && $_GET['id']){
                delete_blog($_GET['id']);
            }
            include "blog/list_blog.php";
            break;     

        case "sua_blog":
            {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $blog = loadOne_blog($_GET['id']);
                }
                // $list = loadAll_blog();
                include "blog/edit.php";
                break;
            }
        
        case "update_blog":
        {   $errTen = $errMota = $errurl = null;
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $tieude = $_POST['tieude'];
                $mota = $_POST['mota'];
                $url = $_POST['url'];
                $img = $_FILES['img']['name'];


                if (empty($tensp)) {
                    $errTen = 'Vui lòng nhập tên sản phẩm';
                }
                if (empty($url)) {
                    $errUrl = 'Vui lòng nhập tên sản phẩm';
                }
                if (empty($mota)) {
                    $errMota = 'Vui lòng nhập mô tả';
                }
                else{
                    $target = '../upload/blog/' . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $target);

                    update_blog($id,$tieude,$img,$mota,$url);
                }


            }
            include "blog/list_blog.php";
            break;
        }

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
ob_end_flush();
?>