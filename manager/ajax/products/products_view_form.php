<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>

<? 	
$crud_item_id = $_POST['item_id'];	

$products = db::arr("SELECT product.*, 
bl.NAME AS BRAND_NAME,
cat.NAME AS CAT_NAME 
FROM products_list AS product
LEFT JOIN brands_list AS bl ON bl.ID = product.BRAND_ID 
LEFT JOIN category AS cat ON cat.ID = product.CAT_ID 
WHERE product.ID='$crud_item_id'");

$get_json = db::arr_s("SELECT products_list.IMAGES FROM products_list WHERE ID = '$crud_item_id'");
$get_img = json_decode($get_json['IMAGES'], true);

/*foreach($get_img as $k => $v){
$img[$k] = $v['url'];

}*/
//echo '<pre>'; print_r($img[0]); echo '</pre>';
?>

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">View product</h4>
      </div>
      <form method="POST" action="" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
        <? foreach($products as $v):?>
        <div class="col-sm-6 col-md-6" style="max-height: 550px; overflow-y: auto;">
        <? //echo '<pre>'; print_r($v); echo '</pre>';?>
        <div class="swiper-container single-product-thumbs">
          <div class="swiper-wrapper">
            <? foreach($get_img as $img): ?>
              <a href="#" class="swiper-slide cs-img">
                <img class="img-fl" src="<?=$img?>" alt="Product Thumnail">
              </a>
            <? endforeach; ?>
          </div>
        </div>  
        </div>
        <div class="col-sm-6 col-md-6" style="height: 550px; overflow-y: auto;">   
        <table class="table table-striped" align="center">
          <tbody>                                                    
            <tr>
              <td>
                 <b>Brand</b>
              </td>
              <td>    
                  <span class="td-custom">
                     <?=$v['BRAND_NAME']?>
                  </span>
              </td>
            </tr>
            <tr>
              <td>
                Type of product
              </td>
              <td>
              <span class="td-custom"><?=$v['CAT_NAME']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name en.
              </td>
              <td>
              <span class="td-custom"><?=$v['NAME_EN']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name uz.
              </td>
              <td>
                 <span class="td-custom"><?=$v['NAME_UZ']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name ru.
              </td>
              <td>
              <span class="td-custom"><?=$v['NAME_RU']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name fr.
              </td>
              <td>
              <span class="td-custom"><?=$v['NAME_FR']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name ar.
              </td>
              <td>
              <span class="td-custom"><?=$v['NAME_AR']?></span>
              </td>
            </tr>
            <tr>
              <td>
                 Name per.
              </td>
              <td>
              <span class="td-custom"><?=$v['NAME_PER']?></span>
              </td>
            </tr>
          </tbody>
        </table>
        <nav class="rectangle">
        <h4><b>Description en.</b></h4>
         <p>
          <span>
             <?=$v['DESCRIPTION_EN'];?>
          </span>
        </p>
        </nav>
        <nav class="rectangle">
        <h4><b>Description uz.</b></h4>
         <p>
          <span>
            <?=$v['DESCRIPTION_UZ'];?>
          </span>
        </p>
        </nav>
        <nav class="rectangle">
        <h4><b>Description ru.</b></h4>
         <p>
          <span>
            <?=$v['DESCRIPTION_RU'];?>
          </span>
        </p>
        </nav>
        <nav class="rectangle">
        <h4><b>Description fr.</b></h4>
         <p>
          <span>
            <?=$v['DESCRIPTION_FR'];?>
          </span>
        </p>
        </nav>
        <nav class="rectangle">
        <h4><b>Description ar.</b></h4>
         <p>
          <span>
            <?=$v['DESCRIPTION_AR'];?>
          </span>
        </p>
        </nav>
        <nav class="rectangle">
        <h4><b>Description per.</b></h4>
         <p>
          <span>
            <?=$v['DESCRIPTION_PER'];?>
          </span>
        </p>
        </nav>   
        </div>
        <? endforeach; ?>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

<style>
.td-custom{
  margin-left: 50px;
}

.rectangle{
  border: 2px; 
  padding: 10px;
  width: 400px;
  background-color: #F3F2F7;
  border-radius: 8px;
  margin-top: 10px;
  font-size: 16px;
}

.col-img{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50%;
}

.cs-img{
  padding: 5px 5px;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

.img-fl{
  padding: 12px 12px;
  margin-top: 45px; 
  max-height: 440px;
  max-width: 380px;
}


</style>