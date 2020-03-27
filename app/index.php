<?php
include("../class/config.php");
include("functions.php");
include("exec.php");
if(isset($_SESSION["PaliAdminPanel"]))
{
	if(isset($_REQUEST['page-name']) and $_REQUEST['page-name']=='logout')
	{
		//session_destroy();
		unset($_SESSION['PaliAdminPanel']);
		echo "<script>location.href='./'</script>";
		exit;
	}
	include("web-title.php");
	include("header.php");
	include("sidebar.php");
	include("content.php");
	include("footer.php");
	include("scripts.php");
}
else
{
	include("login.php");
}

?>