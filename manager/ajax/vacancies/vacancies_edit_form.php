<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>



<?
$fields = [
[ 'name' => 'sort', 'name_db'=>'SORT', 'type' => 'int','sort' => '50' ],
[ 'name' => 'name__vacancies', 'name_db'=>'name__vacancies', 'type' => 'text','sort' => '100' ],
[ 'name' => 'category_vacancies', 'name_db'=>'category_vacancies', 'type' => 'text','sort' => '200' ],
[ 'name' => 'employment_vacancies', 'name_db'=>'employment_vacancies', 'type' => 'text','sort' => '300' ],
[ 'name' => 'requirements_list1', 'name_db'=>'requirements_list1', 'type' => 'text','sort' => '400' ],
[ 'name' => 'requirements_list2', 'name_db'=>'requirements_list2', 'type' => 'text','sort' => '450' ],
[ 'name' => 'requirements_list3', 'name_db'=>'requirements_list3', 'type' => 'text','sort' => '500' ],
[ 'name' => 'requirements_list4', 'name_db'=>'requirements_list4', 'type' => 'text','sort' => '550' ],
[ 'name' => 'requirements_list5', 'name_db'=>'requirements_list5', 'type' => 'text','sort' => '600' ],
[ 'name' => 'requirements_list6', 'name_db'=>'requirements_list6', 'type' => 'text','sort' => '650' ],
[ 'name' => 'tasks_list1', 'name_db'=>'tasks_list1', 'type' => 'text','sort' => '700' ],
[ 'name' => 'tasks_list2', 'name_db'=>'tasks_list2', 'type' => 'text','sort' => '750' ],
[ 'name' => 'tasks_list3', 'name_db'=>'tasks_list3', 'type' => 'text','sort' => '800' ],
[ 'name' => 'work_list', 'name_db'=>'work_list', 'type' => 'text','sort' => '850' ]
];
?>


<?
$content_data = db::arr_s("SELECT * FROM vacancies_det WHERE ID='$_POST[vacancies_id]'");
?>


<?// echo "<pre>"; print_r($content); echo "</pre>";  ?>
<? //echo "<pre>"; print_r($content_data); echo "</pre>";  ?>



  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				Редактировать элемент111 (раздел: <?=$iblock['NAME']?>)
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						<input type="hidden" name="vacancies_id" value="<?=$_POST['vacancies_id']?>">
						
						
						<? //echo "<pre>"; print_r($fields); echo "</pre>";  ?>
						
						
						
						<div class="form-group">
							<label class="control-label">Активно</label>
							<input type="checkbox" name="active_status" value="1" 
							<?if ($content_data['STATUS']==1){echo 'checked';}?> >
						</div>
						
						<!--
					    <div class="form-group">
					    	<label class="control-label">sort</label>
					    	<input type="number" name="sort_status" value="<?=$content['SORT']?>" class="form-control" required>
					    </div>
						-->
						
						  <div class="form-group">
					    	<label class="control-label">lang</label>
					    	<select  name="lang"  class="form-control" required>
							<option value="uz" <?if ($content_data['LANG']=='uz') echo 'selected';?>>uz</option>
							<option value="ru" <?if ($content_data['LANG']=='ru') echo 'selected';?>>ru</option>
							<option value="en" <?if ($content_data['LANG']=='en') echo 'selected';?>>en</option>
							</select>
							
					    </div>
						
						
					
						
						<?foreach ($fields as $v):?>
						
						<?if ($v['type']=='textarea'):?>
						<label class="control-label"><?=$v['name']?></label>
						<div id="<?=$v['name']?>">
						<?=html_entity_decode($content_data[$v['name_db']],ENT_QUOTES)?>
                        </div>
						<input type="hidden" name="<?=$v['name']?>">	
						<script>						
						$('#<?=$v['name']?>').summernote({
						  toolbar: [
    ['style', ['style']],
    ['fontsize', ['fontsize']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['insert', ['picture', 'hr']],
    ['table', ['table']],
	['view', ['fullscreen', 'codeview', 'help']]
  ],	
							
                         height: 200,                
                         minHeight: null,            
                         maxHeight: null,           
                         focus: true,
                         fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150']						 
                         });
						 
	
						
                         $( "form" ).submit(function() {
                         val = $('#<?=$v['name']?>').summernote('code');
                         $('[name=<?=$v['name']?>]').val(val);              					
  						
                         });						
						</script>
						
						
						
						<?elseif ($v['type']=='file'):?>						
					
						
						<label class="control-label"><?=$v['name']?> (файл)</label><br>
						
						<input type="hidden" name="<?=$v['name']?>" value="<?=$content_data[$v['name_db']]?>">
						
						<button type="button" class="btn btn-primary" onclick="file_content('new','<?=$v['name']?>')">
						<i class="fa fa-plus"></i>  Добавить новый</button>
						
						<button type="button" class="btn btn-info" onclick="file_content('list','<?=$v['name']?>')">
						<i class="fa fa-list"></i>  Выбрать из списка</button>
					
						<button style="display:none;" id="save_button_<?=$v['name']?>" type="button" class="btn btn-success" onclick="save_file('<?=$v['name']?>')">
						<i class="fa fa-save"></i>  Сохранить файл</button>
						
						
						<div id="file_content_<?=$v['name']?>">	
						
						
								



				
						
						<?if ($content_data[$v['name_db']]!=NULL):?>
						<div class="row"><br>
                        <img  src="<?=$content_data[$v['name_db']]?>" width="50%" align="center"/>
                        </div>
						
						<?endif?>
						
					
												
						</div>
						
						<div id="image_file_<?=$v['name']?>" style="display:none;"><br>
						 <div class="row"><br>
                        <img id="show_image_<?=$v['name']?>" width="50%" align="center"/>
                        </div>
						</div>			
			
						
						
						<div id="new_upload_file_<?=$v['name']?>"style="display:none;"><br>
						
						<input type="file" name="upload_<?=$v['name']?>" id="upload_<?=$v['name']?>" accept="image/*" onchange="loadFile(event,'<?=$v['name']?>')"><br>
							
					
						
						
					
						
											
                        <div class="row"><br>
                        <img id="output_<?=$v['name']?>" width="50%" align="center"/>
                        </div>
						
						
                  
						</div>
						
						
						<div id="file_library_<?=$v['name']?>" style="display:none;"><br>
						<div class="row">
						
						<?$files = db::arr("SELECT * FROM files ORDER BY ID DESC");
                         if ($files=='empty'){$files=array();}?>
                         <?foreach($files as $v2):?>
                          <div class="col-md-4">
                           <div id="image_<?=$v2['ID']?>" class="img-container">
                               <img class="image" src="<?=$v2['URL']?>">
                               <div class="overlay" onclick="choice_image('<?=$v2['URL']?>','<?=$v['name']?>')">
                                <div class="is-checked hide">Tanlangan</div> 
                                <div class="circle"></div>
                               </div>
                            </div>
                            <span class="help-block"></span>
                          </div>
                         <?endforeach?>

						
						<?/*
						<?$files = db::arr("SELECT * FROM files");
						if ($files=='empty'){$files=array();}?>
				        <? foreach ( $files as $k2=>$v2): ?>
						
                            <div class="col-md-4">
                              <div class="thumbnail">
                                
                                  <img src="<?=$v2['URL']?>" alt="Lights" style="width:100%">
                                  <div class="caption">
                                    <p><?=$v2['NAME']?></p>
									<button type="button" onclick="choice_image(
									'<?=$v2['URL']?>','<?=$v['name']?>')" class="btn btn-primary">
									<i class="fa fa-plus"></i></button>
									
                                  </div>
                                
                              </div>
						
                            </div>
						<?endforeach;?>	
						*/?>
						
                           
                        </div>						
						</div>
											
					
						
						<?else:?>
						
							<div class="form-group">
								<label class="control-label"><?=$v['name']?></label>
								<input type="<?=$v['type']?>" name="<?=$v['name']?>" value="<?=$content_data[$v['name_db']]?>" class="form-control" required>
							</div>
						<?endif?>	
						<?endforeach?>
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer"> 
              <button type="submit" class="btn btn-primary" name="vacancies_edit_form">Редактировать</button>			
              <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
             
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>


				<script>
						$(document).ready(function (){
						//js_dt_reload('d_tab_1',3);	
						
						file_content = function (sts,name) {
							
						$('#save_button_'+name).attr( "style", "display:none;");
						
						if (sts=='new') {content = $('#new_upload_file_'+name).html();}
						if (sts=='list') {content = $('#file_library_'+name).html();}
						if (sts=='image_file') {content = $('#image_file_'+name).html();}
						$('#file_content_'+name).html(content);}

						choice_image = function (url,name){							
						$('[name='+name +']').val(url);
                        $("#show_image_"+name).attr("src",url);
						file_content('image_file', name);						
							
						}
						
                        						
                         
                        select_image = function(id){
                        	//$('.img-container').removeClass('selected');  
                           $('#image_'+id).toggleClass('selected');
                           $('#image_'+id+' .overlay .is-checked').toggleClass('hide');
                          }
                      
                        						
						save_file = function (name){
						    var file_data = $('#upload_'+name).prop('files')[0];
							console.log(file_data);
                            var form_data = new FormData();						
                            form_data.append('upload_'+name, file_data);	
                            form_data.append('file_name', 'upload_'+name);	
                            js_ajax_post("content/add_file.php",form_data).success(
							function (data) {
							url = $.trim(data);	
	                        if (url!=''){
							choice_image(url,name);  	
							}
							
							});		
							
						}
						
													
							
						});
						
						</script>
						
						
						
						
						      <script>
                          var loadFile = function(event,name) {
                            var reader = new FileReader();
                            reader.onload = function(){
                              var output = document.getElementById('output_'+name);
                              output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
							$('[name='+name+']').val("");
							$('#save_button_'+name).attr( "style", "");
							//save_file(name);
							
						
							
                          };
                        </script>	
			
<style>
    .img-container {
        position: relative;
        
     width: 160px;
        height: 120px;
   display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid gray;
     border-radius: 4px;
    }


 .overlay {
   position: absolute; 
   bottom: 0; 
   background: rgb(0, 0, 0);
   background: rgba(0, 0, 0, 0.5); /* Black see-through */
   color: #f1f1f1; 
   width: 100%;
   transition: .5s ease;
   opacity:0;
   color: white;
   font-size: 10px;
   padding: 5px;
   text-align: center;
   height: 100%;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer; 
 }

 .img-container:hover .overlay {
        opacity: 1;
 }

    .image {
     
     width: auto;
     height: auto;
     max-height: 110px;
     max-width: 150px;
	 margin:5px;
    }

    .circle {
     position: absolute;
     top: 8px;
     right: 8px;
     height: 15px;
     width: 15px;
     border: 1.5px solid #fff;
     border-radius: 7.5px;
     background:  rgba(0, 0, 0, 0);
    }

    .selected .overlay .circle{
     border: 0px;
     background: #00BCD4;

    }

    .selected .overlay {
        opacity: 1;
 }



</style>