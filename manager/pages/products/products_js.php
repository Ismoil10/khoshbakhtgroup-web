<script>

  function editModal() {
    console.log("object");
  }
  $(document).ready(function() {
    $('.summernote').summernote({
      lang: "US-en"
    });

    add_modal = function (){
      $('#addModal').modal("show");
    }

    delete_modal = function (id){
      $('[name=product_id]').val(id);
      $('#deleteModal').modal("show");
    }

    edit_modal = function (id){
    formData = new FormData();	
    formData.append('item_id',id);    
    js_ajax_post('products/products_edit_form.php',formData).done(function (data) {		
    $('#editModal').html(data);	
    $('#editModal').modal('show');	
    });
    }

    view_modal = function (id) {
		
    formData = new FormData();	
    formData.append('item_id',id);	

	js_ajax_post('products/products_view_form.php',formData).done(function (data) {		
	$('#viewModal').html(data);	
	$('#viewModal').modal('show');	
	});
  }
  });

</script>

