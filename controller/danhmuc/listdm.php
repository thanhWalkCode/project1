<div class="page-wrapper" style="margin-top:30px;">
<h1>Danh sách danh mục </h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên danh mục</th>
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
      <td><?php echo $item['name']?></td>
      <td>
        <a href="#">Sửa</a>
        <a href="index.php?act=deledm&id=<?php echo $item['id']?>" onclick="confirm('Bạn có xác nhận xóa không?')">Xóa</a>
      </td>
    </tr>
    <?php
    }
    ?>
    <button style="" type="button" class="btn btn-primary" ><a href="index.php?act=adddm">Thêm danh mục</a></button>
  </tbody>
</table>


</table>
</div>    
