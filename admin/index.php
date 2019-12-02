<?php 
session_start();

$vue = 'index.phtml';
$title = 'Section principal';

if(!isset($_SESSION['connected']) || !$_SESSION['connected'] == true)
    header('Location:login.php');

include('tpl/layout.phtml');    
 

?>
