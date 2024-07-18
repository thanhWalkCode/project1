<?php
function insert_sanpham($tensp, $giasp, $imgsp, $soluong, $ngaydang, $iddm, $mota) {
    $sql = "INSERT INTO `san_pham` (`ten_san_pham`, `gia_san_pham`, `anh_san_pham`, `so_luong`, `ngay_dang`, `id_danh_muc`, `mo_ta`) 
            VALUES ('$tensp', '$giasp', '$imgsp', '$soluong', '$ngaydang', '$iddm', '$mota')";

    pdo_execute($sql);
};

function delete_sanpham($id) {
    $sql = "DELETE  FROM san_pham WHERE id =" . $_GET['id'];
    pdo_execute($sql);
}

function search_sp($kyw){
    $sql = "SELECT sp.*, dm.name
    FROM san_pham sp
    JOIN danh_muc dm ON sp.id_danh_muc = dm.id
    WHERE 1=1";
    if ($kyw != "") {
    $sql .= " AND sp.ten_san_pham LIKE '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY sp.id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_all() {
    $sql = "SELECT sp.*, dm.name 
            FROM san_pham sp
            INNER JOIN danh_muc dm ON sp.id_danh_muc = dm.id";

    // Thực thi câu truy vấn
    $rows = pdo_query($sql);


    // Trả về kết quả
    return $rows;
}

function loadAll_sanpham_home(){
    $sql = "SELECT * FROM `san_pham` ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadAll_sanpham_top($id){
    $sql = "SELECT * FROM `san_pham` WHERE `id_danh_muc` = $id";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)   {
    $sql = "SELECT * FROM san_pham WHERE id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
//function update_sanpham($id,$tensp,$giasp,$mota,$iddm,$imgsp){
//    if($imgsp!=""){
//        $sql = "UPDATE `san_pham` SET `title` = ' $tensp', `price` = '$giasp', `img` = '$imgsp', `cate` = '$iddm', `mota` = '$mota' WHERE `san_pham`.`id` = $id";
//    }else{
//        $sql = "UPDATE `san_pham` SET `title` = ' $tensp', `price` = '$giasp', `cate` = '$iddm', `mota` = '$mota' WHERE `san_pham`.`id` = $id";
//    }
//    pdo_execute($sql);
//}

function update_sanpham($id, $tensp, $giasp, $imgsp, $soluong, $ngaydang, $iddm, $mota) {
    $sql = "UPDATE `san_pham` SET 
            `ten_san_pham` = '$tensp', 
            `gia_san_pham` = '$giasp', 
            `anh_san_pham` = '$imgsp', 
            `so_luong` = '$soluong', 
            `ngay_dang` = '$ngaydang', 
            `id_danh_muc` = '$iddm', 
            `mo_ta` = '$mota' 
            WHERE `id` = $id";

    pdo_execute($sql);
}
function update_sanpham_0img($id, $tensp, $giasp, $soluong, $ngaydang, $iddm, $mota){
    $sql = "UPDATE `san_pham` SET 
            `ten_san_pham` = '$tensp', 
            `gia_san_pham` = '$giasp',  
            `so_luong` = '$soluong', 
            `ngay_dang` = '$ngaydang', 
            `id_danh_muc` = '$iddm', 
            `mo_ta` = '$mota' 
            WHERE `id` = $id";

    pdo_execute($sql);
}
