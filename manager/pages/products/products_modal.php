<!-- ADD REQUEST Modal -->
<?

if(isset($_POST["addSubmit"])){
  if($_FILES["image_1"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_1 = db::file_upload("image_1", "upload");   
  }
  if($_FILES["image_2"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_2 = db::file_upload("image_2", "upload");    
  }
  if($_FILES["image_3"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_3 = db::file_upload("image_3", "upload");
  }
  if($_FILES["image_4"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_4 = db::file_upload("image_4", "upload");  
  }
  
  $image_src = [
    "img_1"=>$file_1["url"],
    "img_2"=>$file_2["url"],
    "img_3"=>$file_3["url"],
    "img_4"=>$file_4["url"]
  ];
  $file = json_encode($image_src);

  $name_en = filter_input(INPUT_POST, "product_name_en", FILTER_SANITIZE_ADD_SLASHES);
  $name_uz = filter_input(INPUT_POST, "product_name_uz", FILTER_SANITIZE_ADD_SLASHES);
  $name_ru = filter_input(INPUT_POST, "product_name_ru", FILTER_SANITIZE_ADD_SLASHES);
  $name_fr = filter_input(INPUT_POST, "product_name_fr", FILTER_SANITIZE_ADD_SLASHES);
  $name_ar = filter_input(INPUT_POST, "product_name_ar", FILTER_SANITIZE_ADD_SLASHES);
  $name_per = filter_input(INPUT_POST, "product_name_per", FILTER_SANITIZE_ADD_SLASHES);
  $desc_en = filter_input(INPUT_POST, "product_desc_en", FILTER_SANITIZE_ADD_SLASHES);
  $desc_uz = filter_input(INPUT_POST, "product_desc_uz", FILTER_SANITIZE_ADD_SLASHES);
  $desc_ru = filter_input(INPUT_POST, "product_desc_ru", FILTER_SANITIZE_ADD_SLASHES);
  $desc_fr = filter_input(INPUT_POST, "product_desc_fr", FILTER_SANITIZE_ADD_SLASHES);
  $desc_ar = filter_input(INPUT_POST, "product_desc_ar", FILTER_SANITIZE_ADD_SLASHES);
  $desc_per = filter_input(INPUT_POST, "product_desc_per", FILTER_SANITIZE_ADD_SLASHES);
  $type = filter_input(INPUT_POST, "product_type", FILTER_SANITIZE_ADD_SLASHES);
  $model = filter_input(INPUT_POST, "product_model", FILTER_SANITIZE_ADD_SLASHES);
  $brand_t = filter_input(INPUT_POST, "brand_type");
  $cat = filter_input(INPUT_POST, "cat_type");
  $banner_1 = filter_input(INPUT_POST, "banner_1");
  $select_brand = filter_input(INPUT_POST, "choise");
  $spec_deals = filter_input(INPUT_POST, "spec_deals");
  $price = filter_input(INPUT_POST, "product_price");

$insert = db::query("INSERT INTO `products_list` 
(
`BRAND_ID`,
`CAT_ID`,
`AD`,
`CHOISE`,
`SPEC_DEALS`,
`PRICE`,
`NAME_EN`,
`NAME_UZ`, 
`NAME_RU`,
`NAME_FR`,
`NAME_AR`,
`NAME_PER`,
`DESCRIPTION_EN`,
`DESCRIPTION_UZ`,
`DESCRIPTION_RU`,
`DESCRIPTION_FR`,
`DESCRIPTION_AR`,
`DESCRIPTION_PER`,
`IMAGES`,
`ACTIVE`
) VALUES (
'$brand_t',
'$cat',
'$banner_1',
'$select_brand',
'$spec_deals',
'$price',
'$name_en',
'$name_uz',
'$name_ru',
'$name_fr',
'$name_ar',
'$name_per',
'$desc_en',
'$desc_uz',
'$desc_ru',
'$desc_fr',
'$desc_ar',
'$desc_per',
'$file',
'1')");
  LocalRedirect("index.php");
}



if(isset($_POST["editSubmit"])){
  $select_url = db::arr_s("SELECT * FROM `products_list` WHERE ID='$_POST[editId]' AND ACTIVE='1'");
  $select_id = db::arr_s("SELECT * FROM `files` WHERE URL = '$select_url[URL]'");
  $img_src_old = json_decode($select_url["IMAGES"], true);
  
  if($_FILES["edit_image_1"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_1 = db::file_upload("edit_image_1", "upload");
    $img_src_old["img_1"] = $file_1["url"];
  }
  if($_FILES["edit_image_2"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_2 = db::file_upload("edit_image_2", "upload");
    $img_src_old["img_2"] = $file_2["url"];
  }
  if($_FILES["edit_image_3"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_3 = db::file_upload("edit_image_3", "upload");
    $img_src_old["img_3"] = $file_3["url"];
  }
  if($_FILES["edit_image_4"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_4 = db::file_upload("edit_image_4", "upload");
    $img_src_old["img_4"] = $file_4["url"];
  }
  //db::file_del($select_id['ID'], NULL);
  $file = json_encode($img_src_old);
  $update_image = ",`IMAGES`='$file'";
  $name_en = filter_input(INPUT_POST, "edit_product_name_en", FILTER_SANITIZE_ADD_SLASHES);
  $name_uz = filter_input(INPUT_POST, "edit_product_name_uz", FILTER_SANITIZE_ADD_SLASHES);
  $name_ru = filter_input(INPUT_POST, "edit_product_name_ru", FILTER_SANITIZE_ADD_SLASHES);
  $name_fr = filter_input(INPUT_POST, "edit_product_name_fr", FILTER_SANITIZE_ADD_SLASHES);
  $name_ar = filter_input(INPUT_POST, "edit_product_name_ar", FILTER_SANITIZE_ADD_SLASHES);
  $name_per = filter_input(INPUT_POST, "edit_product_name_per", FILTER_SANITIZE_ADD_SLASHES);
  $desc_en = filter_input(INPUT_POST, "edit_product_desc_en", FILTER_SANITIZE_ADD_SLASHES); 
  $desc_uz = filter_input(INPUT_POST, "edit_product_desc_uz", FILTER_SANITIZE_ADD_SLASHES);
  $desc_ru = filter_input(INPUT_POST, "edit_product_desc_ru", FILTER_SANITIZE_ADD_SLASHES);
  $desc_fr = filter_input(INPUT_POST, "edit_product_desc_fr", FILTER_SANITIZE_ADD_SLASHES);
  $desc_ar = filter_input(INPUT_POST, "edit_product_desc_ar", FILTER_SANITIZE_ADD_SLASHES);
  $desc_per = filter_input(INPUT_POST, "edit_product_desc_per", FILTER_SANITIZE_ADD_SLASHES);
  $edit_brand = filter_input(INPUT_POST, "edit_brand_type");
  $edit_category = filter_input(INPUT_POST, "edit_category");
  $banner = filter_input(INPUT_POST, "banner");
  $select_brand = filter_input(INPUT_POST, "choise");
  $spec_deals = filter_input(INPUT_POST, "spec_deals");
  $price = filter_input(INPUT_POST, "product_price");

  $insert = db::query("UPDATE `products_list` SET 
  `BRAND_ID`='$edit_brand',
  `CAT_ID`='$edit_category',
  `AD`='$banner',
  `CHOISE`='$select_brand',
  `SPEC_DEALS`='$spec_deals',
  `PRICE`='$price',
  `NAME_EN`='$name_en',
  `NAME_UZ`='$name_uz', 
  `NAME_RU`='$name_ru',
  `NAME_FR`='$name_fr',
  `NAME_AR`='$name_ar',
  `NAME_PER`='$name_per',
  `DESCRIPTION_EN`='$desc_en',
  `DESCRIPTION_UZ`='$desc_uz',
  `DESCRIPTION_RU`='$desc_ru',
  `DESCRIPTION_FR`='$desc_fr',
  `DESCRIPTION_AR`='$desc_ar',
  `DESCRIPTION_PER`='$desc_per'
  $update_image
  WHERE ID='$_POST[editId]'");
  LocalRedirect("index.php");
}

$brands = db::arr("SELECT * FROM `brands_list` WHERE ACTIVE = 1");

$category = db::arr("SELECT * FROM `category` WHERE ACTIVE = 1");

$count = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE AD = 1 AND ACTIVE = 1");

$choise = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE CHOISE = 1 AND ACTIVE = 1");
                  
$count_1 = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE SPEC_DEALS = 1 AND ACTIVE = 1");
?>

<style>
.center-image{
  margin-top: 30px;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

</style>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Add Product</h4>
      </div>
      <form action="" method="POST" id="addForm" enctype="multipart/form-data">
      <div class="modal-body" style="height: 720px; overflow-y: auto;">
      <? //echo '<pre>'; print_r($count); echo '</pre>'; ?>
        <!-- Name Input Fields -->
          <label for="standard-select">Add to banner (max. <? echo $count['TOTAL'].'/3'; ?>)</label>
          <div class="select">
          <select class="form-select" name="banner_1" style="width: 200px;">
                <option value="<?=$select_url['AD']?>"></option>
                <? if($count['TOTAL'] >= 3){ echo "<option value='$select_url[AD]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Product type to select category (max. <? echo $choise['TOTAL'].'/2'; ?>)</label>
          <div class="select">
          <select class="form-select" name="choise" style="width: 200px;">
                <option value="<?=$select_url['CHOISE']?>"></option>
                <? if($choise['TOTAL'] >= 2){ echo "<option value='$select_url[CHOISE]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Add to special deals (max. <? echo $count_1['TOTAL'].'/6'; ?>)</label>
          <div class="select">
          <select class="form-select" name="spec_deals" style="width: 200px;">
                <option value="<?=$select_url['SPEC_DEALS']?>"></option>
                <? if($count_1['TOTAL'] >= 6){ echo "<option value='$select_url[SPEC_DEALS]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Brand name</label>
          <div class="select">
          <select class="form-select" name="brand_type" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>"><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <label for="standard-select">Product Types</label>
          <div class="select" style="margin-bottom: 12px;">
          <select class="form-select" name="cat_type" style="width: 200px;">
              <? foreach($category as $cat):?>
                <option value="<?=$cat['ID']?>"><?=$cat['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <div class="mb-3"><label>Name en</label><input type="text" name="product_name_en" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Name uz</label><input type="text" name="product_name_uz" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Name ru</label><input type="text" name="product_name_ru" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Name fr</label><input type="text" name="product_name_fr" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Name ar</label><input type="text" name="product_name_ar" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Name per</label><input type="text" name="product_name_per" autocomplete="off" class="form-control" required></div>
          <div class="mb-3"><label>Price</label><input type="number" name="product_price" autocomplete="off" class="form-control"></div>
          <!-- Description Text area -->
          <div class="mb-3"><label>Description en</label><textarea name="product_desc_en" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <div class="mb-3"><label>Description uz</label><textarea name="product_desc_uz" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <div class="mb-3"><label>Description ru</label><textarea name="product_desc_ru" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <div class="mb-3"><label>Description fr</label><textarea name="product_desc_fr" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <div class="mb-3"><label>Description ar</label><textarea name="product_desc_ar" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <div class="mb-3"><label>Description per</label><textarea name="product_desc_per" cols="30" rows="5" class="form-control summernote"></textarea></div>
          <!-- Image input field -->
          <div class="mb-3"><label>Main image</label><input type="file" name="image_1" class="form-control" accept="image/*" onchange="loadFile_1(event)"></div>
          <div class="center-image"><img id="output1" width="30%" alt="" align="center"></div>
          <div class="mb-3"><label>Image 1</label><input type="file" name="image_2" class="form-control" accept="image/*" onchange="loadFile_2(event)"></div>
          <div class="center-image"><img id="output2" width="30%" alt="" align="center"></div>
          <div class="mb-3"><label>Image 2</label><input type="file" name="image_3" class="form-control" accept="image/*" onchange="loadFile_3(event)"></div>
          <div class="center-image"><img id="output3" width="30%" alt="" align="center"></div>
          <div class="mb-3"><label>Image 3</label><input type="file" name="image_4" class="form-control" accept="image/*" onchange="loadFile_4(event)"></div>
          <div class="center-image"><img id="output4" width="30%" alt="" align="center"></div>
          <script>
                var loadFile_1 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('output1');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
          };
          var loadFile_2 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('output2');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
          };
          var loadFile_3 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('output3');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
          };
          var loadFile_4 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('output4');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
          };
        </script>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="addForm" name="addSubmit">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  
</div>

<!-- VIEW MODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

</div>

<!-- Описание анг -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="deleteForm">
          <input type="hidden" name="product_id">
        </form>
        <span class="h4 text-center">Are you sure you want to delete this item?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="deleteForm" name="deleteSubmit">Delete</button>
      </div>
    </div>
  </div>
</div>

<?
if(isset($_POST["deleteSubmit"])){
  $deactive = db::query("UPDATE `products_list` SET `ACTIVE` = '0' WHERE ID='$_POST[product_id]'");
  LocalRedirect("index.php");
}
?>