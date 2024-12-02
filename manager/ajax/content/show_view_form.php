<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>




<?
$iblock = db::arr_s("SELECT * FROM iblock WHERE ID='$_POST[iblock_id]'");
$fields = json_decode($iblock['FIELDS_JSON'],TRUE);
foreach ($fields as $k => $v){
$sort[$k] = $v['sort'];}
array_multisort($sort, SORT_ASC, $fields);

$content = db::arr_s("SELECT * FROM CONTENT WHERE ID='$_POST[content_id]'");
$content_data = json_decode($content['DATA_JSON'],TRUE); 
?>


<?// echo "<pre>"; print_r($content); echo "</pre>";  ?>
<?// echo "<pre>"; print_r($content_data); echo "</pre>";  ?>



  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				View element (section: <?=$iblock['NAME']?>)
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						<input type="hidden" name="content_id" value="<?=$content['ID']?>">
						
						
						<? //echo "<pre>"; print_r($fields); echo "</pre>";  ?>
						
						
						
						<div class="form-group">
							<label class="control-label">Actively</label>
							<input type="checkbox" name="active_status" value="1" 
							<?if ($content['ACTIVE']==1){echo 'checked';}?> >
						</div>
						
						
					    <div class="form-group">
					    	<label class="control-label">sort</label>
					    	<input type="number" name="sort_status" value="<?=$content['SORT']?>" class="form-control" required>
					    </div>
						
					
						
						<?foreach ($fields as $v):?>
						
						<?if ($v['type']=='textarea'):?>
						<label class="control-label"><?=$v['name']?></label>
						<div id="<?=$v['name']?>">
						<?=html_entity_decode($content_data[$v['name']],ENT_QUOTES)?>
                        </div>
						<input type="hidden" name="<?=$v['name']?>">	
						<script>						
						$('#<?=$v['name']?>').summernote({
                         height: 200,                
                         minHeight: null,            
                         maxHeight: null,           
                         focus: true               
                         });
						
                         $( "form" ).submit(function() {
                         val = $('#<?=$v['name']?>').summernote('code');
                         $('[name=<?=$v['name']?>]').val(val);              					
  						
                         });						
						</script>						
						
						<?elseif ($v['type']=='file'):?>					
						
						<label class="control-label"><?=$v['name']?> (file)</label><br>						
						<input type="hidden" name="<?=$v['name']?>" value="<?=$content_data[$v['name']]?>">
											
						<div id="file_content_<?=$v['name']?>">		
						
						<?if ($content_data[$v['name']]!=NULL):?>
						<div class="row"><br>
                        <img  src="<?=$content_data[$v['name']]?>" width="50%" align="center"/>
                        </div>
						
						<?endif?>
						
					
												
						</div>
					
					
						
						<?else:?>
						
							<div class="form-group">
								<label class="control-label"><?=$v['name']?></label>
								<input type="<?=$v['type']?>" name="<?=$v['name']?>" value="<?=$content_data[$v['name']]?>" class="form-control" required>
							</div>
						<?endif?>	
						<?endforeach?>
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer">               	
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>


		



				












