<?php

session_start();

if(isset($_SESSION['parent_id']))
{
	unset($_SESSION['parent_id']);

}
if(isset($_SESSION['child_id']))
{
	unset($_SESSION['child_id']);

}
header("Location: ../index.php");
die;