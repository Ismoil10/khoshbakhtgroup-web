<!-- ADD REQUEST Modal -->


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Add catalog</h4>
      </div>
      <form action="" method="post" id="addForm" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="select" style="margin-bottom: 12px;">
          <select class="form-select" name="brand_id" style="width: 200px;">
              <? foreach($brands as $v):?>
                <option value="<?=$v['ID']?>"><?=$v['NAME']?></option>
              <? endforeach; ?>
          </select>
          </div>
          <div class="mb-3">
            <label>File</label>
            <input type="file" name="pdf_file" autocomplete="off" accept=".pdf" class="form-control">
          </div>
          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="cat_image" autocomplete="off" class="form-control" accept="image/*" onchange="loadFile(event)">
            <div class="center-image"><img id="output" width="50%" alt="" align="center"></div>
          </div>
          <script>
              var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output');
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

<style>

.center-image{
  margin-top: 30px;
  display: flex; 
  align-items: center; 
  justify-content: center;
}

</style>

<?

if(isset($_POST["deleteSubmit"])){
  $deactive = db::query("UPDATE `catalog_files` SET `ACTIVE`='0' WHERE ID='$_POST[deleteId]'");
  LocalRedirect("index.php");
}
?>