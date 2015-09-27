<?php
require 'minium_log.php';
session_start();
if(isset($_SESSION['mid']))
{
	header('Location: user.php');
}
else
{
	include 'home.php';
}
?>