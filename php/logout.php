<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);

}

header("Location: ../home.html");
die;