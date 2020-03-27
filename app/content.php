<?php
if(!isset($_REQUEST['page-name']))
{
	include('dashboard.php');
}
elseif(isset($_REQUEST['page-name']) and $_REQUEST['page-name']=='logout' and $_SESSION['PaliAdminPanel'])
{
	//session_destroy();
	unset($_SESSION['PaliAdminPanel']);
	echo "<script>location.href='./'</script>";
	exit;
}
elseif(isset($_REQUEST['page-name']) and file_exists($_REQUEST['page-name'].".php"))
{
	include($_REQUEST['page-name'].".php");
}
/** /
elseif(isset($_REQUEST['sub-page-name']))// and file_exists($_REQUEST['sub-page-name'].".php")
{
	include("online-counselling-program.php");
}
/**/
else
{
	echo "<script>location.href='./'</script>";
	exit;
}
?>