<?php
include("functions.php");
if(isset($_FILES["imagetoupload"]['name']) and $_FILES["imagetoupload"]['name']!='')
{
	echo "aaaa ".UploadSingleImage('imagetoupload', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
}
?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="imagetoupload" accept="image/*"/>
<input type="submit" name="submit" value="Submit"/>
</form>