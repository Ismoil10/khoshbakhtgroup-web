<script>

$(document).ready(function (){
	


file_edit  = function (id,url) {
$('[name=file_id]').val(id);	
$("#output_edit").attr("src",url);	
$('#file_edit_modal').modal("show");}

file_del  = function (id,url) {
$('[name=del_file_id]').val(id);	
$('[name=del_file_url]').val(url);	

$('#file_del_modal').modal("show");}



file_view  = function (url) {
	
$("#output_view").attr("src",url);	
$('#file_view_modal').modal("show");}

	
});

news_edit_form  = function (data) {
$('#news_edit_form_modal').html(data);
$('#news_edit_form_modal').modal('show');
}


	



					
</script>