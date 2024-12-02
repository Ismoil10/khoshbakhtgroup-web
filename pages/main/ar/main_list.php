<!-- Begin Slider Area -->

<?

$select_banner = db::arr("SELECT product.*, 
bl.NAME AS BRAND_NAME
FROM products_list AS product
LEFT JOIN brands_list AS bl ON bl.ID = product.BRAND_ID
WHERE product.AD = 1 AND product.ACTIVE=1");

$select_brand = db::arr("SELECT product.*, 
bl.NAME AS BRAND_NAME,
bl.LOGO AS LOGO_URL
FROM products_list AS product
LEFT JOIN brands_list AS bl ON bl.ID = product.BRAND_ID
WHERE product.CHOISE =1 AND product.ACTIVE=1");

$select_deals = db::arr("SELECT product.*, 
bl.NAME AS BRAND_NAME
FROM products_list AS product
LEFT JOIN brands_list AS bl ON bl.ID = product.BRAND_ID
WHERE product.SPEC_DEALS = 1 AND product.ACTIVE=1");

bot::sendMessageText();

?>

<div class="slider-area">
    <!-- Main Slider -->
    <div class="swiper-container main-slider swiper-arrow with-bg_white">
        <? //echo '<pre>'; print_r($_POST); echo '</pre>';
        ?>
        <div class="swiper-wrapper">
            <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '9']) as $v) : ?>
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner bg-height header-img-<?= $v['ID'] ?>">
                        <img src="<?= $v['image']; ?>" alt="">
                    </div>
                </div>
            <? endforeach ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination with-bg d-md-none"></div>

        <!-- Custom Arrows -->
        <div class="custom-arrow-wrap d-none d-md-block">
            <div class="custom-button-prev"></div>
            <div class="custom-button-next"></div>
        </div>
    </div>

</div>
<pre><? //print_r(view::CONTENT('all_active',['IBLOCK_ID'=>'15'])); 
        ?></pre>

<!-- Slider Area End Here -->
<!-- $template_path?>assets/images/banner/1-1-400x250.jpg -->
<div class="background-img">
    <? //echo '<pre>'; print_r($_GET); echo '</pre>';
    ?>
    <div class="banner-area section-space-top-100">
        <div class="container">
            <div class="row">
                <? foreach ($select_banner as $v) : ?>
                    <?
                    $get_img = json_decode($v['IMAGES'], true);
                    $str = strtolower($v['BRAND_NAME']);
                    ?>
                    <div class="col-lg-4 col-md-6 shade-border banner-top">
                        <div class="banner-item img-hover-effect box-shadow">
                            <h2 class="title text-color"><?=$v['NAME_AR'] ?><br>أحدث</h2>
                            <div class="banner-img img-zoom-effect bg-color">
                                <a class="center-image" href="<?= mdir("product/$str/$v[ID]") ?>">
                                    <img class="justify-content-center c-img" src="<?= $get_img['img_1'] ?>" alt="Banner Image">
                                </a>
                                <div class="inner-content text-white">
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="<?= mdir("product/$str/$v[ID]") ?>">اقرأ أكثر</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <? foreach ($select_brand as $v) : ?>
                    <?
                    $get_img = json_decode($v['IMAGES'], true);
                    $get_logo = json_decode($v['LOGO_URL'], true);
                    $str = strtolower($v['BRAND_NAME']);
                    ?>
                    <div class="col-lg-6 col-md-6 shade-border custom-card">
                        <div class="banner-item img-hover-effect box-shadow">
                    
                            <? //echo '<pre>'; print_r($select_brand); echo '</pre>';
                            ?>
                            <img class="custom-logo-1" src="<?= $get_logo['logo'] ?>" alt="Brand logo">
                        
                            <div class="banner-img img-zoom-effect bg-color">
                                <a class="center-image" href="<?= mdir("catalog/$str/category"); ?>">
                                    <img class="w-75 justify-content-center c-img" src="<?= $get_img['img_1'] ?>" alt="Banner Image">
                                </a>
                                <div class="inner-content text-white">
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size btn-primary" href="<?= mdir("catalog/$str/category"); ?>">جميع المنتجات</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <? endforeach; ?>
        </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row row-bottom">
        <!-- Begin Shipping Area -->
        <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '22']) as $v) : ?>
            <div class="col-md-6 p-top">
                <div class="section-title" align="left">
                    <h2 class="title title-bottom">معلومات عنا</h2>
                </div>
                <div align="left">
                    <?= $v['text_ar']; ?>
                    <div class="button-wrap more-bt">
                        <a class="btn btn-link text-danger with-underline p-0" href="<?= mdir("about"); ?>">المزيد عن</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
        <div class="col-md-6">
            <div class="margin-s">
                <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '21']) as $v) : ?>
                    <iframe class="custom-frame" src="<?= $v['video_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                <? endforeach; ?>
            </div>
        </div>
        <!-- Shipping Area End Here -->
    </div>
</div>
<!-- Begin Product Area -->
<div class="background-img">
    <div class="product-area section-space-y-axis-100 c-background">
        <div class="container">
            <div class="section-title pb-55">
                <h2 class="title mb-0">صفقة خاصة</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-item-wrap row">
                        <? foreach ($select_deals as $v) : ?>
                            <? $get_img = json_decode($v['IMAGES'], true); ?>
                            <? $str = strtolower($v['BRAND_NAME']); ?>
                            <div class="col-lg-4 col-md-6 pt-7">
                                <div class="product-item">
                                    <div class="product-img img-zoom-effect bg-color">
                                        <a class="center-image" href="<?= mdir("product/$str/$v[ID]"); ?>">
                                            <img class="img-full justify-content-center w-70" src="<?= $get_img['img_1'] ?>" alt="Product Images">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name pb-1" href="<?= mdir("product/$str/$v[ID]"); ?>"><?= $v['NAME_AR'] ?></a>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>

                <div class="col-12 pt-55">
                    <div class="button-wrap">
                        <a class="btn btn-link text-danger with-underline p-0" href="<?= mdir("catalog/asaman/category"); ?>">شاهد المزيد من المنتجات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

<div class="brand-area section-space-y-axis-100 white-smoke-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title pt-55 pb-55">
                    <h2 class="title mb-0 partners-title" align="center">شركاؤنا</h2>
                </div>
                <div class="swiper-container brand-slider swiper-container-initialized swiper-container-horizontal swiper-container-pointer">
                    <div class="swiper-wrapper" id="swiper-wrapper-b810110af8ae2437fb" aria-live="off" style="transform: translate3d(-1528.33px, 0px, 0px); transition-duration: 0ms;">
                        <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '23']) as $v) : ?>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" role="group" aria-label="7 / 18" style="width: 360px; margin-right: 30px;" data-swiper-slide-index="0">
                                <a class="brand-item" href="#">
                                    <img class="img-size" src="<?= $v['image']; ?>" alt="Brand Image">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-prev" role="group" aria-label="7 / 18" style="width: 360px; margin-right: 30px;" data-swiper-slide-index="0">
                                <a class="brand-item" href="#">
                                    <img class="img-size" src="<?= $v['image']; ?>" alt="Brand Image">
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" role="group" aria-label="7 / 18" style="width: 360px; margin-right: 30px;" data-swiper-slide-index="0">
                                <a class="brand-item" href="#">
                                    <img class="img-size" src="<?= $v['image']; ?>" alt="Brand Image">
                                </a>
                            </div>
                        <? endforeach ?>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin Newsletter Area -->
<div class="newsletter-area section-border-y-axis p-3">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap-post">
                <form id="contact-form" class="contact-form" action="">
                    <h2 class="newsletter-title mb-4">اترك جهة الاتصال الخاصة بك</h2>
                    <h3 class="newsletter-sub-title text-primary mb-8">وسوف نتصل بك</h3>
                    <div class="group-input">
                        <div class="form-field m-top me-xl-6">
                            <input type="text" autocomplete="off" name="applicationName" id="con_name" placeholder="اسم*" class="input-field" required>
                        </div>
                        <div class="form-field m-top me-xl-6">
                            <input type="text" autocomplete="off" name="applicationPhone" id="con_phone" placeholder="هاتف*" class="input-field" required>
                        </div>
                        <div class="form-field m-top me-xl-6">
                            <input type="email" autocomplete="off" name="applicationEmail" id="con_email" placeholder="بريد إلكتروني*" class="input-field" required>
                        </div>
                    </div>
                    <div class="form-field mt-6">
                        <textarea name="applicationMessage" id="con_message" placeholder="رسالة" class="textarea-field" required></textarea>
                    </div>
                    <div class="g-recaptcha" data-callback="captchaVerified" data-sitekey="6Le4TecoAAAAAOk3GSNPe_Fri6kwISis9lOdWbll" data-type="image" required></div>
                    <br />
                    <div class="button-wrap mt-4 d-flex justify-content-end">
                        <button type="submit" value="submit" id="post_com" formmethod="post" class="btn btn btn-custom-size lg-size btn-primary btn-secondary-hover rounded-0" name="send_message" disabled>أرسل رسالة</button>
                        <p class="form-messege mt-5 mb-0"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Area End Here -->

<script>
    // Verification callback function
    function captchaVerified() {
        var submitBtn = document.getElementById('post_com');
        submitBtn.removeAttribute('disabled');
        submitBtn.style.cursor = 'pointer';
    }
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LcJKOcoAAAAAHH6UFHR1vrRM0XujPHhLs6ZhHS_" async defer></script>

<style>
    .custom-con{
        margin-top: 60px;
    }

    .custom-card{
        margin-top: 50px;
    }

    .custom-logo-1 {
        padding-top: 20px;
        padding-left: 20px;
        max-width: 180px;
        min-width: 150px;
        height: auto;
    }

    .box-shadow {
        box-shadow: 0 4px 30px rgba(35, 35, 35, 0.1);
        /*border: 1px solid rgba(35, 35, 35, 0.1);*/
    }

    .img-size {
        max-width: 300px;
        padding: 26px 40px;
    }

    .swiper-container-pointer {
        height: 280px;
    }

    .c-img {
        width: 90%;
    }

    .center-image {
        display: flex;
        justify-content: center;
    }

    .bg-color {
        display: flex;
        align-items: center;
        /*padding: 24px 24px;*/
    }

    .text-color {
        padding: 8px 8px;
        color: #FFFFFF;
        border: 2px;
        background-color: rgba(128, 128, 128, 0.4);
        /*
    #696969
    #C0C0C0
    #48D1CC
    */
    }

    .partners-title {
        text-transform: uppercase;
        color: #444444;
        font-weight: 700;
        font-size: 30px;
    }

    .partners-center {
        justify-content: center;
    }

    .more-bt {
        padding-top: 20px;
        padding-bottom: 40px;
    }

    @media screen and (max-width: 768px) {
        .margin-s {
            padding-bottom: 140px;
        }
    }

    .title-bottom {
        padding-bottom: 50px;
    }

    .p-top {
        padding-top: 100px;
        max-width: 100%;
        height: 300px;
    }

    .margin-s {
        margin-top: 100px;
    }
    @media screen and (max-width: 425px){
    .banner-top{
        margin-top: 26px;
    }
    }

    @media screen and (max-width: 425px) {
        .p-top {
            margin-bottom: 260px;
        }
    }


    @media screen and (max-width: 425px) {
        .margin-s {
            margin-top: 200px;
            width: 350px;
            padding-bottom: 0px;
        }
    }

    @media screen and (max-width: 320px) {
        .margin-s {
            margin-top: 300px;
            width: 300px;
        }
    }

    .contact-form-wrap-post {
        background-color: #FFFFFF;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    @media (max-width: 767.98px) {
        .contact-form-wrap-post {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .c-background {
        margin-top: 120px;
        background-color: #E8E8E8;
    }

    .custom-frame {
        max-width: 100%;
        margin-left: 70px;
        width: 420px;
        height: 250px;

    }

    @media screen and (max-width: 1024px) {
        .m-top {
            margin-top: 20px;
        }
    }

    @media screen and (max-width: 1024px) {
        .custom-frame {
            display: flex;
            width: 420px;
            height: 250px;
            margin-left: 0px;
            margin-top: 20px;
        }
    }

    @media screen and (max-width: 320px) {
        .custom-frame {
            margin-top: 20px;
        }
    }

    /*
.custom-frame-2{
    margin-left: 20px;

}*/

    .header-img {
        height: 100%;
        width: 100%;
    }

    <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '9']) as $v) : ?>@media screen and (max-width: 425px) {
        .header-img-<?= $v['ID'] ?> {
            content: url('<?= $v['image_m'] ?>');
        }
    }

    <? endforeach; ?>
</style>