<?php
$WEBTITLE="Admin | palwinder199.com";
if(!isset($_REQUEST['page-name']))
{
	$WEBTITLE="Dashboard - ".$WEBTITLE;
}
elseif(isset($_REQUEST['page-name']) and file_exists($_REQUEST['page-name'].".php"))
{
	if(strpos($_REQUEST['page-name'], "-")==false)
	{
		$WEBTITLE=ucfirst($_REQUEST['page-name'])." - ".$WEBTITLE;
	}
	else
	{
		$t="";
		$Ta=explode("-",$_REQUEST['page-name']);
		for($x=0;$x<count($Ta);$x++)
		{
			$t .= ucfirst($Ta[$x])." ";
		}
		$WEBTITLE=$t."- ".$WEBTITLE;
	}
}
else
{
	$WEBTITLE.="404 - ";
}
?>