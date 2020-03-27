<?php
if(isset($_REQUEST["page-name"]) and $_REQUEST["page-name"]=='products-a')
{
?>
   <script>
	  $(function () {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1')
		CKEDITOR.replace('editor2')
		//bootstrap WYSIHTML5 - text editor
		//$('.textarea').wysihtml5()
	  })
   </script>
<?php
}
elseif(isset($_REQUEST["page-name"]) and ($_REQUEST["page-name"]=='products-overview' or $_REQUEST["page-name"]=='about-me-content'))
{
?>
   <script>
	  $(function () {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1')
		//CKEDITOR.replace('editor2')
		//bootstrap WYSIHTML5 - text editor
		//$('.textarea').wysihtml5()
	  })
   </script>
<?php
}
?>