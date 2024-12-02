<? date_default_timezone_set("Asia/Tashkent");
//error_reporting(E_ALL & ~E_NOTICE);
ob_start();
session_start();
// ini_set('error_reporting', 1);
ini_set('display_errors', 0);

// $_SESSION['lang'] = 'ru';
require_once 'view_class.php';
require_once 'action_class.php';
require_once 'insert_class.php';
require_once 'update_class.php';
require_once 'delete_class.php';
// require_once 'js_core.php';
// require_once 'mail.php';

$template_path = '/core/template/';
$template_path_peges = '/pages/';

$path = '/core/lib';
$path_f = '/core/lib/footer';
$path_h = '/core/lib/header';

$path = '/core/lib';
$path_f = '/core/lib/footer';
$path_h = '/core/lib/header';

$nl_template_path = '/core/template_nl/';
$es_template_path = '/core/template_evosoft/';
$ms_template_path = '/core/template_ms/';
$zn_template_path = '/core/template_zn/';



class bot
{
static function token()
{
	$token = '<token>';
	return $token;
}

static function sendMessageText(){

if (isset($_POST['send_message'])) {

$date = date("Y-m-d H:i:s");
$name = addslashes($_POST['applicationName']);
$email = addslashes($_POST['applicationEmail']);
$phone = addslashes($_POST['applicationPhone']);
$message = addslashes($_POST['applicationMessage']);

db::query("INSERT INTO `requests` 
(
`DATE`, 
`NAME`, 
`EMAIL`,  
`MESSAGE`,
`PHONE`, 
`ACTIVE`
) VALUES (
'$date', 
'$name', 
'$email', 
'$message',
'$phone', '1')");

$text = $text.urlencode("\n Website:  khoshbakhtgroup.com \n Language: " . $_GET["lang"] . "\n Page:	" . $_GET['page'] . "\n Name:	" . $_POST['applicationName'] . "\n Email:	" . $_POST['applicationEmail'] . "\n Phone:	" . $_POST['applicationPhone'] . "\n Message:	" . $_POST['applicationMessage']);
file_get_contents("https://api.telegram.org/".bot::token()."/sendMessage?chat_id=-1001609347614&text=".$text);

if($_GET['page'] != 'contact'){

LocalRedirect("/" . $_GET['lang'] . "/main");

}else{

LocalRedirect("contact");	

}
}
}
}

class db
{

	static function conn()
	{
		$conn = new mysqli('localhost', '<username>', '<password>', '<database>');
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die('Connection faield:' . $conn->connect_error);
		} else {
			$rs = $conn;
		}
		return $rs;
	}

	static function query($sql)
	{
		$conn = db::conn();
		if ($conn->query($sql) === TRUE) {
			$rs['stat'] = 'success';
			$rs['ID'] = $conn->insert_id;
		} else {
			$rs = $conn->error;
		}
		return $rs;
	}

	static function arr($sql)
	{
		$conn = db::conn();
		$q = $conn->query($sql);
		if ($q === FALSE) {
			$rs = $conn->error;
		}
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$rs[] = $row;
			}
		}
		if ($q->num_rows == 0) {
			$rs = 'empty';
		}
		return $rs;
	}

	static function arr_s($sql)
	{
		$conn = db::conn();
		$q = $conn->query($sql);
		if ($q === FALSE) {
			$rs = $conn->error;
		}
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$rs = $row;
			}
		}
		if ($q->num_rows == 0) {
			$rs = 'empty';
		}
		return $rs;
	}

	static function auth_log_manager()
	{
		$login = '<login>';
		$pass = '<password>';
		if ($_POST['login'] == $login and $_POST['pass'] == $pass) {
			$rs = 'success';
			$data = ['ID' => 'admin', 'NAME' => 'super', 'SURNAME' => 'admin', 'POSITION' => 'superadmin', 'PHOTO_LINK' => ''];
			$_SESSION['user']['id'] = $data['ID'];
			$_SESSION['user']['name'] = $data['NAME'];
			$_SESSION['user']['surname'] = $data['SURNAME'];
			$_SESSION['user']['pos'] = $data['POSITION'];
			$_SESSION['user']['photo'] = $data['PHOTO_LINK'];
			LocalRedirect('index.php?page=main');
		}
		return $rs;
	}

	static function file_upload($file_input_name, $folder_name)
	{
		$newFilename = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder_name . '/';
		$uploadInfo = $_FILES[$file_input_name];
		$path_info = pathinfo($uploadInfo['name']);
		$ext = $path_info['extension'];
		//Перемещаем файл из временной папки в указанную
		$size = db::filesize_formatted($uploadInfo['size']);

		$q = db::query(
			"INSERT INTO files (
			NAME, 
			FORMAT,
			SIZE) VALUES (
			'$uploadInfo[name]',
			'$ext',
			'$size');"
		);
		$file_name = md5($q['ID']) . '.' . $ext;
		$url = '/' . $folder_name . '/' . $file_name;
		$upd = db::query("UPDATE files SET URL='$url' WHERE ID='$q[ID]'");

		if ($q['stat'] == 'success') {
			$newFilename = $newFilename . $file_name;
			if (!move_uploaded_file($uploadInfo['tmp_name'], $newFilename)) {
				db::query("DELETE FROM files WHERE ID='$q[ID]'");
				$rs =  'Не удалось осуществить сохранение файла';
			} else {
				$rs['url'] = $url;
				$rs['sts'] = 'ok';
			}
		}

		return $rs;
	}


	static function file_edit($file_input_name, $folder_name, $file_id)
	{
		$file_data = db::arr_s("SELECT * FROM files WHERE ID='$file_id'");
		// DELETE FILE
		unlink($_SERVER['DOCUMENT_ROOT'] . $file_data['URL']);

		$newFilename = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder_name . '/';
		$uploadInfo = $_FILES[$file_input_name];
		$path_info = pathinfo($uploadInfo['name']);

		$ext = $path_info['extension']; // jpg, png
		//Перемещаем файл из временной папки в указанную

		$size = db::filesize_formatted($uploadInfo['size']);
		$file_name = md5($file_id) . '.' . $ext;
		$url = '/' . $folder_name . '/' . $file_name;

		$newFilename = $newFilename . $file_name;

		if (!move_uploaded_file($uploadInfo['tmp_name'], $newFilename)) {
			$rs =  [$uploadInfo['tmp_name'], $newFilename];
		} else {
			$rs['upd'] = db::query("UPDATE files SET `URL`='$url', `NAME` = '$uploadInfo[name]', `FORMAT` = '$ext', `SIZE` = '$size' WHERE ID='$file_id'");
			$rs['url'] = $url;
			$rs['sts'] = 'ok';
		}
		return $rs;
	}

	static function file_del($file_id, $file_url)
	{
		$file_data = db::arr_s("SELECT * FROM FILES WHERE ID='$file_id'");
		unlink($_SERVER['DOCUMENT_ROOT'] . $file_data['URL']);
		db::query("DELETE FROM files WHERE ID='$file_id'");
		return $rs;
	}


	static function filesize_formatted($size)
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$power = $size > 0 ? floor(log($size, 1024)) : 0;
		return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
	}
}
?>
<? //echo "<pre>"; print_r($_SESSION); echo "</pre>";  
?>


<?
function copy_infoblock($inf_name, $inf_id, $main_block_id)
{
	$inf = db::arr_s("SELECT * FROM iblock WHERE ID='$inf_id'");
	$q['ins'] = db::query("INSERT INTO iblock(
`MAIN_BLOCK_ID`,
`TYPE`,`NAME`,
`FIELDS_JSON`) VALUES (
'$main_block_id','$inf[TYPE]','$inf_name','$inf[FIELDS_JSON]')");
	if ($q['ins']['stat'] == 'success') {
		$iblock_id = $q['ins']['ID'];
		$content = db::arr("SELECT * FROM content WHERE IBLOCK_ID='$inf_id'");
		if ($content != 'empty') {
			foreach ($content as $v) {
				$rs['ins'][] = db::query("INSERT INTO  content (
`ACTIVE`,`SORT`,`IBLOCK_ID`,`DATA_JSON`) VALUES ('$v[ACTIVE]','$v[SORT]','$iblock_id','$v[DATA_JSON]')");
			}
		}
	}
	return $rs;
}
?>




<? function arr_define($var)
{
	if (isset($var)) {
		$rs = $var;
	} else {
		$rs = [];
	}
	return $rs;
} ?>
<? function var_define($var)
{
	if (isset($var)) {
		$rs = $var;
	} else {
		$rs = [];
	}
	return $rs;
} ?>
<? function is_empty($arr)
{
	if ($arr = 'empty') {
		$rs = $arr;
	} else {
		$rs = [];
	}
	return $rs;
} ?>

<? function LocalRedirect($url)
{
	header("Location: " . $url);
	exit;
} ?>

<? function is_nullable($v)
{
	if ($v != NULL || $v != "") {
		$rs = $v;
	} else {
		$rs = NULL;
	}
	return $rs;
} ?>

<? function ch($v)
{
	$rs = htmlspecialchars($v, ENT_QUOTES);
	return $rs;
} ?>

<? function chd($v)
{
	$rs = htmlspecialchars_decode($v, ENT_QUOTES);
	return $rs;
} ?>

<? function quatation($v)
{
	$rs = str_replace('"', "&dble;", str_replace("'", "&sngl;", $v));
	return $rs;
} ?>

<? function date_var($v, $f)
{
	if ($v != NULL) {
		if ($f == NULL) {
			$d = new DateTime($v);
			$v = $d->format('Y-m-d');
			$rs = $v . ' ' . date('H:i:s');
		} else {
			$d = new DateTime($v);
			$rs = $d->format($f);
		}
	} else {
		$rs = NULL;
	}
	return $rs;
} ?>

<? function str_r($s)
{
	$s = str_replace('"', '&#34;', $s);
	$s = str_replace("'", "/'", $s);
	return $s;
} ?>

<? function debug($var, $p_k)
{
	echo "<b>RESULT:</b><pre>";
	print_r($var);
	echo "</pre>";
	if ($_POST != NULL) {
		post($p_k);
	}
} ?> 

<? function post($k)
{
	if ($k == NULL) {
		echo "<b>$" . "_POST</b>:<pre>";
		print_r($_POST);
		echo "</pre>";
	} else {
		echo "<pre>";
		print_r($_POST[$k]);
		echo "</pre>";
	}
} ?> 

<? function session($k)
{
	if ($k == NULL) {
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	} else {
		echo "<pre>";
		print_r($_SESSION[$k]);
		echo "</pre>";
	}
} ?> 
<? function mdir($link)
{
	return "/" . $_GET["lang"] . "/" . $link;
} ?>

