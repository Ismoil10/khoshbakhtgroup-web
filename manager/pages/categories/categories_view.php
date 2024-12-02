<?

$category = db::arr("SELECT cat.*, 
bl.NAME AS BRAND_NAME,
cat.NAME AS CAT_NAME 
FROM category AS cat
LEFT JOIN brands_list AS bl ON bl.ID = cat.BRAND_ID
WHERE cat.ACTIVE='1'");

?>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title ">
        <h2>Categories</h2>
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
                  <th>Name</th>
                  <th>Brand</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <? foreach($category as $v):?>
                  <tr>
                    <td><?=$v["ID"]?></td>
                    <td><?=$v["CAT_NAME"]?></td>
                    <td><?=$v["BRAND_NAME"]?></td>
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
<? require "categories_modal.php";?>
<? require "categories_js.php"; ?>