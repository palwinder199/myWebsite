<?php   
if(!isset($_REQUEST['page-name']))
{
	include('home.php');
}
elseif(isset($_REQUEST['page-name']) and $_REQUEST['page-name']=='logout' and $_SESSION['Client'])
{
	//session_destroy();
	unset($_SESSION['Client']);
	echo "<script>location.href='./'</script>";
	exit;
}
elseif(isset($_REQUEST['page-name']) and file_exists($_REQUEST['page-name'].".php"))
{
	//echo $_REQUEST['page-name'];
	
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
	//echo $_REQUEST['page-name'];
	//echo "<script>location.href='./'</script>";
	//echo "404 page not found.";
	echo "error.php";
	exit;
}
?>