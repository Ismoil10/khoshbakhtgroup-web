<?
$brand_list = db::arr("SELECT * FROM `brands_list` WHERE ACTIVE=1");
?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title ">
        <h2>Brands</h2>
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
          <? //echo '<pre>'; print_r($_FILES); echo '</pre>';?>
            <table class="table table-striped d_tab">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?foreach($brand_list as $v):?>
                  <? $img = json_decode($v['IMAGES'], true) ?>
                  <? $logo = json_decode($v['LOGO'], true) ?>
                  <tr>
                    <td><?=$v["NAME"]?></td>
                    <td class="custom-img">
                      <img src="<?=$logo['logo']?>" style="width: 150px;">
                    </td>
                    <td class="custom-img">
                      <img src="<?=$img['img_1']?>" style="width: 150px;">
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary" onclick="edit_modal('<?=$v['ID']?>')"><i class="fa fa-pencil"></i></button>
                      <button type="button" class="btn btn-danger" onclick="deleteModal(<?=$v['ID']?>)"><i class="fa fa-trash"></i></button>
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
<style>

.custom-img{
  max-width: auto;
  max-height: auto;
}

</style>

<?require "brands_modal.php";?>
<?require "brands_js.php";?>