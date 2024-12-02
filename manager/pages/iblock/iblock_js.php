<script>

$(document).ready(function (){
	
	
show_edit_form = function (data) {
$('#show_edit_form_modal').html(data);
$('#show_edit_form_modal').modal('show');}


content_show_add_form  = function (data) {
$('#content_show_edit_form_modal').html("");
$('#content_show_view_form_modal').html("");
$('#content_show_add_form_modal').html(data);
$('#content_show_add_form_modal').modal('show');}

content_show_view_form  = function (data) {
$('#content_show_add_form_modal').html("");	
$('#content_show_edit_form_modal').html("");	
$('#content_show_view_form_modal').html(data);
$('#content_show_view_form_modal').modal('show');}

content_show_edit_form  = function (data) {
$('#content_show_add_form_modal').html("");	
$('#content_show_view_form_modal').html("");	
$('#content_show_edit_form_modal').html(data);
$('#content_show_edit_form_modal').modal('show');

}

del_content_element = function (id){

$('[name=content_id]').val(id);
$('#del_content_element_modal').modal("show");}

	
});


					
</script>