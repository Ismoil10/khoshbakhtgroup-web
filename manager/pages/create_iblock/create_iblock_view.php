<? //echo "<pre>"; print_r($_SESSION['con_id']); echo "</pre>";  ?>

<?
$fields = [
	['name'=>'name'     ,'type'=>'text'  ,'sort'=>'100','show_table'=>1],
    ];
?>




<? //echo "<pre>"; print_r($_POST); echo "</pre>";  ?>




<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title ">
                <h2> Create Infoblock </h2>
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
			
			
			
<div  id="temp_row_1" class="hide">
<table>
<tbody id="temp_row">
		<tr>
										
										<td>
										<input class="form-control"  name="name[]" required>
										</td>                       
										                            
										<td>                        
										<select class="form-control" name="type[]" required>
										<option value="text" >text</option>										
										<option value="number" >number</option>										
										<option value="textarea" >textarea</option>									
										<option value="file">file</option>										
										</select>
										</td>                       
										                            
										<td>                        
										<input class="form-control"  name="sort[]" required>
										</td>	                    
										                            
										<td>                        
										<input class="form-control"  name="show_table[]" required>
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
	  
          		
			
            
    <input type="hidden" name="main_block_id" value="<?=$_SESSION['con_id']?>">   
		
	<div class="form-group">
	<label class="control-label">Name</label>
	<input type="text" name="iblock_name" class="form-control" required>
	</div>



	
	
	<?// echo "<pre>"; print_r($fields); echo "</pre>";  ?>
	
	
	
								
								
								
								<br>
								<legend style="font-size:16px;color:#337ab7">Fields</legend>
								<div class="col-lg-12" id="listDayWorkHours">
					
				                 	<table id="tableMovedDays" class="table table-hover" style="font-size:14px">
				                 		<thead style="color: #333;">
				                 			<tr>
				                 				<th>NAME</th>
				                 				<th>TYPE</th>
				                 				<th>SORT</th>
				                 				<th>SHOW_TABLE</th>
				                 				<th>DEL</th>
				                 			</tr>
				                 		</thead>
				                 		<tbody class="table-striped">
										<?foreach ( $fields as $v):?>
										<tr>
										
										<td>
										<input class="form-control" name="name[]" value="<?=$v['name']?>" required>
										</td>
										
										<td>
										<select class="form-control" name="type[]" required>
										<option value="text" 
										<? if ($v['type']=='text'){echo 'selected';}?> >text</option>										
										<option value="number"
										<?if ($v['type']=='number'){echo 'selected';}?>>number</option>										
										<option value="textarea" 
										<?if ($v['type']=='textarea'){echo 'selected';}?>>textarea</option>									
										<option value="file"
										<?if ($v['type']=='file'){echo 'selected';}?>>file</option>										
										</select>
										</td>
										
										<td>
										<input class="form-control" name="sort[]" value="<?=$v['sort']?>" required>
										</td>	
										
										<td>
										<input class="form-control" name="show_table[]" value="<?=$v['show_table']?>" required>
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
              <button type="submit" class="btn btn-primary" name="infoblock_create_form">Создать</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
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
	
	
	$('.clickable').on('click',function() {
   
   alert('78878');
});
	
});

</script>


			
			
							
              
              
             
            </div>
        </div>
    </div>
</div>


<?//require 'menu_modal.php';?>
<?//require 'menu_js.php';?>



