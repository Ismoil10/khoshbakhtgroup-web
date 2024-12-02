<? require $_SERVER["DOCUMENT_ROOT"] . '/core/backend.php'; ?>

<?
$crud_item_id = $_POST['item_id'];

$brands = db::arr_s("SELECT * FROM brands_list WHERE ID = '$crud_item_id'");
$get_img = json_decode($brands['IMAGES'], true);
$get_logo = json_decode($brands['LOGO'], true);
?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="taskModalLabel">Edit Brand</h4>
    </div>
    <form action="" method="POST" id="editForm" enctype="multipart/form-data">
      <div class="modal-body">
        <? //echo '<pre>'; print_r($crud_item_id); echo '</pre>';
        ?>
        <div class="mb-3">
          <input type="hidden" value="<?= $brands['ID'] ?>" name="editId">
          <label>Name</label>
          <input type="text" name="edit_brand_name" value="<?= $brands['NAME'] ?>" autocomplete="off" class="form-control">
          <label>Logo</label>
          <input type="file" name="edit_logo" autocomplete="off" class="form-control" accept="image/*" onchange="loadLogo_edit(event)">
          <div class="center-image"><img id="output_logo_edit" src="<?= $get_logo['logo'] ?>" width="100%" alt="" align="center"></div>
          <label>Image</label>
          <input type="file" name="edit_image_1" autocomplete="off" class="form-control" accept="image/*" onchange="loadFile_edit_1(event)">
          <div class="center-image"><img id="output_image_1" src="<?= $get_img['img_1'] ?>" width="100%" alt="" align="center"></div>
          <label>Mobile image</label>
          <input type="file" name="edit_image_2" autocomplete="off" class="form-control" accept="image/*" onchange="loadFile_edit_2(event)">
          <div class="center-image"><img id="output_image_2" src="<?= $get_img['img_2'] ?>" width="100%" alt="" align="center"></div>
          <script>
            var loadLogo_edit = function(event) {
              var reader = new FileReader();
              reader.onload = function() {
                var output = document.getElementById('output_logo_edit');
                output.src = reader.result;
              };
              reader.readAsDataURL(event.target.files[0]);
            };
            var loadFile_edit_1 = function(event) {
              var reader = new FileReader();
              reader.onload = function() {
                var output = document.getElementById('output_image_1');
                output.src = reader.result;
              };
              reader.readAsDataURL(event.target.files[0]);
            };
            var loadFile_edit_2 = function(event) {
              var reader = new FileReader();
              reader.onload = function() {
                var output = document.getElementById('output_image_2');
                output.src = reader.result;
              };
              reader.readAsDataURL(event.target.files[0]);
            };
          </script>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="editForm" name="editSubmit">Save</button>
      </div>
    </form>
  </div>
</div>

<style>
  .center-image {
    padding: 12px 12px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .img-full {
    max-width: 180px;
    height: auto;
  }
</style>