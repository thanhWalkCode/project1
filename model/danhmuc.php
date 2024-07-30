<?php
function insert_danhmuc($tenloai,$img){
    $sql = "INSERT INTO `danh_muc` (`name`, `anh_danh_muc`) VALUES ('$tenloai', '$img')";
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
    $sql = "SELECT * FROM `danh_muc` WHERE `id`={$id}";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai,$img){
    if($img == ""){
        $sql = "UPDATE `danh_muc` SET `name` = '$tenloai' WHERE `danh_muc`.`id` = $id";
    }else{
        $sql = "UPDATE `danh_muc` SET `name` = '$tenloai', `anh_danh_muc` = '$img' WHERE `danh_muc`.`id` = $id";
    }
    pdo_execute($sql);
    return true;
}
function load_total_dm() {
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT COUNT(*) AS total FROM danh_muc";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
 
function load_page_dm_hientai($offset, $items_per_page) {
    $sql = "SELECT * 
            FROM danh_muc 
            LIMIT :offset, :items_per_page"; // Sử dụng tham số để tránh SQL injection

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->bindValue(':items_per_page', (int)$items_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
}
?>