<?php    
if(isset($_SESSION["ClientToken"]) and isset($_POST["token"]) and $_POST["token"]==$_SESSION["ClientToken"])
{
	if(isset($_POST["loginEmail"]) and isset($_POST["loginPassword"]))
	{
		$arr = [];
		
		if($_POST["loginEmail"]=='')
		{
			$arr["error"]["list"]["loginEmail"]="";
		}
		if($_POST["loginPassword"]=='')
		{
			$arr["error"]["list"]["loginPassword"]="";
		}
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			$LoginSql=mysqli_query($con,"Select * from login l, client_login_confirm clc where l.login_id_pk=clc.login_id_fk and clc.clc_email_confirmed='active' and (l.login_uname='".addslashes($_POST["loginEmail"])."' or l.login_email='".addslashes($_POST["loginEmail"])."') and binary l.login_password='".addslashes($_POST["loginPassword"])."' and l.login_type='client'") or die(mysqli_error($con));
			if(mysqli_num_rows($LoginSql)>0)
			{
				$LoginRow=mysqli_fetch_assoc($LoginSql);
				if($LoginRow['login_status']=='active')
				{
					$_SESSION['Client']['login_id_pk']=$LoginRow['login_id_pk'];
					$_SESSION['Client']['login_fullname']=$LoginRow['login_fullname'];
					$_SESSION['Client']['login_uname']=$LoginRow['login_uname'];
					$_SESSION['Client']['login_email']=$LoginRow['login_email'];
					$_SESSION['Client']['login_phone']=$LoginRow['login_phone'];
					$_SESSION['Client']['login_img']="";
					if(file_exists('uploads/'.$LoginRow['login_img']) and $LoginRow['login_img']!='')
					{
						$_SESSION['Client']['login_img']='';
					}
					$location="./dashboard";
					
					if(isset($_REQUEST['error']) and isset($_REQUEST['errormsg']) and isset($_REQUEST['redirect']) and $_REQUEST['error']=='true' and $_REQUEST['errormsg']!='' and $_REQUEST['redirect']!='')
					{
						$location="./".$_REQUEST['redirect'];
					}
					//echo json_encode(array("location"=>$location,"success"=>"200","ClientToken"=>$_SESSION["ClientToken"]));
					$_SESSION['Client']["loggedin"]="";
					unset($_SESSION["ClientToken"]);
					LoginRedirect($location);
					exit;
				}
				elseif($LoginRow['login_status']=='deactive')
				{
					$arr=[];
					$arr["error"]["ClientToken"]=$_SESSION["ClientToken"];
					$arr["error"]["login_disabled"]="Login disabled by Admin..";
					echo json_encode($arr);
					exit;
					//echo "<script>alert('Login disabled by Admin.')</script>";
				}
			}
			else
			{
				$arr=[];
				$arr["error"]["ClientToken"]=$_SESSION["ClientToken"];
				$arr["error"]["login_incorrect_details"]="Username or Password is incorrect.";
				echo json_encode($arr);
				exit;
				//echo "<script>alert('Username or Password is incorrect.')</script>";
			}
		}
		exit;
	}
	elseif(isset($_POST["registerFormName"]) and isset($_POST["registerFormPhone"]) and isset($_POST["registerFormEmail"]) and isset($_POST["registerFormPassword"]) and isset($_POST["registerFormCheckbox"]))
	{
		$arr = [];
		
		if($_POST["registerFormName"]=='')
		{
			$arr["error"]["list"]["registerFormName"]="";
		}
		if($_POST["registerFormEmail"]=='' or !preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$_POST["registerFormEmail"]))
		{
			$arr["error"]["list"]["registerFormEmail"]="";
		}
		else
		{
			$table="login";
			$pk_column="login_email";
			$pk_value=addslashes($_POST["registerFormEmail"]);
			$required_column="login_email";
			
			$column = GetSingleData($table, $pk_column, $pk_value, $required_column);
			
			if($column!='')
			{
				$arr["error"]["list"]["registerFormEmail"]="Email already registered.";
			}
		}
		if($_POST["registerFormPhone"]=='' or preg_match ("/[^0-9]/", $_POST["registerFormPhone"]))
		{
			$arr["error"]["list"]["registerFormPhone"]="";
		}
		if($_POST["registerFormPassword"]=='')
		{
			$arr["error"]["list"]["registerFormPassword"]="";
		}
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			/***/
			$LoginSql=mysqli_query($con,"insert into login set login_fullname='".addslashes($_POST["registerFormName"])."', login_uname='".addslashes($_POST["registerFormEmail"])."', login_email='".addslashes($_POST["registerFormEmail"])."', login_phone='".addslashes($_POST["registerFormPhone"])."', login_password='".addslashes($_POST["registerFormPassword"])."', login_status='deactive', login_type='client', login_entrydatetime='".date("Y-m-d H:i:s")."'") or die(mysqli_error($con));
			$OTP=mt_rand(1000,9999);
			$CurrentDateTime=date("Y-m-d H:i:s");
			$DateTime30=date("Y-m-d H:i:s", strtotime("+30 minutes", strtotime($CurrentDateTime)));
			$login_id_fk=mysqli_insert_id($con);
			$LoginConfirm=mysqli_query($con,"insert into client_login_confirm set login_id_fk='".$login_id_fk."', clc_email_otp='".$OTP."', clc_email_otp_validity='".$DateTime30."', clc_email_confirmed='deactive', clc_token='".addslashes($_POST["token"])."', clc_entrydatetime='".$CurrentDateTime."'") or die(mysqli_error($con));
			/*******start send email otp*******/
			$To = $_POST["registerFormEmail"];
			$Subject = "Confirm Email Palwinder199.com IELTS";
			$Body = "Your OTP is <b style=\"font-size:50px;\">".$OTP."</b> Valid for 30 minutes."; 
			$AltBody = "Your OTP is ".$OTP;
			$Title = "Palwinder199.com IELTS";
			$Es = SendMail($To, $Subject, $Body, $AltBody, $Title);
			
			/*******end send email otp*******/
			if($LoginSql===true and $LoginConfirm===true)
			{
				//echo json_encode(array("location"=>"./confirm-email","success"=>"200","ClientToken"=>$_SESSION["ClientToken"],"EmailStatus"=>$Es));
				$_SESSION["confirm"]["login_id_fk"]=$login_id_fk;
				$_SESSION["confirm"]["login_email"]=$_POST["registerFormEmail"];
				$_SESSION["confirm"]["clc_email_otp"]=$OTP;
				$_SESSION["confirm"]["clc_email_otp_validity"]=$DateTime30;
				unset($_SESSION["ClientToken"]);
				//echo "<script>location='./confirm-email'</script>";
				//exit;
				CheckLogin('./confirm-email');
			}
		}
		exit;
	}
	elseif(isset($_SESSION["confirm"]) and isset($_POST["registerOTP"]))
	{
		$arr = [];
		
		if($_POST["registerOTP"]=='')
		{
			$arr["error"]["list"]["registerOTP"]="Please enter OTP.";
		}
		elseif(strlen($_POST["registerOTP"])!=4)
		{
			$arr["error"]["list"]["registerOTP"]="Please check OTP.";
		}
		elseif($_POST["registerOTP"]!=$_SESSION["confirm"]["clc_email_otp"])
		{
			$arr["error"]["list"]["registerOTP"]="Wrong OTP please check again.";
		}
		elseif($_POST["registerOTP"]==$_SESSION["confirm"]["clc_email_otp"] and $_SESSION["confirm"]["clc_email_otp_validity"]<date("Y-m-d H:i:s"))
		{
			$arr["error"]["list"]["registerOTP"]="OTP expired.";
		}
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			CheckLogin('./confirm-email&error='.$arr["error"]["list"]["registerOTP"]);
			//echo json_encode($arr);
			//exit;
		}
		elseif(isset($_SESSION["confirm"]))
		{
			/***/
			$LoginSql=mysqli_query($con,"Select * from login where login_id_pk='".$_SESSION["confirm"]["login_id_fk"]."'") or die(mysqli_error($con));
			
			if(mysqli_num_rows($LoginSql)>0)
			{
				mysqli_query($con,"update login set login_status='active' where login_id_pk='".$_SESSION["confirm"]["login_id_fk"]."'") or die(mysqli_error($con));
				
				mysqli_query($con,"update client_login_confirm set clc_email_confirmed='active' where login_id_fk='".$_SESSION["confirm"]["login_id_fk"]."'") or die(mysqli_error($con));
				
				$LoginRow=mysqli_fetch_assoc($LoginSql);
				$_SESSION['Client']['login_id_pk']=$LoginRow['login_id_pk'];
				$_SESSION['Client']['login_fullname']=$LoginRow['login_fullname'];
				$_SESSION['Client']['login_uname']=$LoginRow['login_uname'];
				$_SESSION['Client']['login_email']=$LoginRow['login_email'];
				$_SESSION['Client']['login_phone']=$LoginRow['login_phone'];
				$_SESSION['Client']['login_img']="";
				
				$location="./dashboard";
				
				if(isset($_REQUEST['error']) and isset($_REQUEST['errormsg']) and isset($_REQUEST['redirect']) and $_REQUEST['error']=='true' and $_REQUEST['errormsg']!='' and $_REQUEST['redirect']!='')
				{
					$location="./".$_REQUEST['redirect'];
				}
				//echo json_encode(array("location"=>$location,"success"=>"200","ClientToken"=>$_SESSION["ClientToken"]));
				$_SESSION['Client']["loggedin"]="";
				unset($_SESSION["confirm"]);
				unset($_SESSION["ClientToken"]);
				//exit;
				LoginRedirect($location);
				
			}
			/*****/
		}
		exit;
	}
	elseif(isset($_POST["old-loginPassword"]) and isset($_POST["change-loginPassword"]) and isset($_POST["confirm-change-loginPassword"]))
	{
		CheckLogin("./");
		$arr = [];
		
		if($_POST["old-loginPassword"]=='')
		{
			$arr["error"]["list"]["old-loginPassword"]="";
		}
		if($_POST["change-loginPassword"]=='')
		{
			$arr["error"]["list"]["change-loginPassword"]="";
		}
		if($_POST["confirm-change-loginPassword"]=='')
		{
			$arr["error"]["list"]["confirm-change-loginPassword"]="";
		}
		if($_POST["change-loginPassword"]!=$_POST["confirm-change-loginPassword"])
		{
			$arr["error"]["list"]["change-login-error-display"]="Password don't match with confirm password.";
			$arr["error"]["list"]["change-loginPassword"]="";
			$arr["error"]["list"]["confirm-change-loginPassword"]="";
			
		}
		$ClientPwd=GetSingleData("login", "login_id_pk", $_SESSION['Client']['login_id_pk'], "login_password");
		if($ClientPwd!=$_POST["old-loginPassword"])
		{
			$arr["error"]["list"]["old-loginPassword"]="";
			$arr["error"]["list"]["change-login-error-display"]="Wrong old password.";
			
		}
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			/***/
			$CpQry="update login set login_password='".addslashes($_POST["change-loginPassword"])."' where login_id_pk='".$_SESSION['Client']['login_id_pk']."'";
			$CpSql=mysqli_query($con, $CpQry) or die(mysqli_error($con));
			/*******start send email otp*******/
			$To = $_SESSION["Client"]["login_email"];
			$Subject = "MyFriendSid.com Login Password Changed";
			$Body = "Your login password changed successfully."; 
			$AltBody = "Your login password changed successfully.";
			$Title = "Palwinder199.com";
			$Es = SendMail($To, $Subject, $Body, $AltBody, $Title);
			
			/*******end send email otp*******/
			if($CpSql===true)
			{
				echo json_encode(array("location"=>"./login&error=true&errormsg=".urlencode("Your login password changed successfully login again to continue.")."&redirect=dashboard","success"=>"200","ClientToken"=>$_SESSION["ClientToken"],"EmailStatus"=>$Es));
				unset($_SESSION["ClientToken"]);
				unset($_SESSION["Client"]);
				exit;
			}
		}
		exit;
	}
	elseif(isset($_POST["lpform-description"]) and isset($_POST["lpform-email"]) and isset($_POST["lpform-phone"]) and isset($_POST["lpform-name"]))
	{
		$arr = [];
		
		if($_POST["lpform-description"]=='')
		{
			$arr["error"]["list"]["lpform-description"]="<b style=\"color:#ffffff;\">Please Type Message.</b>";
		}
		if($_POST["lpform-email"]=='')
		{
			$arr["error"]["list"]["lpform-email"]="<b style=\"color:#ffffff;\">Please Enter Email Address.</b>";
		}
		elseif(filter_var($_POST["lpform-email"], FILTER_VALIDATE_EMAIL)==false)
		{
			$arr["error"]["list"]["lpform-email"]="<b style=\"color:#ffffff;\">Please Enter Correct Email Address.</b>";
		}
		if($_POST["lpform-phone"]=='')
		{
			$arr["error"]["list"]["lpform-phone"]="<b style=\"color:#ffffff;\">Please Enter Phone Number.</b>";
		}
		elseif(is_numeric($_POST["lpform-phone"])==false)
		{
			$arr["error"]["list"]["lpform-phone"]="<b style=\"color:#ffffff;\">Please Enter Correct Phone Number.</b>";
		}
		if($_POST["lpform-name"]=='')
		{
			$arr["error"]["list"]["lpform-name"]="<b style=\"color:#ffffff;\">Please Enter Name.</b>";
		}
		elseif(ctype_alpha(str_replace(' ', '', $_POST["lpform-name"]))==false or strlen($_POST["lpform-name"])<3)
		{
			$arr["error"]["list"]["lpform-name"]="<b style=\"color:#ffffff;\">Please Enter Correct Name.</b>";
		}
		
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			$mQry="INSERT INTO form_query SET fq_name='".addslashes($_POST["lpform-name"])."', fq_phone='".addslashes($_POST["lpform-phone"])."', fq_email='".addslashes($_POST["lpform-email"])."', fq_message='".addslashes($_POST["lpform-description"])."', fq_query_from_url='".WebsiteFullURL()."', fq_status='active', fq_entrydatetime='".date("Y-m-d H:i:s")."'";
			$mSql=mysqli_query($con, $mQry) or die(mysqli_error($con));
			/**************/
			if($mSql===true)
			{
				$arr["success"]["list"]["homeForm-msg"]='<h1 class="text-center">Your <span>Message</span> sent successfully, We will connect you as soon as possible.</h1>';
				
				$Subject="Message by ".$_REQUEST["lpform-email"];
				$Body="Name: ".$_REQUEST["lpform-name"]."<br>Phone: ".$_REQUEST["lpform-phone"]."<br>Email: ".$_REQUEST["lpform-email"]."<br>From: ".WebsiteFullURL()."<br>Message: ".$_REQUEST["lpform-description"];
				$AltBody=$Subject;
				$Title=$Subject;
				$arr["data"]["mailViaSmtp"]=SendMail("palwinder199@gmail.com",$Subject,$Body,$AltBody,$Title);
				
				echo json_encode($arr);
				exit;
			}
			/**************/
		}
		exit;
	}
	elseif(isset($_POST["quick-contact-form-message"]) and isset($_POST["quick-contact-form-email"]) and isset($_POST["quick-contact-form-phone"]) and isset($_POST["quick-contact-form-name"]))
	{
		$arr = [];
		
		if($_POST["quick-contact-form-message"]=='')
		{
			$arr["error"]["list"]["quick-contact-form-message"]="<b style=\"color:red;\">Please Type Message.</b>";
		}
		if($_POST["quick-contact-form-email"]=='')
		{
			$arr["error"]["list"]["quick-contact-form-email"]="<b style=\"color:red;\">Please Enter Email Address.</b>";
		}
		elseif(filter_var($_POST["quick-contact-form-email"], FILTER_VALIDATE_EMAIL)==false)
		{
			$arr["error"]["list"]["quick-contact-form-email"]="<b style=\"color:red;\">Please Enter Correct Email Address.</b>";
		}
		if($_POST["quick-contact-form-phone"]=='')
		{
			$arr["error"]["list"]["quick-contact-form-phone"]="<b style=\"color:red;\">Please Enter Phone Number.</b>";
		}
		elseif(is_numeric($_POST["quick-contact-form-phone"])==false)
		{
			$arr["error"]["list"]["quick-contact-form-phone"]="<b style=\"color:red;\">Please Enter Correct Phone Number.</b>";
		}
		if($_POST["quick-contact-form-name"]=='')
		{
			$arr["error"]["list"]["quick-contact-form-name"]="<b style=\"color:red;\">Please Enter Name.</b>";
		}
		elseif(ctype_alpha(str_replace(' ', '', $_POST["quick-contact-form-name"]))==false or strlen($_POST["quick-contact-form-name"])<3)
		{
			$arr["error"]["list"]["quick-contact-form-name"]="<b style=\"color:red;\">Please Enter Correct Name.</b>";
		}
		
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			$mQry="INSERT INTO form_query SET fq_name='".addslashes($_POST["quick-contact-form-name"])."', fq_phone='".addslashes($_POST["quick-contact-form-phone"])."', fq_email='".addslashes($_POST["quick-contact-form-email"])."', fq_message='".addslashes($_POST["quick-contact-form-message"])."', fq_query_from_url='".WebsiteFullURL()."#footer', fq_status='active', fq_entrydatetime='".date("Y-m-d H:i:s")."'";
			$mSql=mysqli_query($con, $mQry) or die(mysqli_error($con));
			/**************/
			if($mSql===true)
			{
				$arr["success"]["list"]["footer-quick-contact-form-result"]='<h3 class="text-center" style="color:#ccc;">Your <span>Message</span> sent successfully, We will connect you as soon as possible.</h3>';
				
				$Subject="Message by ".$_REQUEST["quick-contact-form-email"];
				$Body="Name: ".$_REQUEST["quick-contact-form-name"]."<br>Phone: ".$_REQUEST["quick-contact-form-phone"]."<br>Email: ".$_REQUEST["quick-contact-form-email"]."<br>From: ".WebsiteFullURL()."<br>Message: ".$_REQUEST["quick-contact-form-message"];
				$AltBody=$Subject;
				$Title=$Subject;
				$arr["data"]["mailViaSmtp"]=SendMail("palwinder199@gmail.com",$Subject,$Body,$AltBody,$Title);
				
				echo json_encode($arr);
				exit;
			}
			/**************/
		}
		exit;
	}
	elseif(isset($_POST["product-quote-form-message"]) and isset($_POST["product-quote-form-email"]) and isset($_POST["product-quote-form-phone"]) and isset($_POST["product-quote-form-name"]))
	{
		$arr = [];
		
		if($_POST["product-quote-form-message"]=='')
		{
			$arr["error"]["list"]["product-quote-form-message"]="<b style=\"color:red;\">Please Type Message.</b>";
		}
		if($_POST["product-quote-form-email"]=='')
		{
			$arr["error"]["list"]["product-quote-form-email"]="<b style=\"color:red;\">Please Enter Email Address.</b>";
		}
		elseif(filter_var($_POST["product-quote-form-email"], FILTER_VALIDATE_EMAIL)==false)
		{
			$arr["error"]["list"]["product-quote-form-email"]="<b style=\"color:red;\">Please Enter Correct Email Address.</b>";
		}
		if($_POST["product-quote-form-phone"]=='')
		{
			$arr["error"]["list"]["product-quote-form-phone"]="<b style=\"color:red;\">Please Enter Phone Number.</b>";
		}
		elseif(is_numeric($_POST["product-quote-form-phone"])==false)
		{
			$arr["error"]["list"]["product-quote-form-phone"]="<b style=\"color:red;\">Please Enter Correct Phone Number.</b>";
		}
		if($_POST["product-quote-form-name"]=='')
		{
			$arr["error"]["list"]["product-quote-form-name"]="<b style=\"color:red;\">Please Enter Name.</b>";
		}
		elseif(ctype_alpha(str_replace(' ', '', $_POST["product-quote-form-name"]))==false or strlen($_POST["product-quote-form-name"])<3)
		{
			$arr["error"]["list"]["product-quote-form-name"]="<b style=\"color:red;\">Please Enter Correct Name.</b>";
		}
		
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			$mQry="INSERT INTO form_query SET fq_name='".addslashes($_POST["product-quote-form-name"])."', fq_phone='".addslashes($_POST["product-quote-form-phone"])."', fq_email='".addslashes($_POST["product-quote-form-email"])."', fq_message='".addslashes($_POST["product-quote-form-message"])."', fq_query_from_url='".WebsiteFullURL()."#footer', fq_status='active', fq_entrydatetime='".date("Y-m-d H:i:s")."'";
			$mSql=mysqli_query($con, $mQry) or die(mysqli_error($con));
			/**************/
			if($mSql===true)
			{
				$arr["success"]["list"]["product-quote-form-result"]='<h3 class="text-center" style="color:#ccc;">Your <span>Message</span> sent successfully, We will connect you as soon as possible.</h3>';
				
				$Subject="Message by ".$_REQUEST["product-quote-form-email"];
				$Body="Name: ".$_REQUEST["product-quote-form-name"]."<br>Phone: ".$_REQUEST["product-quote-form-phone"]."<br>Email: ".$_REQUEST["product-quote-form-email"]."<br>From: ".WebsiteFullURL()."<br>Message: ".$_REQUEST["product-quote-form-message"];
				$AltBody=$Subject;
				$Title=$Subject;
				$arr["data"]["mailViaSmtp"]=SendMail("palwinder199@gmail.com",$Subject,$Body,$AltBody,$Title);
				
				echo json_encode($arr);
				exit;
			}
			/**************/
		}
		exit;
	}
	elseif(isset($_POST["template-contactform-message"]) and isset($_POST["template-contactform-email"]) and isset($_POST["template-contactform-phone"]) and isset($_POST["template-contactform-name"]))
	{
		$arr = [];
		
		if($_POST["template-contactform-message"]=='')
		{
			$arr["error"]["list"]["template-contactform-message"]="<b style=\"color:red;\">Please Type Message.</b>";
		}
		if($_POST["template-contactform-email"]=='')
		{
			$arr["error"]["list"]["template-contactform-email"]="<b style=\"color:red;\">Please Enter Email Address.</b>";
		}
		elseif(filter_var($_POST["template-contactform-email"], FILTER_VALIDATE_EMAIL)==false)
		{
			$arr["error"]["list"]["template-contactform-email"]="<b style=\"color:red;\">Please Enter Correct Email Address.</b>";
		}
		if($_POST["template-contactform-phone"]=='')
		{
			$arr["error"]["list"]["template-contactform-phone"]="<b style=\"color:red;\">Please Enter Phone Number.</b>";
		}
		elseif(is_numeric($_POST["template-contactform-phone"])==false)
		{
			$arr["error"]["list"]["template-contactform-phone"]="<b style=\"color:red;\">Please Enter Correct Phone Number.</b>";
		}
		if($_POST["template-contactform-name"]=='')
		{
			$arr["error"]["list"]["template-contactform-name"]="<b style=\"color:red;\">Please Enter Name.</b>";
		}
		elseif(ctype_alpha(str_replace(' ', '', $_POST["template-contactform-name"]))==false or strlen($_POST["template-contactform-name"])<3)
		{
			$arr["error"]["list"]["template-contactform-name"]="<b style=\"color:red;\">Please Enter Correct Name.</b>";
		}
		
		if(count($arr)>0)
		{
			$arr["error"]["list"]["ClientToken"]=$_SESSION["ClientToken"];
			echo json_encode($arr);
			exit;
		}
		else
		{
			$mQry="INSERT INTO form_query SET fq_name='".addslashes($_POST["template-contactform-name"])."', fq_phone='".addslashes($_POST["template-contactform-phone"])."', fq_email='".addslashes($_POST["template-contactform-email"])."', fq_message='".addslashes($_POST["template-contactform-message"])."', fq_query_from_url='".WebsiteFullURL()."', fq_status='active', fq_entrydatetime='".date("Y-m-d H:i:s")."'";
			$mSql=mysqli_query($con, $mQry) or die(mysqli_error($con));
			/**************/
			if($mSql===true)
			{
				$arr["success"]["list"]["template-contactform-result"]='<h3 class="text-center" style="color:#fff;">Your <span>Message</span> sent successfully, We will connect you as soon as possible.</h3>';
				
				$Subject="Message by ".$_REQUEST["template-contactform-email"];
				$Body="Name: ".$_REQUEST["template-contactform-name"]."<br>Phone: ".$_REQUEST["template-contactform-phone"]."<br>Email: ".$_REQUEST["template-contactform-email"]."<br>From: ".WebsiteFullURL()."<br>Message: ".$_REQUEST["template-contactform-message"];
				$AltBody=$Subject;
				$Title=$Subject;
				$arr["data"]["mailViaSmtp"]=SendMail("palwinder199@gmail.com",$Subject,$Body,$AltBody,$Title);//$arr["data"]["mailViaSmtp"]=SendMail("enrage.bakhtavar@gmail.com",$Subject,$Body,$AltBody,$Title);
				echo json_encode($arr);
				exit;
			}
			/**************/
		}
		exit;
	}
	exit;
}
elseif(isset($_SESSION["ClientToken"]) and isset($_POST["token"]) and $_POST["token"]!=$_SESSION["ClientToken"])
{
	echo "<script>alert('Someting went wrong, Please close other tabs and reload your page.');</script>";
	exit;
}
?>
