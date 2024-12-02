<? //echo "<pre>"; print_r($_POST); echo "</pre>";  ?>

<!-- ADD REQUEST Modal -->
<div class="modal fade" id="projects_edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
   
</div>


<!-- ADD REQUEST Modal -->
<div class="modal fade" id="file_add_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">



<?
$fields = [
[ 'name' => 'sort','type' => 'int','sort' => '50' ],
[ 'name' => 'title_short','type' => 'text','sort' => '100' ],
[ 'name' => 'text_short','type' => 'text','sort' => '200' ],
[ 'name' => 'logo','type' => 'file','sort' => '300' ],
[ 'name' => 'title_type','type' => 'text','sort' => '400' ],
[ 'name' => 'title_company','type' => 'text','sort' => '450' ],
[ 'name' => 'title_long','type' => 'text','sort' => '500' ],
[ 'name' => 'text','type' => 'text','sort' => '600' ],
[ 'name' => 'list1','type' => 'text','sort' => '700' ],
[ 'name' => 'list2','type' => 'text','sort' => '800' ],
[ 'name' => 'list3','type' => 'text','sort' => '900' ],
[ 'name' => 'link_text','type' => 'text','sort' => '1000' ],
[ 'name' => 'link','type' => 'text','sort' => '1100' ],
[ 'name' => 'screenshot1','type' => 'file','sort' => '1200' ],
[ 'name' => 'screenshot2','type' => 'file','sort' => '1300' ],
[ 'name' => 'screenshot3','type' => 'file','sort' => '1400' ]
];

?>

  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				Добавить элемент
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						<input type="hidden" name="block_id" value="<?=$iblock['ID']?>">
						
						<div class="form-group">
							<label class="control-label">Активно</label>
							<input type="checkbox" name="active_status" value="1" checked>				
						</div>
						
						
						<!--						
					    <div class="form-group">
					    	<label class="control-label">sort</label>
					    	<input type="number" name="sort_status"  class="form-control" required>
					    </div>
						--->	
						
										
					    <div class="form-group">
					    	<label class="control-label">lang</label>
					    	<select  name="lang"  class="form-control" required>
							<option value="uz">uz</option>
							<option value="ru">ru</option>
							<option value="en">en</option>
							</select>
							
					    </div>
						
						
						<?foreach ($fields as $v):?>
						
						<?if ($v['type']=='textarea'):?>
						<label class="control-label"><?=$v['name']?></label>
						<div id="<?=$v['name']?>">
                        </div>
						<input type="hidden" name="<?=$v['name']?>">	
						<script>	
						$(document).ready(function() {						
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

});						 
						</script>
						
						
						
						<?elseif ($v['type']=='file'):?>
						
						
						<?// echo "<pre>"; print_r($v); echo "</pre>";  ?>
						
						<label class="control-label"><?=$v['name']?> (файл)</label><br>
						
						<input type="hidden" name="<?=$v['name']?>">
						
						<button type="button" class="btn btn-primary" onclick="file_content('new','<?=$v['name']?>')">
						<i class="fa fa-plus"></i>  Добавить новый</button>
						
						<button type="button" class="btn btn-info" onclick="file_content('list','<?=$v['name']?>')">
						<i class="fa fa-list"></i>  Выбрать из списка</button>
					
						<button style="display:none;" id="save_button_<?=$v['name']?>" type="button" class="btn btn-success" onclick="save_file('<?=$v['name']?>')">
						<i class="fa fa-save"></i>  Сохранить файл</button>
						
						
						<div id="file_content_<?=$v['name']?>">					
												
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
										
						<?$files = db::arr("SELECT * FROM files");
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

                           
                        </div>						
						</div>
											
						
						
						<?else:?>
						
							<div class="form-group">
								<label class="control-label"><?=$v['name']?></label>
								<input type="<?=$v['type']?>" name="<?=$v['name']?>" class="form-control" required>
							</div>
						<?endif?>	
						<?endforeach?>
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="projects_add_form">Добавить</button>
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













<?/*
  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form action="" method="POST"   enctype="multipart/form-data">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">Добавить файл</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">	
					
							
<input type="file" name="upload" accept="image/*" onchange="loadFile(event)">
<div class="row"><br>
<img id="output" width="50%" align="center"/>
</div>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>				
							
							
							
							
						</div>
					</div>	      	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="file_upload_form">Добавить</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
            </div>			
			
        </div>
		</form>       
		<!-- FORM END -->
		
    </div>

*/?>	
</div>



<!-- Редактировать файл -->
<div class="modal fade" id="file_edit_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form action="" method="POST"   enctype="multipart/form-data">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">Редактировать файл</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						<input type="hidden" name="file_id" >
					
							
<input type="file" name="upload_edit" accept="image/*" onchange="loadFile_edit(event)">
<div class="row"><br>
<img id="output_edit" width="50%" align="center"/>
</div>
<script>
  var loadFile_edit = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output_edit');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>				
							
							
							
							
						</div>
					</div>	      	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="file_edit_form">Редактировать</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Отменить</button>
            </div>			
			
        </div>
		</form>       
		<!-- FORM END -->
		
    </div> 
</div>


<!-- Просмотр файл -->
<div class="modal fade" id="file_view_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form action="" method="POST"   enctype="multipart/form-data">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">Просмотр файл</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
					
							
<br>
<img id="output_view" width="50%" align="center"/>

			
							
							
							
						</div>
					</div>	      	       
            </div>
			
			<div class="modal-footer">                     
              <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            </div>			
			
        </div>
		</form>       
		<!-- FORM END -->
		
    </div> 
</div>


<!-- Удалить элемент -->
<div class="modal fade" id="file_del_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">  

 <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				Удалить элемент
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						Вы действительно хотите удалить элемент ?
						
						<input type="hidden" name="del_file_id" >
						<input type="hidden" name="del_file_url" >
						
			
						
						
					
					
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="projects_del_form">Да</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Нет</button>
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>



</div>



<?

if (isset($_POST['projects_add_form'])){
foreach ($_POST as $k=>$v){$_POST[$k]= str_replace("'","\'",$v);}

/*
$q['ins'] = db::query("INSERT INTO `projects` (
`DATE_CREATED`,
 `LANG`, 
 `TITLE`, 
 `ANONS_PHOTO`, 
 `CONTENT`, 
 `STATUS`)
VALUES (
'$_POST[data]', 
'$_POST[lang]', 
'$_POST[title]',
 '$_POST[foto_anons]',
 '$_POST[content]',
 '1')");
 */
 
 
 $q['ins'] = db::query("INSERT INTO `projects` (
 `SORT`,
 `DATE_CREATED`, 
 `LANG`,
 `TITLE_SHORT`,
 `TEXT_SHORT`,
 `LOGO`, 
 `TITLE_TYPE`,
 `TITLE_COMPANY`,  
 `TITLE_LONG`, 
 `TEXT`, 
 `LIST1`, 
 `LIST2`, 
 `LIST3`, 
 `LINK_TEXT`,
 `LINK`, 
 `SCREENSHOT1`,
 `SCREENSHOT2`,
 `SCREENSHOT3`)
VALUES (
'$_POST[sort]',
	now(), 
'$_POST[lang]', 
'$_POST[title_short]', 
'$_POST[text_short]', 
'$_POST[logo]', 
'$_POST[title_type]', 
'$_POST[title_company]', 
'$_POST[title_long]', 
'$_POST[text]', 
'$_POST[list1]', 
'$_POST[list2]', 
'$_POST[list3]', 
'$_POST[link_text]', 
'$_POST[link]', 
'$_POST[screenshot1]', 
'$_POST[screenshot2]', 
'$_POST[screenshot3]')");	
 
LocalRedirect('index.php'); 
}

if (isset($_POST['projects_del_form'])){
$id = $_POST['del_file_id'];
$q['del'] = db::query("DELETE FROM projects WHERE ID='$id'");	
LocalRedirect('index.php');}

if (isset($_POST['projects_edit_form'])){
foreach ($_POST as $k=>$v){$_POST[$k]= str_replace("'","\'",$v);}

/*
$q['ins'] = db::query("INSERT INTO `news` (
`DATE_CREATED`,
 `LANG`, 
 `TITLE`, 
 `ANONS_PHOTO`, 
 `CONTENT`, 
 `STATUS`)
VALUES (
'$_POST[data]', 
'$_POST[lang]', 
'$_POST[title]',
 '$_POST[foto_anons]',
 '$_POST[content]',
 '1')");
 */
 
$q['upd'] = db::query(" 
UPDATE `projects` SET
`SORT` = '$_POST[sort]',
`DATE_CREATED` = now(),
`LANG` = '$_POST[lang]',
`TITLE_SHORT` = '$_POST[title_short]',
`TEXT_SHORT` = '$_POST[text_short]',
`LOGO` = '$_POST[logo]',
`TITLE_TYPE` = '$_POST[title_type]',
`TITLE_COMPANY` = '$_POST[title_company]',
`TITLE_LONG` = '$_POST[title_long]',
`TEXT` = '$_POST[text]',
`LIST1` = '$_POST[list1]',
`LIST2` = '$_POST[list2]',
`LIST3` = '$_POST[list3]',
`LINK_TEXT` = '$_POST[link_text]',
`LINK` = '$_POST[link]',
`SCREENSHOT1` = '$_POST[screenshot1]',
`SCREENSHOT2` = '$_POST[screenshot2]',
`SCREENSHOT3` = '$_POST[screenshot3]'
WHERE `ID` = '$_POST[projects_id]'");

/*
$q['upd'] = db::query("UPDATE news SET DATE_CREATED='$_POST[data]',LANG='$_POST[lang]',TITLE='$_POST[title]',ANONS_PHOTO='$_POST[foto_anons]',
CONTENT='$_POST[content]',STATUS='$_POST[active_status]' WHERE ID='$_POST[news_id]'");
*/

 
LocalRedirect('index.php'); 
}



?>

<?// echo "<pre>"; print_r($q); echo "</pre>";  ?>
<?// echo "<pre>"; print_r($_POST); echo "</pre>";  ?>