<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/daxone/daxone/blog-2col.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:12 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daxone - eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/themify.css">
    <!-- othres CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>blog page</h2>
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="active">Blog </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog-area pt-90 pb-90">
            <div class="container">
                <div class="row grid">
                    <div class="grid-sizer"></div>
                    <?php 
                    $items_per_page = 6;
                    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($current_page - 1) * $items_per_page;
                    $list_cmt = load_page_blog_hientai($offset,$items_per_page);
                    $total_items = load_total_blog();
                    $total_pages = ceil($total_items / $items_per_page);
                    foreach($list_cmt as $item){
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="<?php echo $item['url'] ?>"><img src="upload/blog/<?php echo $item['img_blog']?>" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="<?php echo $item['url'] ?>"><?php echo $item['tieu_de_blog']?>.</a></h3>
                                <p><?php echo $item['mo_ta_blog']?>.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">Bởi: <?php echo $item['tai_khoan']?></a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 22+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-5.jpg" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="#">Best wooden angle, with soft cotton seat.</a></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">By: Jone Livers</a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 23+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-6.jpg" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="#">Best wooden angle, with soft cotton seat.</a></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">By: Jone Livers</a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 24+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-7.jpg" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="#">Best wooden angle, with soft cotton seat.</a></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">By: Jone Livers</a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 25+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-8.jpg" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="#">Best wooden angle, with soft cotton seat.</a></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">By: Jone Livers</a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 26+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-item">
                        <div class="blog-wrap mb-45">
                            <div class="blog-img mb-25">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-9.jpg" alt="blog"></a>
                            </div>
                            <div class="blog-content-2">
                                <h3><a href="#">Best wooden angle, with soft cotton seat.</a></h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <div class="blog-meta">
                                    <div class="blog-author">
                                        <a href="#">By: Jone Livers</a>
                                    </div>
                                    <div class="blog-like">
                                        <a href="#"><i class="la la-thumbs-up"></i> 27+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="pagination-style text-center">
                <ul style="list-style:none;display: flex;justify-content: center;">
    <?php if ($current_page > 1) { ?>
        <li><a id="page_item" style="color:black" class="prev" href="index.php?act=blog&page=<?php echo $current_page - 1; ?>"><i class="la la-angle-left"></i></a></li>
    <?php } ?>

    <?php if ($current_page > 3) { ?>
        <li><a id="tab_pre" href="index.php?act=blog&page=1">1</a></li>
        <?php if ($current_page > 4) { ?>
            <li>...</li>
        <?php } ?>
    <?php } ?>

    <?php
    for ($page = max(1, $current_page - 2); $page <= min($total_pages, $current_page + 2); $page++) {
    //     for ($page = 1; $page <= $total_pages; $page++){    
        ?>    
        <li><a class="<?php echo $page == $current_page ? 'active' : 'tab_pre'; ?>" href="index.php?act=blog&page=<?php echo $page; ?>"><?php echo $page?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages - 2) { ?>
        <li>...</li>
        <li><a id="tab_pre" href="index.php?act=blog&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages) { ?>
        <li><a id="page_item" style="color:black" class="next" href="index.php?act=blog&page=<?php echo $current_page + 1; ?>"><i class="la la-angle-right"></i></a></li>
    <?php } ?>
    </ul>
                </div>
            </div>
        </div>
       
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="assets/images/product/quickview-l1.jpg" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="assets/images/product/quickview-l2.jpg" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="assets/images/product/quickview-l3.jpg" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="assets/images/product/quickview-l2.jpg" alt="">
                                    </div>
                                </div>
                                <!-- Thumbnail Large Image End -->
                                <!-- Thumbnail Image End -->
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                        <a class="active" data-bs-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-bs-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-bs-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-bs-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s4.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <span>Life Style</span>
                                    <h2>LaaVista Depro, FX 829 v1</h2>
                                    <div class="product-ratting-review">
                                        <div class="product-ratting">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-half-o"></i>
                                        </div>
                                        <div class="product-review">
                                            <span>40+ Reviews</span>
                                        </div>
                                    </div>
                                    <div class="pro-details-color-wrap">
                                        <span>Color:</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="green"></li>
                                                <li class="yellow"></li>
                                                <li class="red"></li>
                                                <li class="blue"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-size">
                                        <span>Size:</span>
                                        <div class="pro-details-size-content">
                                            <ul>
                                                <li><a href="#">s</a></li>
                                                <li><a href="#">m</a></li>
                                                <li><a href="#">xl</a></li>
                                                <li><a href="#">xxl</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-price-wrap">
                                        <div class="product-price">
                                            <span>$210.00</span>
                                            <span class="old">$230.00</span>
                                        </div>
                                        <div class="dec-rang"><span>- 30%</span></div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                        </div>
                                    </div>
                                    <div class="pro-details-compare-wishlist">
                                        <div class="pro-details-compare">
                                            <a title="Add To Compare" href="#"><i class="la la-retweet"></i> Compare</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="#"><i class="la la-heart-o"></i> Add to wish list</a>
                                        </div>
                                    </div>
                                    <div class="pro-details-buy-now btn-hover btn-hover-radious">
                                        <a href="#">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/counterup.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/instafeed.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/owl-carousel.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/textillate.js"></script>
    <script src="assets/js/plugins/elevatezoom.js"></script>
    <script src="assets/js/plugins/sticky-sidebar.js"></script>
    <script src="assets/js/plugins/smoothscroll.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from template.hasthemes.com/daxone/daxone/blog-2col.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:12 GMT -->
</html>