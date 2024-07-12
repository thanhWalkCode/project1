<div class="page-wrapper" style="margin-top:30px">
<h1>Sửa danh mục</h1>

<form method="post" action="index.php?act=edit_dm">
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input style="background:white" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="" disabled>
    <input type="hidden" name="id" value = <?php echo $list['id']?>>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Tên danh mục</label>
    <input type="text" class="form-control"  value="<?php echo $list['name']?>" name="name">
  </div>
  <p>
  <?php
  if($check != "" && isset($check)){
    echo $check;
  }
  ?>
  </p>
  <button type="submit" class="btn btn-primary" name="submit"><a>Submit</a></button>
  <button type="reset" class="btn btn-primary" name="reset"><a>Reset</a></button>
  <button type="submit" class="btn btn-primary"><a href="index.php?act=listdm">List danh mục</a></button>
</form>

</div>
