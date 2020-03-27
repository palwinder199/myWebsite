<?php
require __DIR__.'/../phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function randomString($n = 10) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 


function SendMail($To,$Subject,$Body,$AltBody,$Title = "Enrage Tech")
{
	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		
		/**********/
		//Server settings
		$mail->SMTPDebug = 0;//2;//                                    // Enable verbose debug output
		$mail->isSMTP();                                            // Set mailer to use SMTP
		$mail->Host       = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'noreply@palwinder199.com';                     // SMTP username
		$mail->Password   = '52d9HIyZ';                               // SMTP password
		$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 587;  
		/**********/
		
		
		/********** /
		//Server settings
		$mail->SMTPDebug = 0;//2;//                                       // Enable verbose debug output
		$mail->isSMTP();                                            // Set mailer to use SMTP
		$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'Palwinder199@gmail.com';                     // SMTP username
		$mail->Password   = 'yourpassword';                               // SMTP password
		$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port       = 587;  
		/**********/
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		
		//Recipients
		$mail->setFrom('noreply@palwinder199.com', $Title);
		//$mail->addAddress('palwinder199@gmail.com', 'Palwinder Singh');     // Add a recipient
		//$mail->addAddress('Palwinder199@gmail.com', 'Palwinder Singh');     // Add a recipient
		$mail->addAddress($To);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo('hi@palwinder199.com', 'Palwinder199.com');
		//$mail->addCC('Palwinder199@gmail.com');
		//$mail->addBCC('palwinder199@gmail.com');

		// Attachments
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $Subject;//'PHPMailer Mail Test';
		$mail->Body    = $Body;//'This is PHP mail test.';
		$mail->AltBody = $AltBody;//'PHP email testing.';

		$mail->send();
		return 'sent';
	} catch (Exception $e) {
		return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


########################################################
# Login information for the SMS Gateway
########################################################

$user = "Palwinder199";
$password = "Palwinder199";
$senderid = "PALWIN";
$smsurl = "https://kit19.com/ComposeSMS.aspx?";

########################################################
# Functions used to send the SMS message
########################################################
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen($args[1],80, $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
  $args[3] = "C".$args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

 

function SMSSend($phone, $msg, $debug=false){
      global $user,$password,$senderid,$smsurl;

      $url = 'username='.$user;
      $url.= '&password='.$password;
      $url.= '&sender='.$senderid;
      $url.= '&to='.urlencode($phone);
      $url.= '&message='.urlencode($msg);
      $url.= '&priority=1';
      $url.= '&dnd=1';
      $url.= '&unicode=0';

           
      $urltouse =  $smsurl.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }
      $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $urltouse);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      //Open the URL to send the message
      //$response = httpRequest($urltouse);
	  $response = curl_exec($ch);
      curl_close($ch);
      if ($debug) {
           return "Response: <br><pre>".str_replace(array("<",">"),array("&lt;","&gt;"),$response)."</pre><br>"; }

      return($response);
}

########################################################
# GET data from sendsms.html
########################################################

//$phonenum = $_POST['recipient'];
//$message = $_POST['message'];
//$debug = true;

//SMSSend($phonenum,$message,$debug);

function UploadSingleImage($field_name = '', $target_folder = '../upload', $file_name = '', $thumb = FALSE, $thumb_folder = '../upload/thumb', $thumb_width = '200', $thumb_height = '200')
{

    
	$check = getimagesize($_FILES[$field_name]["tmp_name"]);
		
	if($_FILES[$field_name]['name']!='' and $check !== false)
	{
		if(!file_exists($target_folder) and $target_folder!='')
		{
			mkdir($target_folder, 0777, true);
			fopen($target_folder."/index.html", "w");
		}
		if(!file_exists($thumb_folder))
		{
			mkdir($thumb_folder, 0777, true);
			fopen($thumb_folder."/index.html", "w");
		}
		//folder path setup
		$target_path = $target_folder."/";
		$thumb_path = $thumb_folder."/";
		
		//file name setup
		$filename_err = explode(".",$_FILES[$field_name]['name']);
		$filename_err_count = count($filename_err);
		$file_ext = $filename_err[$filename_err_count-1];
		/******/
		$dt=date("ymdHis");
		if($file_name == 'auto')
		{
			$fileName=$dt."-".$_FILES[$field_name]['name'];
		}
		elseif($file_name != '')
		{
			$fileName = $file_name.'.'.$file_ext;
		}
		else
		{
			$fileName = $_FILES[$field_name]['name'];
		}
		/******/
		
		//upload image path
		$upload_image = $target_path.basename($fileName);
		
		//upload image
		if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
		{
			//thumbnail creation
			if($thumb == TRUE)
			{
				$thumbnail = $thumb_path.$fileName;
				list($width,$height) = getimagesize($upload_image);
				
				/*******/
				if($thumb_width=='auto' and $thumb_height=='auto')
				{
					$thumb_width=$width;
					$thumb_height=$height;
				}
				elseif($thumb_width=='auto' or $thumb_height=='auto')
				{
					if($thumb_width=='auto')
					{
						$thumb_width=floor(($width/$height)*$thumb_height);;
						
					}
					else
					{
						$thumb_height=floor(($height/$width)*$thumb_width);
					}
					
				}
				/*******/
				
				$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
				switch($file_ext){
					case 'jpg':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'JPG':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'jpeg':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'JPEG':
						$source = imagecreatefromjpeg($upload_image);
						break;

					case 'png':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefrompng($upload_image);
						break;

					case 'PNG':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefrompng($upload_image);
						break;
						
					case 'gif':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefromgif($upload_image);
						break;
						
					case 'GIF':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefromgif($upload_image);
						break;
						
					default:
						$source = imagecreatefromjpeg($upload_image);
				}

				imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
				switch($file_ext){
					case 'jpg':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'JPG':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'jpeg':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'JPEG':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'png':
						imagepng($thumb_create,$thumbnail,9);
						break;
						
					case 'PNG':
						imagepng($thumb_create,$thumbnail,9);
						break;

					case 'gif':
						imagegif($thumb_create,$thumbnail,75);
						break;

					case 'GIF':
						imagegif($thumb_create,$thumbnail,75);
						break;
						
					default:
						imagejpeg($thumb_create,$thumbnail,75);
				}

			}

			return $fileName;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
    
}

function UploadMultipleImages($field_name = '', $field_array = 0, $target_folder = '../upload', $file_name = '', $thumb = FALSE, $thumb_folder = '../upload/thumb', $thumb_width = '200', $thumb_height = '200')
{

    
	$check = getimagesize($_FILES[$field_name]["tmp_name"][$field_array]);
		
	if($_FILES[$field_name]['name'][$field_array]!='' and $check !== false)
	{
		if(!file_exists($target_folder) and $target_folder!='')
		{
			mkdir($target_folder, 0777, true);
			fopen($target_folder."/index.html", "w");
		}
		if(!file_exists($thumb_folder))
		{
			mkdir($thumb_folder, 0777, true);
			fopen($thumb_folder."/index.html", "w");
		}
		//folder path setup
		$target_path = $target_folder."/";
		$thumb_path = $thumb_folder."/";
		
		//file name setup
		$filename_err = explode(".",$_FILES[$field_name]['name'][$field_array]);
		$filename_err_count = count($filename_err);
		$file_ext = $filename_err[$filename_err_count-1];
		/******/
		$dt=date("ymdHis");
		if($file_name == 'auto')
		{
			$fileName=$dt."-".$field_array."-".$_FILES[$field_name]['name'][$field_array];
		}
		elseif($file_name != '')
		{
			$fileName = $file_name.'.'.$file_ext;
		}
		else
		{
			$fileName = $_FILES[$field_name]['name'][$field_array];
		}
		/******/
		
		//upload image path
		$upload_image = $target_path.basename($fileName);
		
		//upload image
		if(move_uploaded_file($_FILES[$field_name]['tmp_name'][$field_array],$upload_image))
		{
			//thumbnail creation
			if($thumb == TRUE)
			{
				$thumbnail = $thumb_path.$fileName;
				list($width,$height) = getimagesize($upload_image);
				
				/*******/
				if($thumb_width=='auto' and $thumb_height=='auto')
				{
					$thumb_width=$width;
					$thumb_height=$height;
				}
				elseif($thumb_width=='auto' or $thumb_height=='auto')
				{
					if($thumb_width=='auto')
					{
						$thumb_width=floor(($width/$height)*$thumb_height);;
						
					}
					else
					{
						$thumb_height=floor(($height/$width)*$thumb_width);
					}
					
				}
				/*******/
				
				$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
				switch($file_ext){
					case 'jpg':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'JPG':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'jpeg':
						$source = imagecreatefromjpeg($upload_image);
						break;
						
					case 'JPEG':
						$source = imagecreatefromjpeg($upload_image);
						break;

					case 'png':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefrompng($upload_image);
						break;

					case 'PNG':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefrompng($upload_image);
						break;
						
					case 'gif':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefromgif($upload_image);
						break;
						
					case 'GIF':
						/***********/
					    imagealphablending($thumb_create, false);
						imagesavealpha($thumb_create,true);
						$transparent = imagecolorallocatealpha($thumb_create, 255, 255, 255, 127);
						imagefilledrectangle($thumb_create, 0, 0, $thumb_width, $thumb_height, $transparent);
						/***********/
						$source = imagecreatefromgif($upload_image);
						break;
						
					default:
						$source = imagecreatefromjpeg($upload_image);
				}

				imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
				switch($file_ext){
					case 'jpg':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'JPG':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'jpeg':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'JPEG':
						imagejpeg($thumb_create,$thumbnail,75);
						break;
						
					case 'png':
						imagepng($thumb_create,$thumbnail,9);
						break;
						
					case 'PNG':
						imagepng($thumb_create,$thumbnail,9);
						break;

					case 'gif':
						imagegif($thumb_create,$thumbnail,75);
						break;

					case 'GIF':
						imagegif($thumb_create,$thumbnail,75);
						break;
						
					default:
						imagejpeg($thumb_create,$thumbnail,75);
				}

			}

			return $fileName;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
    
}

function UploadMultipleFiles($field_name = '', $field_array = 0, $target_folder = '../upload', $file_name = '')
{

    if($_FILES[$field_name]['name'][$field_array]!='')
	{
		if(!file_exists($target_folder) and $target_folder!='')
		{
			mkdir($target_folder, 0777, true);
			fopen($target_folder."/index.html", "w");
		}
		//folder path setup
		$target_path = $target_folder."/";
		
		//file name setup
		$filename_err = explode(".",$_FILES[$field_name]['name'][$field_array]);
		$filename_err_count = count($filename_err);
		$file_ext = $filename_err[$filename_err_count-1];
		/******/
		$dt=date("ymdHis");
		if($file_name == 'auto')
		{
			$fileName=$dt."-".$field_array."-".$_FILES[$field_name]['name'][$field_array];
		}
		elseif($file_name != '')
		{
			$fileName = $file_name.'.'.$file_ext;
		}
		else
		{
			$fileName = $_FILES[$field_name]['name'][$field_array];
		}
		/******/
		
		//upload file path
		$upload_file = $target_path.basename($fileName);
		
		//upload file
		if(move_uploaded_file($_FILES[$field_name]['tmp_name'][$field_array],$upload_file))
		{
			return $fileName;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
    
}

function GetSingleData($table, $pk_column, $pk_value, $required_column)
{
	$con = con();
	$qry="select ".$required_column." from ".$table." where ".$pk_column."='".$pk_value."'";
	//return $qry;
	/**/
	$sql=mysqli_query($con,$qry) or die(mysqli_query($con));
	$row=mysqli_fetch_assoc($sql);
	return $row[$required_column];
	/**/
}
function CheckLogin($LOC = '../')
{
	if(!isset($_SESSION["PaliAdminPanel"]))
	{
		echo "<script>location.href='".$LOC."'</script>";
		exit;
	}
}
function LoginRedirect($LOC = '../')
{
	if(isset($_SESSION["PaliAdminPanel"]))
	{
		echo "<script>location.href='".$LOC."'</script>";
		exit;
	}
}
?>