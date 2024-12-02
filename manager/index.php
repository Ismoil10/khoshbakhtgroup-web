<? require_once $_SERVER["DOCUMENT_ROOT"] . '/core/js_core.php'; ?>
<? require $_SERVER["DOCUMENT_ROOT"] . '/core/backend.php'; ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/core/template_admin/header.php"); ?>
<? //ini_set('error_reporting', 0);?>
<? ini_set('display_errors', 0); ?>

<? /* echo "<pre>"; print_r(db::arr_s("SELECT * FROM blog")); echo "</pre>";  */ ?>

<?


if ($_GET['page'] == 'main') {
    $_SESSION['page_cc'] = 'main';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'files') {
    $_SESSION['page_cc'] = 'files';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'brands') {
    $_SESSION['page_cc'] = 'brands';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'categories') {
    $_SESSION['page_cc'] = 'categories';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'catalog_files') {
    $_SESSION['page_cc'] = 'catalog_files';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'products') {
    $_SESSION['page_cc'] = 'products';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'site_projects') {
    $_SESSION['page_cc'] = 'site_projects';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'site_zayavki') {
    $_SESSION['page_cc'] = 'site_zayavki';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'site_orders') {
    $_SESSION['page_cc'] = 'site_orders';
    LocalRedirect('index.php');
}
if ($_GET['page'] == 'vacancies') {
    $_SESSION['page_cc'] = 'vacancies';
    LocalRedirect('index.php');
}

if ($_GET['page'] == 'menu') {
    $_SESSION['page_cc'] = 'menu';
    $_SESSION['con_id'] = $_GET['con_id'];
    LocalRedirect('index.php');
}

if ($_GET['page'] == 'iblock') {
    $_SESSION['page_cc'] = 'iblock';
    $_SESSION['iblock_id'] = $_GET['iblock_id'];
    $_SESSION['con_id'] = $_GET['con_id'];
    LocalRedirect('index.php');
}

if ($_GET['page'] == 'create_iblock') {
    $_SESSION['page_cc'] = 'create_iblock';
    $_SESSION['con_id'] = $_GET['con_id'];
    LocalRedirect('index.php');
}

if ($_GET['page'] == 'static_data') {
    $_SESSION['page_cc'] = 'static_data';
    $_SESSION['con_id'] = $_GET['con_id'];
    LocalRedirect('index.php');
}

if ($_GET['page'] == 'sections') {
    $_SESSION['page_cc'] = 'sections';
    $_SESSION['con_id'] = $_GET['con_id'];
    LocalRedirect('index.php');
}

/*
foreach (arr_define($_SESSION['user']['menu']['pages']) as $v){	
if(strpos($v,'detail')){
	if ($_POST['page']==$v){$_SESSION['page_cc']=$v;$_SESSION['item_id']=$_POST['id'];LocalRedirect('view.php');}}else{
	if($_GET['page']==$v){$_SESSION['page_cc']=$v;
	LocalRedirect('view.php');
	}}}
*/
?>


<!-- MODAL ADD CONTROLLER -->
<? if (isset($_POST['content_add_form'])) {
    $q = insert::CONTENT($_POST);
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['content_edit_form'])) {
    $q = update::CONTENT($_POST);
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['infoblock_edit_form'])) {
    $q = update::IBLOCK($_POST);
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['update_static_content_form'])) {
    $q = update::CONTENT_MULTI($_POST);
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['file_upload_form'])) {
    $q = db::file_upload('upload', 'upload');
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['file_edit_form'])) {
    $q = db::file_edit('upload_edit', 'upload', $_POST['file_id']);
    LocalRedirect('index.php');
} ?>

<? if (isset($_POST['file_del_form'])) {
    $q = db::file_del($_POST['del_file_id'], $_POST['del_file_url']);
//LocalRedirect('index.php');
} ?>

<? //echo "<pre>"; print_r($_POST); echo "</pre>";  ?>

<? if (isset($_POST['content_del_form'])) {
    $q = del::CONTENT($_POST);
    LocalRedirect('index.php');
}
?>
<? //echo "<pre>"; print_r($q); echo "</pre>";  ?>


<?
if (isset($_POST['infoblock_create_form'])) {
    $q = insert::USER_IBLOCK($_POST);
    if ($q['stat'] == 'success') {
        LocalRedirect('index.php?page=iblock&con_id=' . $_POST['main_block_id'] . '&iblock_id=' . $q['ID']);
    }
}
?>


<!-- 404 Settings -->
<?
/*
if (($_GET['page']!=NULL OR $_POST['page']!=NULL) AND !in_array([$_GET['page'],$_POST['page']],$_SESSION['user']['menu']['pages'])){$_SESSION['page_cc']='404';LocalRedirect('view.php');}
*/
?>

<!-- AUTH RULES -->
<? //echo "<pre>"; print_r($_SESSION['page_cc']); echo "</pre>";  ?>
<? //echo "<pre>"; print_r($_SESSION['user']['id']); echo "</pre>";  ?>

<? if ($_GET['logout'] == 'yes') {
    session_destroy();
    Localredirect('index.php');
} ?>
<? if ($_SESSION['user']['id'] == NULL) {
    $_SESSION['page_cc'] = 'login';
} ?>


<!-- LAYOUT MANAGER -->
<? if ($_SESSION['page_cc'] == '404') {
    require_once 'pages/404/view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'login') {
    require_once 'pages/login/login_view.php';
} ?>

<? if ($_SESSION['page_cc'] == 'main') {
    require_once 'pages/main/main_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'menu') {
    require_once 'pages/menu/menu_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'iblock') {
    require_once 'pages/iblock/iblock_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'create_iblock') {
    require_once 'pages/create_iblock/create_iblock_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'static_data') {
    require_once 'pages/static_data/static_data_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'sections') {
    require_once 'pages/sections/sections_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'files') {
    require_once 'pages/files/files_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'brands') {
    require_once 'pages/brands/brands_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'categories') {
    require_once 'pages/categories/categories_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'catalog_files') {
    require_once 'pages/catalog_files/catalog_files_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'products') {
    require_once 'pages/products/products_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'site_projects') {
    require_once 'pages/site_projects/site_projects_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'site_zayavki') {
    require_once 'pages/site_zayavki/site_zayavki_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'site_orders') {
    require_once 'pages/site_orders/site_orders_view.php';
} ?>
<? if ($_SESSION['page_cc'] == 'vacancies') {
    require_once 'pages/vacancies/vacancies_view.php';
} ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/core/template_admin/footer.php"); ?>



<?
/*
foreach (arr_define($_SESSION['user']['menu']['pages']) as $v){if ($_SESSION['page_cc']==$v){require_once 'pages/'.$v.'/view.php';}}
*/
?>