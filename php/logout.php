<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);

}
if(isset($_SESSION['child_id']))
{
	unset($_SESSION['child_id']);

}
header("Location: ../index.php");
die;