<div class="page-wrapper" style="margin-top:30px;">
<h1>Danh sách sản phẩm </h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá sản phẩm</th>
      <th scope="col">Ảnh sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Ngày đăng</th>
      <th scope="col">Danh mục sản phẩm</th>
      <th scope="col">Opt</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stt = 0;
    foreach($list as $item){
    ?>
    <tr>
      <th scope="row"><?php echo $stt++?></th>
      <td><?php echo $item['ten_san_pham']?></td>
      <td><?php echo $item['gia_san_pham'] ?> <span style="color:red;">VNĐ</span></td>
      <td><img width="50px" height="50px" src="../upload/<?php echo $item['anh_san_pham']?>" alt="imgsp"></td>
      <td><?php echo $item['so_luong']?></td>
      <td><?php echo $item['mo_ta']?></td>
      <td><?php echo $item['ngay_dang']?></td>
      <td><?php echo $item['id_danh_muc']?></td>
      <td>
        <a style="color:black" href="index.php?act=update_sp&id=<?php echo $item['id']?>">Sửa</a>
        <a style="color:black" href="index.php?act=dele_sp&id=<?php echo $item['id']?>" onclick="confirm('Bạn có xác nhận xóa không?')">Xóa</a>
      </td>
    </tr>
    <?php
    }
    ?>
    <button  type="button" class="btn btn-primary" ><a href="index.php?act=add_sp">Thêm sản phẩm</a></button>
  </tbody>
</table>


</table>
</div>    
