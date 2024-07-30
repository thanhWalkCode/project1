<div class="page-wrapper" style="margin-top:30px;">
    <h1>Danh sách sản phẩm</h1>
    <div class="sidebar-widget">
        <h4 class="sidebar-title">Tìm kiếm <?php echo isset($kyw) ? $kyw : ""; ?></h4>
        <div class="sidebar-search mb-40 mt-20">
            <form class="sidebar-search-form" action="index.php?act=list_sp" method="post">
                <input type="text" placeholder="Tìm kiếm ở đây..." name="kyw">
                <input type="submit" name="search">
            </form>
        </div>
    </div>
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
        $stt = 1; // Biến đếm STT
        foreach ((isset($list_tensp) ? $list_tensp : $listsanpham) as $item) {
            ?>
            <tr>
                <th scope="row"><?php echo $stt++; ?></th>
                <td><?php echo $item['ten_san_pham']; ?></td>
                <td><?php echo number_format($item['gia_san_pham'], 0, ',', '.'); ?> <span style="color:red;">VNĐ</span></td>
                <td><img width="50px" height="50px" src="../upload/<?php echo $item['anh_san_pham']; ?>" alt="<?php echo $item['ten_san_pham']; ?>"></td>
                <td><?php echo $item['so_luong']; ?></td>
                <td><textarea style="height:70px" disabled name="" id=""><?php echo $item['mo_ta']; ?></textarea></td>
                <td><?php echo $item['ngay_dang']; ?></td>
                <td><?php echo $item['name']; ?></td>
                
                <td>
                    <a style="color:black" href="index.php?act=sua_sp&id=<?php echo $item['id']; ?>">Sửa</a>
                    <a style="color:black" href="index.php?act=dele_sp&id=<?php echo $item['id']; ?>" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary"><a href="index.php?act=addsp" style="color:white; text-decoration: none;">Thêm sản phẩm</a></button>
    <div class="pagination-style text-center">
    <?php if(isset($list_tensp)){}else{?>
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
    <?php }?>    
</div>    
</div>
