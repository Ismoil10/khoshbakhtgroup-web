<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Khoshbakht Group</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/upload/8d6dc35e506fc23349dd10ee68dabb64.png" />

    <!-- CSS -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/vendor/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/vendor/Pe-icon-7-stroke.css" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/magnific-popup.min.css" />
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/ion.rangeSlider.min.css" />

    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="<?= $template_path ?>assets/css/vendor/vendor.min.css"> -->
    <!-- <link rel="stylesheet" href="<?= $template_path ?>assets/css/plugins/plugins.min.css"> -->

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= $template_path ?>assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?= $template_path ?>assets/css/style.min.css"> -->

<style>

.custom-logo{
    max-width: 200px;
    min-width: 180px;
    height: auto;
}

.custom-header{
    background-color: #1963af;
}

.custom-text{
    color: #FFFFFF;
}

.padding-right{
    padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 30px;
    color: #FFFFFF;
}

</style>

</head>
<?
$lang = ["en" => "English", "uz" => "O'zbek", "ru" => "Русский", "fr" => "Français", "per" => "فارسی", "ar" => "عربي"];
$rtl = ["ar", "per"];
?>
<body>
    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <header class="main-header-area">
            <div class="header-top border-bottom d-none d-lg-block custom-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="header-top-left">
                                <ul class="custom-text">
                                    <li>Qo'ng'iroq
                                        <a class="custom-text" href="tel://998901234567">008615958984000</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-top-right">
                                <? foreach ($lang as $lang_code => $lang_name) : ?>
                                    <?if(in_array($lang_code, $rtl) AND ($_GET["page"]=="catalog" OR $_GET["page"]=="product")):?>
                                        <a class="padding-right" href="/<?= $lang_code . '/' . $_GET["page"]."/".$_GET["inner_page"]."/".$_GET["item_id"]?>"><?= $lang_name ?></a>
                                    <?elseif (in_array($lang_code, $rtl)): ?>
                                        <a class="padding-right" href="/<?= $lang_code . '/' . $_GET["page"] ?>"><?= $lang_name ?></a>
                                    <?elseif($lang_code != $_GET["lang"] AND ($_GET["page"]=="catalog" OR $_GET["page"]=="product")):?>
                                        <a class="padding-right" href="/<?= $lang_code . '/' . $_GET["page"]."/".$_GET["inner_page"]."/".$_GET["item_id"]?>"><?= $lang_name ?></a>
                                    <? elseif ($lang_code != $_GET["lang"]) : ?>
                                        <a class="padding-right" href="/<?= $lang_code . '/' . $_GET["page"] ?>"><?= $lang_name ?></a>
                                    <? endif ?>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle header-sticky py-6 py-lg-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap position-relative">

                                <a href="<?= mdir("main") ?>" class="header-logo">
                                    <img src="<?= $template_path ?>assets/images/logo/khoshbakht_small_20.png" class="custom-logo mb-1 mt-1" alt="Header Logo">
                                </a>

                                <div class="main-menu d-none d-lg-block custom-navbar">
                                    <nav class="main-nav">

                                        <ul>
                                            <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '2']) as $v) : ?>
                                                <? if ($v["name_en"] == "Brands") : ?>
                                                    <li class="drop-holder left-last-child">
                                                        <a href="javascript:void();"><?= $v["name_" . $_GET["lang"]] ?>
                                                            <i class="pe-7s-angle-down"></i>
                                                        </a>
                                                        <ul class="drop-menu">
                                                            <? foreach (db::arr("SELECT LOWER(NAME) AS CODE, NAME FROM `brands_list` WHERE ACTIVE=1") as $brand_name) : ?>
                                                                <li>
                                                                    <a href="<?= mdir("catalog/$brand_name[CODE]/1") ?>"><?= $brand_name['NAME'] ?></a>
                                                                </li>
                                                            <? endforeach ?>
                                                        </ul>
                                                    </li>
                                                <? elseif (!empty($v["link"])) : ?>
                                                    <li class="left-last-child">
                                                        <a href="<?= mdir($v["link"]) ?>"><?= $v["name_" . $_GET["lang"]] ?></a>
                                                    </li>
                                                <? endif ?>
                                            <? endforeach ?>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        <li class="mobile-menu_wrap d-block d-lg-none dropdown ">
                                            <button class="btn btn-link dropdown-toggle text-dark" type="button" id="languageButton" data-bs-toggle="dropdown" aria-label="language" aria-expanded="false">
                                                <?= $lang[$_GET["lang"]] ?>
                                            </button>
                                            <ul class="dropdown-menu bg-light" aria-labelledby="languageButton">
                                                <? foreach ($lang as $lang_code => $lang_name) : ?>
                                                    <?if(in_array($lang_code, $rtl) AND ($_GET["page"]=="catalog" OR $_GET["page"]=="product")):?>
                                                        <li><a class="dropdown-item text-end" href="/<?= $lang_code . '/' . $_GET["page"]."/".$_GET["inner_page"]."/".$_GET["item_id"]?>"><?= $lang_name ?></a></li>
                                                        <? echo '<pre>'; print_r($lang_code); echo '</pre>'; ?>
                                                    <?elseif (in_array($lang_code, $rtl)): ?>
                                                        <li><a class="dropdown-item text-end" href="/<?= $lang_code . '/' . $_GET["page"] ?>"><?= $lang_name ?></a></li>
                                                    <?elseif($lang_code != $_GET["lang"] AND ($_GET["page"]=="catalog" OR $_GET["page"]=="product")):?>
                                                        <li><a class="dropdown-item" href="/<?= $lang_code . '/' . $_GET["page"]."/".$_GET["inner_page"]."/".$_GET["item_id"]?>"><?= $lang_name ?></a></li>
                                                    <? elseif ($lang_code != $_GET["lang"]) : ?>
                                                        <li><a class="dropdown-item" href="/<?= $lang_code . '/' . $_GET["page"] ?>"><?= $lang_name ?></a></li>
                                                    <? endif ?>
                                                <? endforeach; ?>
                                            </ul>
                                        </li>
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu fs-1"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-body">
                    <div class="inner-body">
                        <div class="offcanvas-top">
                            <a href="javascript:void(0);" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <? foreach (view::CONTENT('all_active', ['IBLOCK_ID' => '2']) as $v) : ?>
                                        <? if ($v["name_en"] == "Brands") : ?>
                                            <li class="menu-item-has-children">
                                                <a href="#">
                                                    <span class="mm-text"><?= $v["name_" . $_GET["lang"]] ?>
                                                        <i class="pe-7s-angle-down"></i>
                                                    </span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <? foreach (db::arr("SELECT LOWER(NAME) AS CODE, NAME FROM `brands_list` WHERE ACTIVE=1") as $brand_name) : ?>
                                                        <li>
                                                            <a href="<?= mdir("catalog/$brand_name[CODE]/1") ?>">
                                                                <span class="mm-text"><?= $brand_name['NAME'] ?></span>
                                                            </a>
                                                        </li>
                                                    <? endforeach ?>
                                                </ul>
                                            </li>
                                        <? elseif (!empty($v["link"])) : ?>
                                            <li>
                                                <a href="<?= mdir($v["link"]) ?>">
                                                    <span class="mm-text"><?= $v["name_" . $_GET["lang"]] ?></span>
                                                </a>
                                            </li>
                                        <? endif; ?>
                                    <? endforeach; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Header Area End Here -->