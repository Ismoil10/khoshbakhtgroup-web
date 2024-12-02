<?
$innerPageName = addslashes($_GET["inner_page"]);
$brandData = db::arr_s("SELECT * FROM `brands_list` WHERE LOWER(`NAME`) ='$innerPageName' AND `ACTIVE`=1");
$brand_list = db::arr("SELECT ID, LOWER(NAME) AS CODE, `NAME` FROM `brands_list` WHERE ACTIVE=1");

$cat_files = db::arr("SELECT * FROM catalog_files WHERE BRAND_ID = $brandData[ID] AND ACTIVE = 1");

$select_cat = db::arr("SELECT * FROM `category` WHERE BRAND_ID = '$brandData[ID]' AND ACTIVE = 1");

$get_img = json_decode($brandData['IMAGES'], true);

$sub = db::arr("SELECT 
cat.ID,
prod.ID AS SID,
prod.NAME_PER
FROM `products_list` AS prod
LEFT JOIN `category` AS cat ON cat.ID = prod.CAT_ID
WHERE prod.ACTIVE = 1");

$sub_list = [];
foreach ($sub as $subs) {
  if (!isset($sub_list[$subs["ID"]])) {
    $sub_list[$subs["ID"]] = [];
  }
  $push = array_push($sub_list[$subs["ID"]], $subs);
}

if(isset($_GET['item_id'])){

$str = $_GET['item_id'];
$cat = explode("_", $str);

if($cat[0] == 'category'){

$select_products = db::arr("SELECT * FROM `products_list` 
WHERE CAT_ID = '$cat[1]' 
AND ACTIVE=1");

$count = db::arr_s("SELECT 
COUNT(ID) AS TOTAL 
FROM `products_list` 
WHERE CAT_ID = '$cat[1]' 
AND ACTIVE='1'");

}else{

$select_products = db::arr("SELECT * FROM `products_list` 
WHERE ID = '$cat[1]' 
AND ACTIVE=1");  

$count = db::arr_s("SELECT 
COUNT(ID) AS TOTAL 
FROM `products_list` 
WHERE ID = '$cat[1]' 
AND ACTIVE='1'");

}

if($str == $cat[0]){
$select_products = db::arr("SELECT * FROM `products_list` WHERE BRAND_ID = '$brandData[ID]' AND ACTIVE='1'");  

$count = db::arr_s("SELECT COUNT(ID) AS TOTAL 
FROM `products_list` 
WHERE BRAND_ID = '$brandData[ID]' 
AND ACTIVE='1'");
}
}
 
?>

<style>

.header-img{
    height: 100%;
    width: 100%;
}
@media screen and (max-width: 425px) {
    .header-img {
        content: url('<?=$get_img['img_2']?>');
    }
}

</style>

<!-- Begin Main Content Area -->
<main class="main-content">
  <div class="breadcrumb-area breadcrumb-height header-img"> 
      <img src="<?=$get_img['img_1']?>" alt="Brand image">
  </div>
  <? 
  //echo '<pre>'; print_r($_SESSION); echo '</pre>';
  ?>
  <div class="shop-area section-space-y-axis-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 order-lg-1 order-1 pt-10 pt-lg-0">
          <div class="sidebar-area style-2">
            <div class="widgets-area mb-9">
              <h2 class="widgets-title mb-5">Brands</h2>
              <div class="widgets-item">
                <ul class="widgets-category">
                  <? foreach ($brand_list as $brand) : ?>
                    <li>
                      <a href="<?= mdir("catalog/$brand[CODE]/category") ?>" <? if ($brand["ID"] === $brandData["ID"]) echo 'class="text-primary"' ?>><?= $brand["NAME"] ?></a>
                    </li>
                  <? endforeach ?>
                </ul>
              </div>
            </div>
            <div class="custom-cat">
            <span class="custom-menu"></span>
            <h2 class="custom-title_1 mb-5">Categories</h2>
            <span class="line-1"></span>
            <? foreach ($select_cat as $cat):?>
              <!--<span class="custom-menu"></span>-->
              <div class="offcanvas-menu_area custom-dropdown">
                <nav class="offcanvas-navigation">
                  <ul class="mobile-menu">
                    <li class="menu-item-has-children custom-d">
                        <a href="<?=mdir("catalog/$innerPageName/category_$cat[ID]") ?>">
                          <span class="mm-text c-text"><?=$cat['NAME']; ?>
                          </span>
                        </a>
                        <a class="icon-header" href="#">
                          <span><i class="pe-7s-angle-down icon"></i></span>
                        </a>
                      <? foreach($sub_list[$cat['ID']] as $subc): ?>
                      <? $ex = explode("_", $_GET['item_id']); ?>
                      <ul class="<? if($ex[1] == $cat['ID']){ echo false;}else{ echo 'sub-menu';}?> custom-border">
                        <li>
                          <a href="<?=mdir("product/$innerPageName/$subc[SID]") ?>">
                            <span class="mm-text"><?=$subc['NAME_PER']?></span>
                          </a>
                        </li>
                      </ul>
                      <? //echo '<pre>'; print_r($subc); echo '</pre>';?>
                     <? endforeach; ?>
                    </li>
                  </ul>
                </nav>
              </div>
              <? endforeach; ?>
            </div>
            <div class="widgets-area mb-9 pd-top">
              <h2 class="widgets-title mb-5">Certificates</h2>
                <div class="widgets-item">
                <ul class="widgets-category">
                  <? //foreach($brand_list as $brand):?>
                    <li>
                      <a href="https://khoshbakhtgroup.com/per/quality-control">کنترل کیفیت</a>
                    </li>
                  <? //endforeach ?>
                </ul>
              </div>
            </div>
            <div class="widgets-area mb-9 pd-top">
            <h2 class="widgets-title mb-5">Catalog</h2>
            <div class="con-hover">
            <? foreach($cat_files as $v): ?>
              <? $get_file = json_decode($v['URL'], true); ?>
              <? $get_img = json_decode($v['IMAGE'], true); ?>
              <a class="underline-link" href="<?=$get_file['file_1'];?>" download>
                <img class="custom-hover" src="<?=$get_img['img_1']?>" alt="Download image"> 
                <div class="middle-s download-topbar">
                    <div class="second-button">دانلود کاتالوگ</div>
                </div>
              </a> 
              <? endforeach; ?> 
              </div>       
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 order-lg-2 order-2">
          <div class="product-topbar">
            <ul>
              <li class="page-count margin-count">
                <span><?=$count['TOTAL'];?></span> محصول پیدا شد
              </li>
              <? foreach($cat_files as $v): ?>
              <? $get_file = json_decode($v['URL'], true); ?>
              <li class="page-count margin-count margin-right" align="center">
                 <a class="underline-link" href="<?=$get_file['file_1'];?>" download><i class="fa fa-download" aria-hidden="true"></i> دانلود کاتالوگ</a>
              </li>
              <? endforeach; ?>
            </ul>
          </div>
          <div class="tab-content text-charcoal pt-8">
            <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
              <div class="product-grid-view row">
                <? foreach ($select_products as $v) : ?>
                  <? $get_img = json_decode($v['IMAGES'], true); ?>
                  <div class="col-xl-4 col-sm-6 pt-6">
                    <div class="product-item">
                      <div class="product-img img-zoom-effect bg-color">
                        <a class="center-image" href="<?= mdir("product/$innerPageName/$v[ID]") ?>">
                          <img class="w-90 justify-content-center" src="<?= $get_img['img_1'] ?>" alt="Product Images">
                        </a>
                      </div>
                      <div class="product-content">
                        <a class="bg-primary p-1 text-light" href="<?=mdir("product/$innerPageName/$v[ID]")?>"><?=$v['NAME_PER']; ?></a>
                      </div>
                    </div>
                  </div>
                <? endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- Main Content Area End Here -->

<style>
/*
.text-color{
    background-color: rgba(128, 128, 128, 0.4);
    
    #696969
    #C0C0C0
    #48D1CC
     
}*/

.con-hover:hover .custom-hover {
  opacity: 0.3;
}

.con-hover:hover .middle-s {
  opacity: 1;
}

.second-button{
  font-size: 15px;
}

.con-hover {
  position: relative;
  width: 100%;
}

.middle-s {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.download-topbar {
    border: 1px solid #6c788c;
    border-radius: 30px;
    padding: 10px 15px;
}

.custom-hover {
  opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
}

.pd-top{
  margin-top: 30px;
}

  .custom-cat{
    background-color: #f9f9f9;
  }

  .custom-title_1{
    display: flex;
    color: #535353;
    padding-top: 30px;
    padding-left: 15px;
    font-size: 18px;
    position: relative;
  }

  .bg-color{
    display: flex;
    align-items: center;
    padding: 24px 24px;
  }

  .center-image {
    display: flex;
    justify-content: center;
  }

  .custom-dropdown {
    background-color: #f9f9f9;
    padding-left: 20px;
    padding-right: 12px;
    padding-top: 4px;
    padding-bottom: 4px;
    margin-left: 9px;
    margin-right: 9px;
    margin-top: 1px;
    border-bottom: 1px solid #DCDCDC;
  }

  .custom-border{
    padding: 6px;
    margin-top: 8px;
    border-top: 1px solid #DCDCDC;
  }

  .c-text {
    /*color: #535353;*/
    font-weight: 500;
    font-size: 16px;
    font-family: sans-serif;
  }
  
  @media (max-width: 768px) {
    .margin-count {
        margin-top: 20px; 
    }
}

.custom-menu{
  box-sizing: border-box;
  background-color: #ee3231;
  height: 14px;
  width: 9px;
  margin-top: 32px;
  float: left;
  left: -40px;
}
.icon-header {
  height: 27px;
  float: right;
  border-left: 1px solid #DCDCDC;
  padding-bottom: 4px;
}

.line-1{
  display: flex;
  align-items: center;
  box-sizing: border-box;
  height: 1px;
  background-color: #DCDCDC;
  margin-left: 9px;
  margin-right: 9px;
}

  .icon{
    font-size: 30px;
    float: right;
    margin-left: 8px;
  }
</style>