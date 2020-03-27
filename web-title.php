<?php  
$WEBTITLE="Palwinder Singh | Palwinder199.com";
$WEBDESCRIPTION="I'm Palwinder Singh from Sangrawan a small village in Kapurthala, Punjab. I am a Web Developer.";
$WEBKEYWORDS="Palwinder Singh, Palwinder199.com";
if(!isset($_REQUEST['page-name']))
{
	$WEBTITLE="Home - ".$WEBTITLE;
	$WEBDESCRIPTION=$WEBDESCRIPTION;
	$WEBKEYWORDS=$WEBKEYWORDS;
}
elseif(isset($_REQUEST['page-name']) and file_exists($_REQUEST['page-name'].".php"))
{
	if($_REQUEST['page-name']=='product' and isset($_GET['id']) and $_GET['id']>0)
	{
		$ChkWEBTITLE=GetSingleData('products', 'p_id_pk', $_GET['id'], 'p_seo_title');
		if($ChkWEBTITLE=='')
		{
			if(strpos($_REQUEST['page-name'], "-")==false)
			{
				$WEBTITLE=ucfirst($_REQUEST['page-name'])." - ".$WEBTITLE;
				$WEBDESCRIPTION=$WEBDESCRIPTION;
				$WEBKEYWORDS=$WEBKEYWORDS;
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
				$WEBDESCRIPTION=$WEBDESCRIPTION;
				$WEBKEYWORDS=$WEBKEYWORDS;
			}
		}
		else
		{
			$WEBTITLE=GetSingleData('products', 'p_id_pk', $_GET['id'], 'p_seo_title');
			$WEBDESCRIPTION=GetSingleData('products', 'p_id_pk', $_GET['id'], 'p_seo_desc');
			$WEBKEYWORDS=GetSingleData('products', 'p_id_pk', $_GET['id'], 'p_seo_keywords');
		}
	}
	elseif(strpos($_REQUEST['page-name'], "-")==false)
	{
		$WEBTITLE=ucfirst($_REQUEST['page-name'])." - ".$WEBTITLE;
		$WEBDESCRIPTION=$WEBDESCRIPTION;
		$WEBKEYWORDS=$WEBKEYWORDS;
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
		$WEBDESCRIPTION=$WEBDESCRIPTION;
		$WEBKEYWORDS=$WEBKEYWORDS;
	}
}
else
{
	$WEBTITLE.="404 - ";
	$WEBDESCRIPTION=$WEBDESCRIPTION;
	$WEBKEYWORDS=$WEBKEYWORDS;
}
?>