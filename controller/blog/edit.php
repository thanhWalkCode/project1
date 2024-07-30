<?php
if (is_array($blog) && !empty($blog)) {
    extract($blog);
}

$hinhPath = './upload/blog/' . $img_blog;
$hinh = (is_file($hinhPath)) ? "<img src='$hinhPath' height='80'>" : "No photo";
?>

<div class="page-wrapper" style="margin-top: 30px;">
    <h1>Cập nhật sản phẩm</h1>
    <form action="index.php?act=update_blog" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="mb-3">
            <label class="form-label">Tiêu đề:</label>
            <input type="text" class="form-control" name="tieude"  value="<?= isset($tieu_de_blog) ? $tieu_de_blog : ''; ?>">
            <span style="color: red"><?= isset($errTen) ? $errTen : ''; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh:</label><br>
            <?= $img_blog; ?> <!-- Hiển thị hình ảnh hiện tại của sản phẩm -->
            <input type="file" class="form-control mt-2" name="img">
            <span style="color: red"></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả sản phẩm:</label>
            <textarea class="form-control" name="mota" placeholder="Mô tả"><?= isset($mo_ta_blog) ? $mo_ta_blog : ''; ?></textarea>
            <span style="color: red"><?= isset($errMota) ? $errMota : ''; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">url:</label>
            <textarea class="form-control" name="url" placeholder="url"><?= isset($url) ? $url : ''; ?></textarea>
            <span style="color: red"><?= isset($errurl) ? $errurl : ''; ?></span>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
        <button  class="btn btn-primary" name="back"><a href="index.php?act=list_blog">Quay về</a></button>
    </form>
</div>

<?php
if (isset($check)) {
    echo $check;
}
?>
