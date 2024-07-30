<div class="page-wrapper" style="margin-top:30px;">
<h1>Danh sách danh mục </h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Ảnh danh mục</th>
      <th scope="col">Opt</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $items_per_page = 8;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $items_per_page;
    $lisdanhmuc = load_page_dm_hientai($offset,$items_per_page);
    $total_items = load_total_dm();
    $total_pages = ceil($total_items / $items_per_page);
    $stt = 1;
    foreach($lisdanhmuc as $item){
    ?>
    <tr>
      <th scope="row"><?php echo $stt++?></th>
      <td><?php echo $item['name']?></td>
      <td><img width="50px" height="50px" src="../upload/icon_hang/<?php echo $item['anh_danh_muc']; ?>" alt="<?php echo $item['name']; ?>"></td>
      <td>
        <a style="color:black" href="index.php?act=update_dm&id=<?php echo $item['id']?>">Sửa</a>
        <a style="color:black" href="index.php?act=deledm&id=<?php echo $item['id']?>" onclick="return confirm('Bạn có xác nhận xóa không?')">Xóa</a>
      </td>
    </tr>
    <?php
    }
    ?>
    <button  type="button" class="btn btn-primary" ><a href="index.php?act=adddm">Thêm danh mục</a></button>
  </tbody>
</table>
<ul style="list-style:none;display: flex;justify-content: center;">
    <?php if ($current_page > 1) { ?>
        <li><a id="page_item" style="color:black" class="prev" href="index.php?act=list_sp&page=<?php echo $current_page - 1; ?>"><i class="la la-angle-left"></i></a></li>
    <?php } ?>

    <?php if ($current_page > 3) { ?>
        <li><a id="tab_pre" href="index.php?act=list_sp&page=1">1</a></li>
        <?php if ($current_page > 4) { ?>
            <li>...</li>
        <?php } ?>
    <?php } ?>

    <?php
    for ($page = max(1, $current_page - 2); $page <= min($total_pages, $current_page + 2); $page++) {
    //     for ($page = 1; $page <= $total_pages; $page++){    
        ?>    
        <li><a id="<?php echo $page == $current_page ? 'active' : 'tab_pre'; ?>" href="index.php?act=list_sp&page=<?php echo $page; ?>"><?php echo $page?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages - 2) { ?>
        <li>...</li>
        <li><a id="tab_pre" href="index.php?act=list_sp&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages) { ?>
        <li><a id="page_item" style="color:black" class="next" href="index.php?act=list_sp&page=<?php echo $current_page + 1; ?>"><i class="la la-angle-right"></i></a></li>
    <?php } ?>
    </ul>

</table>
</div>    
