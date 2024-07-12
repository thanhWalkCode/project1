<?php
function insert_danhmuc($tenloai){
    $sql = "INSERT INTO `danh_muc` (`name`) VALUES ('$tenloai')";
    pdo_execute($sql);
    return true;
}
function delete_danhmuc($id){
    $sql = "DELETE FROM danh_muc WHERE `danh_muc`.`id` = $id";
    pdo_execute($sql);
}
function loadAll_danhmuc(){
    $sql = "SELECT * FROM `danh_muc` order by `id` desc ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadOne_danhmuc($id){
    $sql = "SELECT * FROM `danh_muc` WHERE `id_cate`={$id}";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    $sql = "UPDATE `danh_muc` SET `name_cate`='{$tenloai}' WHERE `id_cate`={$id}";
    pdo_execute($sql);
}
?>