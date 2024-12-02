<!-- ADD REQUEST Modal -->
<?  

if(isset($_POST["editSubmit"])){

  $brand_id = filter_input(INPUT_POST, "edit_brand", FILTER_SANITIZE_ADD_SLASHES);
  $cat_name = filter_input(INPUT_POST, "edit_category", FILTER_SANITIZE_ADD_SLASHES);
  $update = db::query("UPDATE `category` SET `NAME`='$cat_name', `BRAND_ID`='$brand_id' WHERE `ID`='$_POST[editId]'");
  LocalRedirect("index.php");
}

$brands = db::arr("SELECT * FROM brands_list WHERE ACTIVE = 1");

?>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Add category</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="addForm">
        <div class="select" style="margin-bottom: 12px;">
          <select class="form-select" name="brand_id" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>"><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="cat_name" autocomplete="off" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="addForm" name="addSubmit">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Delete</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="deleteForm">
          <input type="hidden" name="deleteId">
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
if(isset($_POST["addSubmit"])){
  $cat_name = filter_input(INPUT_POST, "cat_name", FILTER_SANITIZE_ADD_SLASHES);
  $brand_id = filter_input(INPUT_POST, "brand_id", FILTER_SANITIZE_ADD_SLASHES);
  $insert = db::query("INSERT INTO `category` (`NAME`, `BRAND_ID`, `ACTIVE`) VALUES ('$cat_name', '$brand_id', '1')");
  LocalRedirect("index.php");
}

if(isset($_POST["deleteSubmit"])){
  $deactive = db::query("UPDATE `category` SET `ACTIVE`='0' WHERE ID='$_POST[deleteId]'");
  LocalRedirect("index.php");
}
?>