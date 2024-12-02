<script>
  
  $(document).ready(function() {
    edit_modal = function(id){
      formData = new FormData();
      formData.append('item_id', id);
      js_ajax_post('brands/brands_edit_form.php',formData).done(function (data) {		
    $('#editModal').html(data);	
    $('#editModal').modal('show');	
    });
    }
  
  add_modal = function(){
    $("#addModal").modal("show");
  }
  
  });
  
  /*function editModal(dataJson) {
    data = JSON.parse(JSON.parse(dataJson));
    $("[name=edit_brand_name]").val(data.NAME);
    $("[name=edit_image]").val(data.IMAGES);
    $("[name=editId]").val(data.ID);
    $("#editModal").modal("show");
  }*/


  function deleteModal(id){
    $("[name=deleteId]").val(id);
    $("#deleteModal").modal("show");
  }
</script>