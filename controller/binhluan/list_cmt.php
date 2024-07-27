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
    $stt = 0;
    foreach($list as $item){
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


</table>
</div>    
