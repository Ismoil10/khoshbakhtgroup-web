<?

$innerPageName = addslashes($_GET["inner_page"]);
$brandData = db::arr_s("SELECT * FROM `brands_list` WHERE LOWER(`NAME`) ='$innerPageName' AND `ACTIVE`=1");
//$brand_list = db::arr("SELECT ID, LOWER(NAME) AS CODE, `NAME` FROM `brands_list` WHERE ACTIVE=1");

$select_products = db::arr("SELECT * FROM `products_list` WHERE ID = '$_GET[item_id]' AND BRAND_ID = $brandData[ID] AND ACTIVE='1'");

//$select_img = db::arr_s("SELECT * FROM `products_list` WHERE ID = '$_GET[item_id]' AND BRAND_ID = $brandData[ID] AND ACTIVE='1'");

?>

<style>

.center-img{
  padding: 24px 24px;
  display: flex; 
  align-items: center; 
  justify-content: center;  
}

.sm-img{
  padding: 5px 5px;
  display: flex; 
  align-items: center; 
  justify-content: center;
  background-color: #DCDCDC;  
}

.img-full{
  max-width: 300px; 
  height: auto;
}

.next-img{
  max-width: 64px; 
  height: auto;
}

.breadcrumb-height{
  max-height: 80px;
  background-color: #DCDCDC;
}

</style>

<!-- Begin Main Content Area  -->
<main class="main-content">
  <div class="breadcrumb-area breadcrumb-height">
    <!--data-bg-image="<?=$template_path?>assets/images/breadcrumb/bg/1-1-1920x400.jpg"-->
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-12">
          <div class="breadcrumb-item text-night-rider">
          <? foreach($select_products as $v): ?>
            <h2 class="breadcrumb-heading"><?=$v['NAME_RU']?></h2>
            <ul>
              <li>
                <a href="index.html">Home /</a>
              </li>
              <li>Brands / </li>
              <li><?=$brandData['NAME']?> / </li>
              <li><?=$v['NAME_RU']?></li>
            </ul>
          <? endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="single-product-area section-space-top-100">
    <div class="container">
      <div class="row">
      <? foreach($select_products as $v):?>
        <? $get_img = json_decode($v['IMAGES'], true);?>
        <? //echo '<pre>'; print_r($_GET); echo '</pre>'; ?>
        <div class="col-lg-6">
          <div class="single-product-img">
            <div class="swiper-container single-product-slider">
              <div class="swiper-wrapper">
                <? foreach($get_img as $img): ?>
                <div class="swiper-slide center-img">
                  <a href="<?=$img?>" class="single-img gallery-popup">
                    <img class="img-full" src="<?=$img?>" alt="Product Image">
                  </a>
                </div>
                <? endforeach; ?>
              </div>
            </div>
            <div class="thumbs-arrow-holder">
              <div class="swiper-container single-product-thumbs">
                <div class="swiper-wrapper">
                <? foreach($get_img as $img): ?>
                  <a href="#" class="swiper-slide sm-img">
                    <img class="img-full next-img" src="<?=$img;?>" alt="Product Thumnail">
                  </a>
                <? endforeach; ?>
                </div>
              </div>
              <!-- Add Arrows -->
              <div class=" thumbs-button-wrap d-none d-md-block">
                <div class="thumbs-button-prev">
                  <i class="pe-7s-angle-left"></i>
                </div>
                <div class="thumbs-button-next">
                  <i class="pe-7s-angle-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 pt-9 pt-lg-0">
          <div class="single-product-content">
            <h2 class="title mb-3"><?=$v['NAME_RU']?></h2>
            <div class="product-category pb-3">
              <span class="title">Brand:</span>
              <ul>
                <li>
                  <a href="#"><?=$brandData['NAME']?></a>
                </li>
              </ul>
            </div>
            <p class="short-desc mb-9"><?=$v['DESCRIPTION_RU']?></p>
          </div>
        </div>
      <? endforeach; ?>
      </div>
    </div>
  </div>
  <div class="product-tab-area section-space-y-axis-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="nav product-tab-nav mb-10" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="active tab-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                Description
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="tab-btn" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">
                Information
              </a>
            </li>
          </ul>
          <div class="tab-content product-tab-content">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <? foreach($select_products as $v):?>
              <div class="product-description-body">
                <p class="short-desc mb-0"><?=$v['DESCRIPTION_RU']?></p>
              </div>
              <? endforeach; ?>
            </div>
            <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
              <div class="product-information-body">
                <h4 class="title">Shipping</h4>
                <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20 days to deliver. Our product is good with reasonable price and we believe you will worth it. So please wait for it patiently! Thanks.Any question please kindly to contact us and we promise to work hard to help you to solve the problem</p>
                <h4 class="title">About return request</h4>
                <p class="short-desc mb-4">If you don't need the item with worry, you can contact us then we will help you to solve the problem, so please close the return request! Thanks</p>
                <h4 class="title">Guarantee</h4>
                <p class="short-desc mb-0">If it is the quality question, we will resend or refund to you; If you receive damaged or wrong items, please contact us and attach some pictures about product, we will exchange a new correct item to you after the confirmation.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- Main Content Area End Here  -->