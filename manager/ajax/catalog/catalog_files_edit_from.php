<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>
<?

$crud_item_id = $_POST['item_id'];
$cat_files = db::arr_s("SELECT * FROM catalog_files WHERE ID = '$crud_item_id'");
$get_file = json_decode($cat_files['IMAGE'], true);
$get_img = json_decode($cat_files['IMAGE'], true);

$brands = db::arr("SELECT * FROM brands_list WHERE ACTIVE =1");

?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Edit Brand</h4>
      </div>
      <form action="" method="post" id="editForm" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" value="<?=$cat_files['ID']?>" name="editId">
        <? //echo '<pre>'; print_r($category); echo '</pre>'; ?>
        <label for="standard-select">Brand name</label>
          <div class="select" style="margin-bottom: 12px;">
          <select class="form-select" name="edit_brand" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>" <? if($cat_files['BRAND_ID'] == $v['ID']){ echo 'selected'; }?>><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <div class="mb-3">
            <label>File</label>
            <input type="file" name="edit_file_1" value="<?=$get_file['file_1']?>" accept=".pdf" autocomplete="off" class="form-control">
          </div>
          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="cat_image" accept="image/*" autocomplete="off" class="form-control" onchange="loadFile_1(event)">
            <div class="center-image"><img id="output_img" src="<?=$get_img['img_1']?>" width="50%" alt="" align="center"></div>
          </div>
          <script>
              var loadFile_1 = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output_img');
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
  
<style>

.center-image{
  margin-top: 30px;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

</style>