<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$this->load->helper('html');
$this->load->helper('url');
if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>GEMINE: Gene Expression and Mutation Interaction Network Expansion Database</title>
        <link type='text/css' rel='stylesheet' href='<?php echo base_url(); ?>resources/css/bootstrap-theme.css' />
        <link type="text/css" rel="stylesheet" href='<?php echo base_url(); ?>resources/css/bootstrap-theme.min.css' />
        <link type="text/css" rel="stylesheet" href='<?php echo base_url(); ?>resources/css/bootstrap.css' />
        <link type="text/css" rel="stylesheet" href='<?php echo base_url(); ?>resources/css/bootstrap.min.css' />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.dataTables.css" type="text/css" media="screen"/>
		
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>resources/js/spinner-application.js"></script>
        

        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icon.jpg">
        <style type="text/css">
           body {
              height: 100%;
              padding: 0;
              margin: 0;
           }

           #app {
              min-height: 100% !important;
              height:100%;
  width:100%;
  overflow:hidden;
              
           }
			.width{
			width: 80%;
			}
			.aParent div {
  float: left;
  clear: none; 
}
           /* #footer {
              position: absolute;
              bottom: 0;
              background: red;
              height: 100px;
              width: 100%;
           } */

        </style>
    </head>
    <body>
    <!-- <div id="app"> -->
        <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:100px;">
        <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">GEMINE DATABASE</a>
        </div>
        <h1></h1>
        </div>
        </nav>