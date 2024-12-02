
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title ">
        <h2> Products </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0);">Today</a>
              </li>
              <li><a href="javascript:void(0);">All</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
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
          <!-- Scrollbar style="height: 800px; overflow-y: auto;" -->
          <div class="col-md-12">
            <table class="table table-striped d_tab">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Brand</th>
                  <th>Type of product</th>
                  <th>Name eng.</th>
                  <th>Name uz.</th>
                  <th>Name ru.</th>
                  <th>Name fr.</th>
                  <th>Name ar.</th>
                  <th>Name per.</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>For banner</th>
                  <th>Special deals</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <? $product_list = db::arr("SELECT product.*, 
                    bl.NAME AS BRAND_NAME,
                    cat.NAME AS CAT_NAME 
                    FROM products_list AS product
                    LEFT JOIN brands_list AS bl ON bl.ID = product.BRAND_ID
                    LEFT JOIN category AS cat ON cat.ID = product.CAT_ID
                    WHERE product.ACTIVE='1'");
                    ?>
                <? //echo '<pre>'; print_r($_POST); echo '</pre>';?>
                <?foreach($product_list as $v):
                $get_img = json_decode($v['IMAGES'], true);?>
                <tr>
                  <td><?=$v['ID']?></td>
                  <td><?=$v['BRAND_NAME']?></td>
                  <td><?=$v['CAT_NAME']?></td>
                  <td><?=$v['NAME_EN']?></td>
                  <td><?=$v['NAME_UZ']?></td>
                  <td><?=$v['NAME_RU']?></td>
                  <td><?=$v['NAME_FR']?></td>
                  <td><?=$v['NAME_AR']?></td>
                  <td><?=$v['NAME_PER']?></td>
                  <td><?='$'.$v['PRICE']?></td>
                  <td align="center" class="custom-img">
                    <img class="s-image" src="<?=$get_img['img_1']?>" style="height: 60px;">
                  </td>
                  <td><? if($v['AD'] != 1){ echo "not added";}else{ echo "added";}?></td>
                  <td><? if($v['SPEC_DEALS'] != 1){ echo "not added";}else{ echo "added";}?></td>
                  <td>                                      
                    <button type="button" onclick="view_modal('<?=$v['ID'];?>')" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</button>
                  </td>                                                
									<td>                                      
                    <button type="button" onclick="edit_modal('<?=$v['ID']?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</button>
                  </td>	
                  <td>                                      
                    <button type="button" onclick="delete_modal('<?=$v['ID']?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                  </td>
                </tr>
                <? endforeach;?>             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>

:root {
    --select-border: #777;
    --select-focus: blue;
    --select-arrow: var(--select-border);
  }
  
  select {
    // A reset of styles, including removing the default dropdown arrow
    appearance: none;
    background-color: transparent;
    border: none;
    padding: 0 1em 0 0;
    margin: 0;
    width: 100%;
    font-family: inherit;
    font-size: inherit;
    cursor: inherit;
    line-height: inherit;
  
    // Stack above custom arrow
    z-index: 1;
  
    // Remove dropdown arrow in IE10 & IE11
    // @link https://www.filamentgroup.com/lab/select-css.html
    &::-ms-expand {
      display: none;
    }
  
    // Remove focus outline, will add on alternate element
    outline: none;
  }
  
  .select {
    display: grid;
    grid-template-areas: "select";
    align-items: center;
    position: relative;
  
    select,
    &::after {
      grid-area: select;
    }
  
    min-width: 15ch;
    max-width: 30ch;
  
    border: 1px solid var(--select-border);
    border-radius: 0.25em;
    padding: 0.25em 0.5em;
  
    font-size: 1.25rem;
    cursor: pointer;
    line-height: 1.1;
  
    // Optional styles
    // remove for transparency
    
  }
  
  // Interim solution until :focus-within has better support
  select:focus + .focus {
    position: absolute;
    top: -1px;
    left: -1px;
    right: -1px;
    bottom: -1px;
    border: 2px solid var(--select-focus);
    border-radius: inherit;
  }
  
  select[multiple] {
    padding-right: 0;
  
    /*
     * Safari will not reveal an option
     * unless the select height has room to 
     * show all of it
     * Firefox and Chrome allow showing 
     * a partial option
     */
    
  }
  
  .select--disabled {
    cursor: not-allowed;
    background-color: #eee;
    background-image: linear-gradient(to top, #ddd, #eee 33%);
  }
  
  label {
   
    font-weight: 500;
  }
  
  .select + label {
    margin-top: 2rem;
  }

  .custom-img{
  max-width: auto;
  max-height: auto;
}
</style>

<?require "products_modal.php";?>
<?require "products_js.php";?>