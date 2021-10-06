<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);

}

<<<<<<< HEAD
header("Location: admin/home.php");
=======
header("Location: ../home.html");
>>>>>>> bfc56f2e7333420a3683c7b9c7972f96dcfbbc1a
die;