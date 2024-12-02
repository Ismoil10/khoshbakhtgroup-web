<?if ($_GET['action']=='create_section'){$rs= insert::CREATE_SECTION($_SESSION['con_id']);LocalRedirect('index.php');}?>

<?
$data = db::arr_s("SELECT * FROM IBLOCK WHERE TYPE='SECTION' AND MAIN_BLOCK_ID='$_SESSION[con_id]'");

if ($data!='empty'){
$content = db::arr_s("SELECT * FROM CONTENT WHERE IBLOCK_ID='$data[ID]'");

if ($content=='empty'){
$arr = ['block_id'=>$data['ID'],
['name'=>'Главная','section_name'=>'main'      ,'active'=>'1'],
['name'=>'О нас'  ,'section_name'=>'about'     ,'active'=>'1'],
['name'=>'Услуги' ,'section_name'=>'services'  ,'active'=>'1']];	
insert::CONTENT_MULTI($arr);}

$content = db::arr_s("SELECT * FROM CONTENT WHERE IBLOCK_ID='$data[ID]'");}
?>




<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Sections: 
				
					
					
				
					
					
                    <?if ($data=='empty'):?>
					<a href="?action=create_section">
					<button type="button"  class="btn btn-round btn-default"><i
                                class="fa fa-plus"></i> Create
                    </button>
					</a>
					<?else:?>
				
					<?
					$ajax_arr = [
                    'ajax'=>[
                    'link'=>'infoblock/show_edit_form.php',
                    'success'=>'show_edit_form',
                    'data'=>['ID'=>$menu_data['ID']]]];					
					?>					
					<button type="button" onclick='<?=action::button($ajax_arr)?>' class="btn btn-round btn-default"><i
                                class="fa fa-list"></i> View array
                    </button>
				
					<?endif?>
					
					
					
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
			<?if ($data!='empty'):?>
			
					
<div  id="temp_row_1" class="hide">
<table>
<tbody id="temp_row">
		<tr>
										
										<td>
										<input  class="form-control"  name="name[]" required>
										</td>                       
										                            
										<td>                        
										<input class="form-control"  name="section_name[]" required>
										</td>

										<td>                        
										<input class="form-control"  name="active[]" required>
										</td>                       
										
										
										
									   <td>
		                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);">  <i class="fa fa-trash"></i></button>
                                     	</td>
										
										
										
										
		</tr>	
</tbody>
</table>
</div>



   <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">    
		
		<!-- FORM-->
		<form method="POST" action="">
	  
          		
			
            
    <input type="hidden" name="content_id" value="<?=$content['ID']?>">   
		
	<?/*	
	<div class="form-group">
	<label class="control-label">Названия</label>
	<input type="text" name="iblock_name" class="form-control" required>
	</div>
	*/?>


	<?// echo "<pre>"; print_r(json_decode($content['DATA_JSON'],TRUE)); echo "</pre>";  ?>
	
					
								
								
								<br>
								<legend style="font-size:16px;color:#337ab7">Elements</legend>
								<div class="col-lg-12" id="listDayWorkHours">
					
				                 	<table id="tableMovedDays" class="table table-hover" style="font-size:14px">
				                 		<thead style="color: #333;">
				                 			<tr>
				                 				<th>NAME</th>
				                 				<th>SECTION_NAME</th>              				
				                 				<th>ACTIVE</th>              				
				                 				<th>DEL</th>
				                 			</tr>
				                 		</thead>
				                 		<tbody class="table-striped">
										<?foreach ( json_decode($content['DATA_JSON'],TRUE) as $v):?>
										<tr>
										
										<td>
										<input class="form-control" name="name[]" value="<?=$v['name']?>" required>
										</td>
										
										<td>
										<input class="form-control" name="section_name[]" value="<?=$v['section_name']?>" required>
										</td>

										<td>
										<input class="form-control" name="active[]" value="<?=$v['active']?>" required>
										</td>
										
									
										
										
									   <td>
		                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);">  <i class="fa fa-trash"></i></button>
                                     	</td>
										
										
										
										
										</tr>									
										<?endforeach;?>
				                 		</tbody>
				                 	</table>
				                 	
				                 	<button id="btnAddTableRow" type="button"  class="btn btn-primary btn-sm" onclick="add_table_row(this.value)" value="0">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;</button>
				                 	
				                 </div>
			</div>

							
                                                    
         
		
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2"><br><br>             	          	
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="update_static_content_form">Save</button>
            </div>			
			
        
        </form>
		<!-- FORM END -->
	













<script>


$(document).ready(function (){
	
	add_table_row = function(count){
		var table_content = document.getElementById("temp_row");
		//alert(table_content.innerHTML);
		
			$('#tableMovedDays tbody').append(table_content.innerHTML );
			
	}
	
	

	
});

</script>


			
			
							
              
              
            <?endif?> 
            </div>
        </div>
    </div>
</div>

          
              
     

<?require 'sections_modal.php';?>
<?require 'sections_js.php';?>



