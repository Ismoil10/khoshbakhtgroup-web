<?

$catalog_files = db::arr("SELECT cat.*, 
bl.NAME AS BRAND_NAME,
cat.URL AS CAT_NAME,
cat.IMAGE AS CAT_IMAGE
FROM catalog_files AS cat
LEFT JOIN brands_list AS bl ON bl.ID = cat.BRAND_ID
WHERE cat.ACTIVE='1'");

?>

<?  

if(isset($_POST["addSubmit"])){
  if($_FILES["pdf_file"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_1 = db::file_upload("pdf_file", "upload");   
  }
  if($_FILES["cat_image"]["error"] != UPLOAD_ERR_NO_FILE){
    $img_1 = db::file_upload("cat_image", "upload");   
  }

  $file_src = [
    "file_1"=>$file_1["url"]
  ];
  $img_src = [
    "img_1"=>$img_1["url"]
  ];

  $file = json_encode($file_src);
  $image = json_encode($img_src);

  $brand_id = filter_input(INPUT_POST, "brand_id", FILTER_SANITIZE_ADD_SLASHES);
  $insert = db::query("INSERT INTO `catalog_files` (`BRAND_ID`, `URL`, `IMAGE`, `ACTIVE`) VALUES ('$brand_id', '$file', '$image', '1')");
  LocalRedirect("index.php");
}

if(isset($_POST["editSubmit"])){
  $select_url = db::arr_s("SELECT * FROM `catalog_files` WHERE ID='$_POST[editId]' AND ACTIVE='1'");

  $file_src_old = json_decode($select_url["URL"], true);
  $img_src_old = json_decode($select_url["IMAGE"], true);
  
  if($_FILES["edit_file_1"]["error"] != UPLOAD_ERR_NO_FILE){
    $file_1 = db::file_upload("edit_file_1", "upload");
    $file_src_old["file_1"] = $file_1["url"];
  }
  if($_FILES["cat_image"]["error"] != UPLOAD_ERR_NO_FILE){
    $img_1 = db::file_upload("cat_image", "upload");
    $img_src_old["img_1"] = $img_1["url"];
  }

  $file = json_encode($file_src_old);
  $update_file = ",`URL`='$file'";
  
  $image = json_encode($img_src_old);
  $update_img = ",`IMAGE`='$image'";

  $brand_id = filter_input(INPUT_POST, "edit_brand", FILTER_SANITIZE_ADD_SLASHES);
  $update = db::query("UPDATE `catalog_files` SET `BRAND_ID`='$brand_id' $update_file $update_img WHERE `ID`='$_POST[editId]'");
 LocalRedirect("index.php");
}

$brands = db::arr("SELECT * FROM brands_list WHERE ACTIVE = 1");

?>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title ">
        <h2>Catalog files</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="view.php?d_tab_show=today">Today</a>
              </li>
              <li><a href="view.php?d_tab_show=all">All</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
         </li>
        </ul>
      <div class="clearfix"></div>
      </div>
      <div class="x_content ">
        <!-- Nav tabs -->
        <ul class="nav">
          <li class="active pull-left">
            <button type="button" onclick="add_modal()" data-toggle="modal" class="btn btn-round btn-default">
              <i class="fa fa-plus"></i>
              Add Element
            </button>
          </li>
        </ul><br><br>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped d_tab">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Brand</th>
                  <th>File</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <? foreach($catalog_files as $v):?>
                  <? $get_file = json_decode($v["CAT_NAME"], true); ?>
                  <? $get_img = json_decode($v["CAT_IMAGE"], true); ?>
                  <tr>
                    <td><?=$v["ID"]?></td>
                    <td><?=$v["BRAND_NAME"]?></td>
                    <td><?=$get_file["file_1"]?></td>
                    <td>
                        <img src="<?=$get_img["img_1"]?>" style="width: 150px;" alt="Catalog image">
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary" onclick="edit_modal(<?=$v['ID']?>)"><i class="fa fa-pencil"></i></button>
                      <button type="button" class="btn btn-danger" onclick="delete_modal(<?=$v['ID']?>)"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                <?endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<? require "catalog_files_modal.php";?>
<? require "catalog_files_js.php"; ?>