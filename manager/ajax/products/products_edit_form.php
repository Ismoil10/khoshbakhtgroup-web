<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>

<?
$crud_item_id = $_POST['item_id'];
$product = db::arr_s("SELECT * FROM products_list WHERE ID = '$crud_item_id'");

$count = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE AD = 1 AND ACTIVE = 1");

$choise = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE CHOISE = 1 AND ACTIVE = 1");
                  
$count_1 = db::arr_s("SELECT COUNT(ID) AS TOTAL FROM products_list WHERE SPEC_DEALS = 1 AND ACTIVE = 1");

$get_img = json_decode($product['IMAGES'], true);

$brands = db::arr("SELECT * FROM brands_list WHERE ACTIVE =1");

$category = db::arr("SELECT * FROM category WHERE ACTIVE =1");

?>

<style>

.center-image{
  padding: 12px 12px;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

.img-full{
  max-width: 180px; 
  height: auto;
}

.select-bottom{
  margin-bottom: 12px;
}
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Edit Brand</h4>
      </div>
      <form action="" method="POST" id="editForm" enctype="multipart/form-data">
      <div class="modal-body" style="height: 720px; overflow-y: auto;">
          <input type="hidden" value="<?=$product['ID']?>" name="editId">
          <? //echo '<pre>'; print_r($count_product['AD']); echo '</pre>'; ?>
        <!-- Name Input Fields -->
          <label for="standard-select">Add to banner (max. <? echo $count['TOTAL'].'/3';?>)</label>
          <div class="select">
          <select class="form-select" name="banner" style="width: 200px;">
                <option value="<?=$product['AD']?>"></option>
                <? if($count['TOTAL'] >= 3){ echo "<option value='$product[AD]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Product type to select category (max. <? echo $choise['TOTAL'].'/2'; ?>)</label>
          <div class="select">
          <select class="form-select" name="choise" style="width: 200px;">
                <option value="<?=$product['CHOISE']?>"></option>
                <? if($choise['TOTAL'] >= 2){ echo "<option value='$product[CHOISE]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Add to special deals (max. <? echo $count_1['TOTAL'].'/6';?>)</label>
          <div class="select">
          <select class="form-select" name="spec_deals" style="width: 200px;">
                <option value="<?=$product['SPEC_DEALS']?>"></option>
                <? if($count_1['TOTAL'] >= 6){ echo "<option value='$product[SPEC_DEALS]'>Max. added</option>";}else{ echo "<option value='1'>Add</option>";}?>
                <option value="0">Delete</option>
          </select>
          </div>
          <label for="standard-select">Brand Name</label>
          <div class="select">
          <select class="form-select" name="edit_brand_type" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>" <? if($product['BRAND_ID'] == $v['ID']){ echo 'selected'; }?>><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <label for="standard-select">Type of product</label>
          <div class="select select-bottom">
          <select class="form-select" name="edit_category" style="width: 200px;">
              <? foreach($category as $cat):?>
                <option value="<?=$cat['ID']?>" <? if($product['CAT_ID'] == $cat['ID']){ echo 'selected'; }?>><?=$cat['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <!--<div class="mb-3"><label>Тип продукта</label><input type="text" name="edit_product_type" value="<?//=$product['TYPE']?>" autocomplete="off" class="form-control"></div>-->
          <div class="mb-3"><label>Name en</label><input type="text" name="edit_product_name_en" value="<?=$product['NAME_EN']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Name uz</label><input type="text" name="edit_product_name_uz" value="<?=$product['NAME_UZ']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Name ru</label><input type="text" name="edit_product_name_ru" value="<?=$product['NAME_RU']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Name fr</label><input type="text" name="edit_product_name_fr" value="<?=$product['NAME_FR']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Name ar</label><input type="text" name="edit_product_name_ar" value="<?=$product['NAME_AR']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Name per</label><input type="text" name="edit_product_name_per" value="<?=$product['NAME_PER']?>" autocomplete="off" class="form-control"></div>
          <div class="mb-3"><label>Price</label><input type="number" name="product_price" autocomplete="off" value="<?=$product['PRICE']?>" class="form-control"></div>
          <!-- Description Text area -->
          <div class="mb-3"><label>Description en</label><textarea name="edit_product_desc_en" cols="30" rows="5" class="form-control summernote"><?=$product['DESCRIPTION_EN']?></textarea></div>
          <div class="mb-3"><label>Description uz</label><textarea name="edit_product_desc_uz" cols="30" rows="5" class="form-control summernote" ><?=$product['DESCRIPTION_UZ']?></textarea></div>
          <div class="mb-3"><label>Description ru</label><textarea name="edit_product_desc_ru" cols="30" rows="5" class="form-control summernote"><?=$product['DESCRIPTION_RU']?></textarea></div>
          <div class="mb-3"><label>Description fr</label><textarea name="edit_product_desc_fr" cols="30" rows="5" class="form-control summernote"><?=$product['DESCRIPTION_FR']?></textarea></div>
          <div class="mb-3"><label>Description ar</label><textarea name="edit_product_desc_ar" cols="30" rows="5" class="form-control summernote"><?=$product['DESCRIPTION_AR']?></textarea></div>
          <div class="mb-3"><label>Description per</label><textarea name="edit_product_desc_per" cols="30" rows="5" class="form-control summernote"><?=$product['DESCRIPTION_PER']?></textarea></div>
          <!-- Image input field -->
          <div class="mb-3"><label>Main image</label><input type="file" name="edit_image_1" class="form-control" accept="image/*" onchange="loadFile_edit_1(event)"></div>
          <div class="center-image"><img id="edit_img_1" src="<?=$get_img['img_1']?>" class="img-full" alt="" align="center"></div>
          <div class="mb-3"><label>Image 2</label><input type="file" name="edit_image_2" class="form-control" accept="image/*" onchange="loadFile_edit_2(event)"></div>
          <div class="center-image"><img id="edit_img_2" src="<?=$get_img['img_2']?>" class="img-full" alt="" align="center"></div>
          <div class="mb-3"><label>Image 3</label><input type="file" name="edit_image_3" class="form-control" accept="image/*" onchange="loadFile_edit_3(event)"></div>
          <div class="center-image"><img id="edit_img_3" src="<?=$get_img['img_3']?>" class="img-full" alt="" align="center"></div>
          <div class="mb-3"><label>Image 4</label><input type="file" name="edit_image_4" class="form-control" accept="image/*" onchange="loadFile_edit_4(event)"></div>
          <div class="center-image"><img id="edit_img_4" src="<?=$get_img['img_4']?>" class="img-full" alt="" align="center"></div>
          <script>
                  $('.summernote').summernote({
                    toolbar: [
                        ['style', ['style']],
                        ['fontsize', ['fontsize']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['picture', 'hr']],
                        ['table', ['table']],
	                    ['view', ['fullscreen', 'codeview', 'help']]
                      ],
                      height: 200,    
                      minHeight: null,
                      maxHeight: 200,
                      focus: true     
                  });

                var loadFile_edit_1 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('edit_img_1');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };
              
              var loadFile_edit_2 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('edit_img_2');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };
              
              var loadFile_edit_3 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('edit_img_3');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };

              var loadFile_edit_4 = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('edit_img_4');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
              };
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="editForm" name="editSubmit">Save</button>
      </div>
      </form>
    </div>
  </div>