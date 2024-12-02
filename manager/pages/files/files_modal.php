<!-- ADD REQUEST Modal -->
<div class="modal fade" id="show_edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
   
</div>


<!-- ADD REQUEST Modal -->
<div class="modal fade" id="file_add_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">

  <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form action="" method="POST"   enctype="multipart/form-data">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">Add file</h4>
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
              <button type="submit" class="btn btn-primary" name="file_upload_form">Add</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>			
			
        </div>
		</form>       
		<!-- FORM END -->
		
    </div> 
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
                <h4 class="modal-title" id="taskModalLabel">Edit file</h4>
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
		<form action="" method="POST"   enctype="multipart/form-data">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">View file</h4>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				Delete element
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						Are you sure you want to delete the item?
						
						<input type="hidden" name="del_file_id" >
						<input type="hidden" name="del_file_url" >
						
			
						
						
					
					
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="file_del_form">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>



</div>


