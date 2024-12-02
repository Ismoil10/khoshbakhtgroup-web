<!-- STAT XS TEMPLATE -->
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Milliy CMS </title>

    <!-- Bootstrap -->
    <link href="<?=$path_h?>/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=$path_h?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=$path_h?>/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=$path_h?>/iCheck/flat/green.css" rel="stylesheet">
	
	    <!-- Animate.css -->
    <link href="<?=$path_h?>/animate.css/animate.min.css" rel="stylesheet">	

    <!-- dhtmlxcalendar.css -->
    <link href="<?=$path?>/dhtmlxcalendar/dhtmlxcalendar.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?=$path_h?>/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	
	
	 <!-- summernote THIS IS  -->
    <link href="<?=$path?>/summernote/summernote.css" rel="stylesheet">
	
	


	<!-- OrgChart -->
    <link href="<?=$path?>/orgchart/css/jquery.orgchart.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=$path?>/custom.css" rel="stylesheet">
	<style>
        #comment_div a{
            cursor: pointer;
        }
    </style>
	<!--
    <link href="/stat_own/pages/tasks/style.css" rel="stylesheet">-->
	
	   <!-- jQuery -->
    <script src="<?=$path?>/jquery.min.js"></script>
  </head>
  
  
 <? if ($_SESSION['user']['id']=='admin') {require 'navbar.php';}?>


 
         