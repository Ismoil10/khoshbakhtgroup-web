<script>

$(document).ready(function() {

add_modal = function (){
  $('#addModal').modal("show");
}

edit_modal = function (id){
formData = new FormData();	
formData.append('item_id',id);	
js_ajax_post('catalog/catalog_files_edit_from.php', formData).done(function (data){		
$('#editModal').html(data);	
$('#editModal').modal('show');	
});
}

delete_modal = function (id){
    $("[name=deleteId]").val(id);
    $("#deleteModal").modal("show");
  }
});
</script>