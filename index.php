<?php
require './core/backend.php';
//ini_set('display_errors',1);
if (isset($_GET["lang"]) and in_array($_GET['lang'], ["en","uz","ru","ar", "fr","per"])) {
	$_SESSION['site_lang'] = $_GET['lang'];
}

if (isset($_GET["lang"]) and !in_array($_GET['lang'], ["en","uz","ru","ar", "fr","per"])) {
	$_GET['lang'] = $_SESSION['site_lang'];
}

if (isset($_GET["page"]) and !in_array($_GET['page'], ["main","about","quality-control","contact","catalog","product"])) {
	$_GET['page'] = $_SESSION['page_site'];
}

if ($_SESSION['page_site'] == NULL OR $_GET['page'] == NULL) {
	$_SESSION['page_site'] = 'main';
}
if ($_SESSION['site_lang'] == NULL OR $_GET['page'] == NULL) {
	$_SESSION['site_lang'] = 'en';
}

if ($_GET['page'] == NULL) {
	$_GET['page'] = 'main';
}

if ($_GET['lang'] == NULL) {
	$_GET['lang'] = 'en';
}

require($_SERVER["DOCUMENT_ROOT"] . "/core/template/headers/header_".$_GET['lang'].".php");

require $_SERVER["DOCUMENT_ROOT"].'/pages/' . $_GET['page'] . '/' . $_GET['page'] . '_view.php';

require($_SERVER["DOCUMENT_ROOT"] . "/core/template/footers/footer_".$_GET['lang'].".php");
?>