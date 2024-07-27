<?php
function insert_binhluan($id_san_pham,$id_nguoi_dung,$noi_dung){
    $sql = "INSERT INTO `binh_luan` (`id_san_pham`, `id_nguoi_dung`, `thoi_gian_binh_luan`, `noi_dung`) VALUES ('$id_san_pham', '$id_nguoi_dung', CURRENT_TIMESTAMP, '$noi_dung')";
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql = "DELETE FROM binh_luan WHERE `binh_luan`.`id` = $id";
    pdo_execute($sql);
}
function loadAll_binhluan() {
    $sql = "SELECT san_pham.*, nguoi_dung.*,binh_luan.*
            FROM binh_luan
            JOIN nguoi_dung ON binh_luan.id_nguoi_dung = nguoi_dung.id
            JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
            WHERE 1=1;";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function load_binhluan_theo_id($id){
    $sql = "SELECT binh_luan.*, nguoi_dung.*
    FROM nguoi_dung
    JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
    JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
    Where san_pham.id = $id";
    $dm = pdo_query($sql);
    return $dm;
}
function update_binhluan($id,$tenloai,$img){
    if($img == ""){
        $sql = "UPDATE `binh_luan` SET `name` = '$tenloai' WHERE `binh_luan`.`id` = $id";
    }else{
        $sql = "UPDATE `binh_luan` SET `name` = '$tenloai', `anh_binh_luan` = '$img' WHERE `binh_luan`.`id` = $id";
    }
    pdo_execute($sql);
    return true;
}
?>