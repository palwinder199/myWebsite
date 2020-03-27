<?php  
require __DIR__.'/phpmailer/vendor/autoload.php';

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
		$mail->addReplyTo('palwinder199@gmail.com', 'Palwinder199.com');
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
function CheckLogin($LOC = './')
{
	if(!isset($_SESSION["Client"]))
	{
		echo "<script>location.href='".$LOC."'</script>";
		exit;
	}
}
function LoginRedirect($LOC = './')
{
	if(isset($_SESSION["Client"]))
	{
		echo "<script>location.href='".$LOC."'</script>";
		exit;
	}
}
function WebsiteURL()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . '/';
}
function WebsiteFullURL()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}


function generateSeoURL($string, $wordLimit = 0){
    $separator = '-';
    
    if($wordLimit != 0){
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;'                    => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => $separator,
        '('.$quoteSeparator.')+'=> $separator
    );

    $string = strip_tags($string);
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }

    $string = strtolower($string);

    return trim(trim($string, $separator));
}
?>