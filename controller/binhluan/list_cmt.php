<div class="page-wrapper" style="margin-top:30px;">
<h1>Danh sách danh mục </h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Thời gian bình luận</th>
      <th scope="col">Opt</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $items_per_page = 8;
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $items_per_page;
    $listcmt = load_page_cmt_hientai($offset,$items_per_page);
    $total_items = load_total_cmt();
    $total_pages = ceil($total_items / $items_per_page);
    $stt = 1;
    foreach($listcmt as $item){
    ?>
    <tr>
      <td scope="row"><?php echo $stt++?></td>
      <td><?php echo $item['tai_khoan']?></td>
      <td><?php echo $item['ten_san_pham']?></td>
      <td><?php echo $item['noi_dung']?></td>
      <td><?php echo $item['thoi_gian_binh_luan']?></td>
      <td>
      <a style="color:black" href="index.php?act=dele_cmt&id=<?php echo $item['id']?>" onclick="return confirm('Bạn có xác nhận xóa không?')">Xóa</a>
      
      </td>
    </tr>
    <?php
    }
    ?>
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
        <li><a id="<?php echo $page == $current_page ? 'active' : 'tab_pre'; ?>" href="index.php?act=list_cmt&page=<?php echo $page; ?>"><?php echo $page?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages - 2) { ?>
        <li>...</li>
        <li><a id="tab_pre" href="index.php?act=list_cmt&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages) { ?>
        <li><a id="page_item" style="color:black" class="next" href="index.php?act=list_cmt&page=<?php echo $current_page + 1; ?>"><i class="la la-angle-right"></i></a></li>
    <?php } ?>
    </ul>

</table>
</div>    
