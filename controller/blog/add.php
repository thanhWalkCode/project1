<div class="page-wrapper" style="margin-top:30px;">
    <h1>Thêm bài viết </h1>
    <form action="index.php?act=add_blog" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tiêu đề blog:</label>
            <input type="text" class="form-control" name="tieu_de_blog" placeholder="Tiêu đề">
            <span style="color: red"><?= isset($errTen) ? $errTen : '' ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh blog:</label>
            <input type="file" class="form-control" name="imgblog">
            <span style="color: red"><?= isset($errHinh) ? $errHinh : '' ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả:</label>
            <textarea class="form-control" name="mota" placeholder="mô tả, nội dung"></textarea>
            <span style="color: red"><?= isset($errMota) ? $errMota : '' ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Url:</label>
            <textarea class="form-control" name="url" placeholder="url"></textarea>
            <span style="color: red"><?= isset($errUrl) ? $errUrl : '' ?></span>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id'];?>">
        <button type="submit" class="btn btn-primary" name="submit">Thêm bài viết</button>
        <a href="index.php?act=list_blog" class="btn btn-secondary">Quay về</a>
        <p><?php  echo $_SESSION['id']; ?></p>
    </form>

</div>

<?php
if (isset($check)) {
    echo $check;
}
?>
