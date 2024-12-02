<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>
<?

$crud_item_id = $_POST['item_id'];
$category = db::arr_s("SELECT * FROM category WHERE ID = '$crud_item_id'");

$brands = db::arr("SELECT * FROM brands_list WHERE ACTIVE =1");

?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Edit category</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="editForm">
        <input type="hidden" value="<?=$category['ID']?>" name="editId">
        <? //echo '<pre>'; print_r($category); echo '</pre>'; ?>
        <label for="standard-select">Brand name</label>
          <div class="select" style="margin-bottom: 12px;">
          <select class="form-select" name="edit_brand" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>" <? if($category['BRAND_ID'] == $v['ID']){ echo 'selected'; }?>><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="edit_category" value="<?=$category['NAME']?>" autocomplete="off" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="editForm" name="editSubmit">Save</button>
      </div>
    </div>
  </div>