<?

if(isset($_POST["addSubmit"])){
  if($_FILES["brand_image_1"]["error"] != UPLOAD_ERR_NO_FILE){
    $brand_file_1 = db::file_upload("brand_image_1", "upload");
  
  }
  if($_FILES["brand_image_2"]["error"] != UPLOAD_ERR_NO_FILE){
    $brand_file_2 = db::file_upload("brand_image_2", "upload");
  
  }

  if($_FILES["brand_logo"]["error"] != UPLOAD_ERR_NO_FILE){
    $brand_logo = db::file_upload("brand_logo", "upload");
  
  }

  $logo_src = [
    "logo"=>$brand_logo['url']
  ];

  $logo = json_encode($logo_src);

  $image_src = [
    "img_1"=>$brand_file_1["url"],
    "img_2"=>$brand_file_2["url"]
  ];
  $file = json_encode($image_src);

  $brand_name = filter_input(INPUT_POST, "brand_name", FILTER_SANITIZE_ADD_SLASHES);  
  $insert = db::query("INSERT INTO `brands_list` (`NAME`, `LOGO`, `IMAGES`, `ACTIVE`) VALUES ('$brand_name', '$logo', '$file', '1')");
  LocalRedirect("index.php");
}

if(isset($_POST["editSubmit"])){
  $select_url = db::arr_s("SELECT * FROM `brands_list` WHERE ID='$_POST[editId]' AND ACTIVE='1'");
  $select_id = db::arr_s("SELECT * FROM `files` WHERE URL = '$select_url[URL]'");
  $img_src_old = json_decode($select_url["IMAGES"], true);
  
  if($_FILES['edit_image_1']['error'] != UPLOAD_ERR_NO_FILE){
    $edit_file = db::file_upload("edit_image_1", "upload");
    $img_src_old["img_1"] = $edit_file["url"];
  }
  if($_FILES['edit_image_2']['error'] != UPLOAD_ERR_NO_FILE){
    $edit_file = db::file_upload("edit_image_2", "upload");
    $img_src_old["img_2"] = $edit_file["url"];
  }

  if($_FILES['edit_logo']['error'] != UPLOAD_ERR_NO_FILE){
    $edit_logo = db::file_upload("edit_logo", "upload");
    $logo_src_old["logo"] = $edit_logo["url"];
  }
  $logo = json_encode($logo_src_old);
  $update_logo = ",`LOGO`='$logo'";

  $file = json_encode($img_src_old);
  $update_image = ",`IMAGES`='$file'";
  $brand_name = filter_input(INPUT_POST, "edit_brand_name", FILTER_SANITIZE_ADD_SLASHES);
  $update = db::query("UPDATE `brands_list` SET `NAME`='$brand_name' $update_logo $update_image WHERE `ID`='$_POST[editId]'");
  LocalRedirect("index.php");
}

?>

<!-- ADD REQUEST Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="taskModalLabel">Add Brand</h4>
      </div>
      <div class="modal-body">
      <? //echo '<pre>'; print_r($_FILES); echo '</pre>'; ?>
        <form action="" method="POST" id="addForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="brand_name" class="form-control">
            <label>Logo</label>
            <input type="file" name="brand_logo" class="form-control" accept="image/*" onchange="loadLogo(event)">
            <div class="center-image"><img id="output_logo" width="100%" alt="" align="center"></div>
            <label>Image</label>
            <input type="file" name="brand_image_1" class="form-control" accept="image/*" onchange="loadFile_1(event)">
            <div class="center-image"><img id="output_img_1" width="100%" alt="" align="center"></div>
            <label>Mobile image</label>
            <input type="file" name="brand_image_2" class="form-control" accept="image/*" onchange="loadFile_2(event)">
            <div class="center-image"><img id="output_img_2" width="100%" alt="" align="center"></div>
          </div>
          <script>
                var loadLogo = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output_logo');
                    output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
                var loadFile_1 = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output_img_1');
                    output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
                var loadFile_2 = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output_img_2');
                    output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
          </script>
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

<!-- DELETE MODAL -->
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
  $deactive = db::query("UPDATE `brands_list` SET `ACTIVE`='0' WHERE ID='$_POST[deleteId]'");
  LocalRedirect("index.php");
}
?>