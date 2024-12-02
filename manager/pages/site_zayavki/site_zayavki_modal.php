<? //echo "<pre>"; print_r($_POST); echo "</pre>";  
?>

<!-- ADD REQUEST Modal -->
<div class="modal fade" id="news_edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

</div>


<!-- ADD REQUEST Modal -->
<div class="modal fade" id="file_add_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">



  <?
  $fields = [
    ['name' => 'id', 'type' => 'text', 'sort' => '100'],
    ['name' => 'name', 'type' => 'text', 'sort' => '200'],
    ['name' => 'email', 'type' => 'text', 'sort' => '300'],
    ['name' => 'phone', 'type' => 'text', 'sort' => '400'],
    ['name' => 'text', 'type' => 'textarea', 'sort' => '500']

  ]

  ?>

  <div class="modal-dialog" role="document">

    <!-- FORM-->
    <form method="POST" action="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">
            Add element
          </h4>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">

              <input type="hidden" name="block_id" value="<?= $iblock['ID'] ?>">

              <div class="form-group">
                <label class="control-label">Actively</label>
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
                <select name="lang" class="form-control" required>
                  <option value="uz">uz</option>
                  <option value="ru">ru</option>
                  <option value="en">en</option>
                </select>

              </div>


              <? foreach ($fields as $v) : ?>

                <? if ($v['type'] == 'textarea') : ?>
                  <label class="control-label"><?= $v['name'] ?></label>
                  <div id="<?= $v['name'] ?>">
                  </div>
                  <input type="hidden" name="<?= $v['name'] ?>">
                  <script>
                    $(document).ready(function() {
                      $('#<?= $v['name'] ?>').summernote({
                        height: 200,
                        minHeight: null,
                        maxHeight: null,
                        focus: true
                      });

                      $("form").submit(function() {
                        val = $('#<?= $v['name'] ?>').summernote('code');
                        $('[name=<?= $v['name'] ?>]').val(val);

                      });

                    });
                  </script>



                <? elseif ($v['type'] == 'file') : ?>


                  <? // echo "<pre>"; print_r($v); echo "</pre>";  
                  ?>

                  <label class="control-label"><?= $v['name'] ?> (file)</label><br>

                  <input type="hidden" name="<?= $v['name'] ?>">

                  <button type="button" class="btn btn-primary" onclick="file_content('new','<?= $v['name'] ?>')">
                    <i class="fa fa-plus"></i> Add new</button>

                  <button type="button" class="btn btn-info" onclick="file_content('list','<?= $v['name'] ?>')">
                    <i class="fa fa-list"></i> Select from list</button>

                  <button style="display:none;" id="save_button_<?= $v['name'] ?>" type="button" class="btn btn-success" onclick="save_file('<?= $v['name'] ?>')">
                    <i class="fa fa-save"></i> Save file</button>


                  <div id="file_content_<?= $v['name'] ?>">

                  </div>

                  <div id="image_file_<?= $v['name'] ?>" style="display:none;"><br>
                    <div class="row"><br>
                      <img id="show_image_<?= $v['name'] ?>" width="50%" align="center" />
                    </div>
                  </div>



                  <div id="new_upload_file_<?= $v['name'] ?>" style="display:none;"><br>

                    <input type="file" name="upload_<?= $v['name'] ?>" id="upload_<?= $v['name'] ?>" accept="image/*" onchange="loadFile(event,'<?= $v['name'] ?>')"><br>







                    <div class="row"><br>
                      <img id="output_<?= $v['name'] ?>" width="50%" align="center" />
                    </div>



                  </div>


                  <div id="file_library_<?= $v['name'] ?>" style="display:none;"><br>
                    <div class="row">

                      <? $files = db::arr("SELECT * FROM files");
                      if ($files == 'empty') {
                        $files = array();
                      } ?>
                      <? foreach ($files as $v2) : ?>
                        <div class="col-md-4">
                          <div id="image_<?= $v2['ID'] ?>" class="img-container">
                            <img class="image" src="<?= $v2['URL'] ?>">
                            <div class="overlay" onclick="choice_image('<?= $v2['URL'] ?>','<?= $v['name'] ?>')">
                              <div class="is-checked hide">Chosen</div>
                              <div class="circle"></div>
                            </div>
                          </div>
                          <span class="help-block"></span>
                        </div>
                      <? endforeach ?>


                    </div>
                  </div>



                <? else : ?>

                  <div class="form-group">
                    <label class="control-label"><?= $v['name'] ?></label>
                    <input type="<?= $v['type'] ?>" name="<?= $v['name'] ?>" class="form-control" required>
                  </div>
                <? endif ?>
              <? endforeach ?>







            </div>
          </div>



        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="news_add_form">Add</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>

      </div>
    </form>
    <!-- FORM END -->

  </div>


  <script>
    $(document).ready(function() {
      //js_dt_reload('d_tab_1',3);	

      file_content = function(sts, name) {

        $('#save_button_' + name).attr("style", "display:none;");

        if (sts == 'new') {
          content = $('#new_upload_file_' + name).html();
        }
        if (sts == 'list') {
          content = $('#file_library_' + name).html();
        }
        if (sts == 'image_file') {
          content = $('#image_file_' + name).html();
        }
        $('#file_content_' + name).html(content);
      }

      choice_image = function(url, name) {
        $('[name=' + name + ']').val(url);
        $("#show_image_" + name).attr("src", url);
        file_content('image_file', name);

      }

      save_file = function(name) {
        var file_data = $('#upload_' + name).prop('files')[0];
        console.log(file_data);
        var form_data = new FormData();
        form_data.append('upload_' + name, file_data);
        form_data.append('file_name', 'upload_' + name);
        js_ajax_post("content/add_file.php", form_data).success(
          function(data) {
            url = $.trim(data);
            if (url != '') {
              choice_image(url, name);
            }

          });

      }



    });
  </script>




  <script>
    var loadFile = function(event, name) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('output_' + name);
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
      $('[name=' + name + ']').val("");
      $('#save_button_' + name).attr("style", "");
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
      background: rgba(0, 0, 0, 0.5);
      /* Black see-through */
      color: #f1f1f1;
      width: 100%;
      transition: .5s ease;
      opacity: 0;
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
      margin: 5px;
    }

    .circle {
      position: absolute;
      top: 8px;
      right: 8px;
      height: 15px;
      width: 15px;
      border: 1.5px solid #fff;
      border-radius: 7.5px;
      background: rgba(0, 0, 0, 0);
    }

    .selected .overlay .circle {
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

*/ ?>
</div>



<!-- Редактировать файл -->
<div class="modal fade" id="file_edit_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

  <div class="modal-dialog" role="document">

    <!-- FORM-->
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">Edit file</h4>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">

              <input type="hidden" name="file_id">


              <input type="file" name="upload_edit" accept="image/*" onchange="loadFile_edit(event)">
              <div class="row"><br>
                <img id="output_edit" width="50%" align="center" />
              </div>
              <script>
                var loadFile_edit = function(event) {
                  var reader = new FileReader();
                  reader.onload = function() {
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
          <button type="submit" class="btn btn-primary" name="file_edit_form">Edit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">View file</h4>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">


              <br>
              <img id="output_view" width="50%" align="center" />





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
</div>


<!-- Удалить элемент -->
<div class="modal fade" id="file_del_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

  <div class="modal-dialog" role="document">

    <!-- FORM-->
    <form method="POST" action="">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="taskModalLabel">
            Delete element
          </h4>
        </div>

        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">

            Are you sure you want to delete the item?

              <input type="hidden" name="del_file_id">
              <input type="hidden" name="del_file_url">













            </div>
          </div>



        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="news_del_form">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>

      </div>
    </form>
    <!-- FORM END -->

  </div>



</div>



<?

if (isset($_POST['news_add_form'])) {
  foreach ($_POST as $k => $v) {
    $_POST[$k] = str_replace("'", "\'", $v);
  }

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

  LocalRedirect('index.php');
}

if (isset($_POST['news_del_form'])) {
  $id = $_POST['del_file_id'];
  $q['del'] = db::query("DELETE FROM zayavki WHERE ID='$id'");
  LocalRedirect('index.php');
}

if (isset($_POST['news_edit_form'])) {
  foreach ($_POST as $k => $v) {
    $_POST[$k] = str_replace("'", "\'", $v);
  }

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


  $q['upd'] = db::query("UPDATE news SET 
  DATE_CREATED='$_POST[data]',LANG='$_POST[lang]',TITLE='$_POST[title]',ANONS_PHOTO='$_POST[foto_anons]',CONTENT='$_POST[content]',STATUS='$_POST[active_status]' WHERE ID='$_POST[news_id]'");



  //LocalRedirect('index.php'); 
}



?>

<? // echo "<pre>"; print_r($q); echo "</pre>";  
?>
<? // echo "<pre>"; print_r($_POST); echo "</pre>";  
?>