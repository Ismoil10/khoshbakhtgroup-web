<script>

$(document).ready(function (){
	
deleteModal = id =>{
  $("[name=deleteOrderId]").val(id);
  $("#deleteModal").modal("show");
}

editModal = json =>{
  data = JSON.parse(JSON.parse(json));
  // $("#status option").removeAttr("selected");
  $("[name=username]").val(data.name);
  $("[name=editOrderId]").val(data.id);
  $("[name=email]").val(data.email);
  $("[name=phone]").val(data.phone);
  if(data.status == "draft"){
    options = `<option value="draft" selected>В процессе</option>
    <option value="paid">Оплаченный</option>
    <option value="cash">Оплата наличными</option>`;
  }else if(data.status == "paid"){
    options = `<option value="draft">В процессе</option>
    <option value="paid" selected>Оплаченный</option>
    <option value="cash">Оплата наличными</option>`;
  }else if(data.status == "cash"){
    options = `<option value="draft">В процессе</option>
    <option value="paid">Оплаченный</option>
    <option value="cash" selected>Оплата наличными</option>`;
  }else{
    options = `<option value="draft">В процессе</option>
    <option value="paid">Оплаченный</option>
    <option value="cash">Оплата наличными</option>`;
  }
  $("#status").html(options);
  $("#editModal").modal("show");
}
	
});				
</script>