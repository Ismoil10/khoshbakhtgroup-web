<!-- ADD REQUEST Modal -->
<div class="modal fade" id="show_edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
   
</div>


<!-- ADD REQUEST Modal -->
<div class="modal fade" id="content_show_add_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">
  
</div>

<!-- Редактировать элемент -->
<div class="modal fade" id="content_show_edit_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">  
</div>

<!-- Просмотр элемент -->
<div class="modal fade" id="content_show_view_form_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">  
</div>


<!-- Удалить элемент -->
<div class="modal fade" id="del_content_element_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel">  

 <div class="modal-dialog" role="document">
	    
		<!-- FORM-->
		<form method="POST" action="">
	    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="taskModalLabel">
				Delete Element
				</h4>
            </div>			
			
            <div class="modal-body" >              
            
	            <div class="row">
						<div class="col-md-12">
						
						Are you sure you want to delete the item?
						
						<input type="hidden" name="content_id" >
						
			
						
						
					
					
							
							
					

						
							
							
						</div>
					</div>			
							
                                                    
              	       
            </div>
			
			<div class="modal-footer">              	          	
              <button type="submit" class="btn btn-primary" name="content_del_form">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>			
			
        </div>
        </form>
		<!-- FORM END -->
		
    </div>



</div>
