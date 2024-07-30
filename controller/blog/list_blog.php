<div class="page-wrapper" style="margin-top:30px;">
    <h1>Danh sách sản phẩm</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Người đăng</th>
            <th scope="col">Ảnh blog</th>
            <th scope="col">Mô tả </th>
            <th scope="col">Ngày đăng</th>
            <th scope="col">url</th>
            <th scope="col">Opt</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $items_per_page = 6;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($current_page - 1) * $items_per_page;
        $list_blog = load_page_blog_hientai($offset,$items_per_page);
        $total_items = ($list_blog != [] && isset($list_blog)) ? load_total_blog() : 0;
        $total_pages = ceil($total_items / $items_per_page);
        $stt = 1; // Biến đếm STT
        foreach ($list_blog as $item) {
            ?>
            <tr>
                <th scope="row"><?php echo $stt++; ?></th>
                <td><?php echo $item['tieu_de_blog']; ?></td>
                <td><?php echo $item['tai_khoan']; ?></td>
                <td><img width="50px" height="50px" src="../upload/blog/<?php echo $item['img_blog']; ?>" alt="<?php echo $item['img_blog']; ?>"></td>
                <td><textarea style="height:70px" disabled name="" id=""><?php echo $item['mo_ta_blog']; ?></textarea></td>
                <td><?php echo $item['ngay_dang_blog']; ?></td>
                <td><textarea style="height:70px" disabled name="" id=""><?php echo $item['url']; ?></textarea></td>
                <td>
                    <a style="color:black" href="index.php?act=sua_blog&id=<?php echo $item['id']; ?>">Sửa</a>
                    <a style="color:black" href="index.php?act=dele_blog&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary"><a href="index.php?act=add_blog" style="color:white; text-decoration: none;">Thêm bài viết</a></button>
    <div class="pagination-style text-center">
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

</div>    
</div>
