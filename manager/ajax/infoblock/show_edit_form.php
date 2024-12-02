<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>

<?
$iblock = db::arr_s("SELECT * FROM iblock WHERE ID='$_POST[ID]'");
$fields = json_decode($iblock['FIELDS_JSON'],TRUE);
foreach ($fields as $k => $v){
$sort[$k] = $v['sort'];}
array_multisort($sort, SORT_ASC, $fields);
?>

<? //echo "<pre>"; print_r($_POST); echo "</pre>";  ?>


<? //echo "<pre>"; print_r(json_decode($iblock['FIELDS_JSON'],TRUE)); echo "</pre>";  ?>

<? //echo "<pre>"; print_r($iblock); echo "</pre>";  ?>

<?$text = "<? foreach (view::CONTENT('all_active',['IBLOCK_ID'=>'$_POST[ID]']) as \$v):?><?endforeach?>";?>





<div  id="temp_row_1" class="hide">
<table>
<tbody id="temp_row">
		<tr>
										
										<td>
										<input type="text" class="form-control"  name="name[]" required>
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
										<input type="number" class="form-control"  name="sort[]" required>
										</td>	                    
										                            
										<td>                        
										<input type="number" class="form-control"  name="show_table[]" required>
										</td>
										
										
									   <td>
		                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);">  <i class="fa fa-trash"></i></button>
                                     	</td>
										
										
										
										
		</tr>	
</tbody>
</table>
</div>


 <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">Edit Infoblock</h4>
            </div>			
			
            <div class="modal-body">  
            
    <input type="hidden" name="iblock_id" value="<?=$iblock['ID']?>">   
		
	<div class="form-group">
	<label class="control-label">Name</label>
	<input type="text" name="iblock_name" class="form-control"  value="<?=$iblock['NAME']?>" required>
	</div>
	<? echo "Вызов<pre>"; print_r(htmlentities($text)); echo "</pre>";  ?>
	<button type="button" id="copy-clipboard" onclick="navigator.clipboard.writeText('<?=addslashes($text)?>');"><i class="fa fa-clipboard"></i></button>

	<div class="col-lg-12">
	<?// echo "<pre>"; print_r($fields); echo "</pre>";  ?>
	
	
	
								
								
								
								<br>
								<legend style="font-size:16px;color:#337ab7">Fields</legend>
								<div class="col-lg-12" id="listDayWorkHours">
					
				                 	<table id="tableMovedDays" class="table table-hover" style="font-size:14px">
				                 		<thead style="color: #333;">
				                 			<tr>
				                 				<th width="25%;">NAME</th>
				                 				<th width="22%;">TYPE</th>
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
										
										<option value="text" <?if($v['type']=='text'){echo 'selected';}?>>
										text
										</option>
										
										<option value="number" <?if($v['type']=='number'){echo 'selected';}?>>
										number
										</option>
										
										<option value="textarea" <?if($v['type']=='textarea'){echo 'selected';}?>>textarea
										</option>
										
										<option value="file" <?if($v['type']=='file'){echo 'selected';}?>>
										file
										</option>
										
										</select>
										
										<?/*
										<input class="form-control" name="type[]" value="<?=$v['type']?>" required>
										*/?>
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

							
                                                    
              	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="infoblock_edit_form">Edit</button>
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>












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















