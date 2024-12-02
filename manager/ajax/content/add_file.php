<?require $_SERVER["DOCUMENT_ROOT"].'/core/backend.php';?>
<?if ($_POST['file_name']!=NULL){
$q = db::file_upload($_POST['file_name'],'upload');
if ($q['sts']=='ok'){echo $q['url'];}}?>




