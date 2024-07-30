<?php
function  insert_blog($id_user,$tieu_de_blog,$hinh,$mota,$url){
    $sql = "INSERT INTO `blog` (`id_nguoi_dung`, `tieu_de_blog`, `img_blog`, `mo_ta_blog`, `ngay_dang_blog`,`url`) 
    VALUES ('$id_user', '$tieu_de_blog', '$hinh', '$mota', CURRENT_TIMESTAMP, $url)";
    pdo_execute($sql);
}
function delete_blog($id){
    $sql = "DELETE FROM blog WHERE `blog`.`id` = $id";
    pdo_execute($sql);
}
function loadAll_blog(){
    $sql = "SELECT * FROM `blog` order by `id` desc ";
    $listblog = pdo_query($sql);
    return $listblog;
}
function loadOne_blog($id){
    $sql = "SELECT nguoi_dung.*, blog.* 
    FROM `blog` 
    INNER JOIN nguoi_dung ON blog.id_nguoi_dung = nguoi_dung.id
    WHERE blog.`id`={$id}";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_blog($id,$tieu_de_blog,$hinh,$mota,$url){
    if($hinh == ""){
        $sql = "UPDATE `blog` SET `tieu_de_blog` = '$tieu_de_blog',`mo_ta_blog` = '$mota', `url` = '$url' 
        WHERE `blog`.`id` = $id";
    }else{
        $sql = "UPDATE `blog` SET `tieu_de_blog` = '$tieu_de_blog', `img_blog` = '$hinh', `mo_ta_blog` = '$mota', `url` = '$url' 
        WHERE `blog`.`id` = $id";
    }
    pdo_execute($sql);
    return true;
}
function load_total_blog() {
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT nguoi_dung.*, COUNT(blog.id) AS total
        FROM blog
        INNER JOIN nguoi_dung ON blog.id_nguoi_dung = nguoi_dung.id
        GROUP BY nguoi_dung.id";
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
 
function load_page_blog_hientai($offset, $items_per_page) {
    $sql = "SELECT nguoi_dung.*,blog.* 
            FROM blog 
            INNER JOIN nguoi_dung ON blog.id_nguoi_dung = nguoi_dung.id
            LIMIT $offset, $items_per_page"; // Sử dụng tham số để tránh SQL injection
    
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sp = $stmt->fetchAll();
    return $sp;
}
?>