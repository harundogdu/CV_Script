<?php
session_start();
if(!isset($_SESSION['oturum'])):
header("Location:index.php");
endif;
require_once '../class/vt.php';
$database = new Database();
require_once 'include/header.php';
require_once 'include/left-sidebar.php';

if (isset($_GET['page'])) :
    $filename = "page/" . $_GET['page'] . ".php";
    if (file_exists($filename)) :
        include_once $filename;
    else :
        include_once 'include/home.php';
    endif;
else :
    include_once 'include/home.php';
endif;

require_once 'include/footer.php';
