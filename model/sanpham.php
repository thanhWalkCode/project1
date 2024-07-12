<?php
function insert_sanpham($tensp,$giasp,$imgsp,$iddm,$mota){
    $sql = "INSERT INTO `products` (`title`, `price`, `img`, `cate`, `mota`) VALUES ('$tensp', '$giasp', '$imgsp', '$iddm', '$mota')";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql = "DELETE FROM products WHERE `products`.`id` = {$id}";
    pdo_execute($sql);
}
function loadAll_sanpham($kyw,$iddm){
    $sql = "SELECT * FROM `products` where 1";
    if($kyw!=""){
        $sql .=" AND title LIKE '%" .$kyw. "%'";
    }if($iddm>0){
        $sql .=" and cate = '".$iddm."'";
    }
    $sql .=" order by `id` desc ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadAll_sanpham_home(){
    $sql = "SELECT * FROM `products` ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadAll_sanpham_top10(){
    $sql = "SELECT * FROM `products` WHERE 1 ORDER BY luot_xem DESC LIMIT 0, 10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadOne_sanpham($id){
    $sql = "SELECT * FROM `products` WHERE `products`.`id`= $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id,$tensp,$giasp,$mota,$iddm,$imgsp){
    if($imgsp!=""){
        $sql = "UPDATE `products` SET `title` = ' $tensp', `price` = '$giasp', `img` = '$imgsp', `cate` = '$iddm', `mota` = '$mota' WHERE `products`.`id` = $id";
    }else{
        $sql = "UPDATE `products` SET `title` = ' $tensp', `price` = '$giasp', `cate` = '$iddm', `mota` = '$mota' WHERE `products`.`id` = $id";
    }
    pdo_execute($sql);
}
?>