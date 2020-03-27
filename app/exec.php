<?php  
if(isset($_SESSION["Token"]) and isset($_POST["token"]) and $_POST["token"]==$_SESSION["Token"])
{
	if(isset($_POST["login-usernameoremail"]) and isset($_POST["login-password"]))
	{
		$arr = [];
		
		if($_POST["login-usernameoremail"]=='')
		{
			$arr["error"]["list"]["login-usernameoremail"]="";
		}
		if($_POST["login-password"]=='')
		{
			$arr["error"]["list"]["login-password"]="";
		}
		if(count($arr)>0)
		{
			$arr["error"]["list"]["Token"]=$_SESSION["Token"];
			CheckLogin('./');
			//echo json_encode($arr);
			exit;
		}
		else
		{
			$LoginSql=mysqli_query($con,"Select * from login l where (l.login_uname='".addslashes($_POST["login-usernameoremail"])."' or l.login_email='".addslashes($_POST["login-usernameoremail"])."') and binary l.login_password='".addslashes($_POST["login-password"])."' and l.login_type='admin'") or die(mysqli_error($con));
			if(mysqli_num_rows($LoginSql)>0)
			{
				$LoginRow=mysqli_fetch_assoc($LoginSql);
				if($LoginRow['login_status']=='active')
				{
					$_SESSION['PaliAdminPanel']['login_id_pk']=$LoginRow['login_id_pk'];
					$_SESSION['PaliAdminPanel']['login_fullname']=$LoginRow['login_fullname'];
					$_SESSION['PaliAdminPanel']['login_uname']=$LoginRow['login_uname'];
					$_SESSION['PaliAdminPanel']['login_email']=$LoginRow['login_email'];
					$_SESSION['PaliAdminPanel']['login_phone']=$LoginRow['login_phone'];
					$_SESSION['PaliAdminPanel']['login_img']="";
					if(file_exists('uploads/'.$LoginRow['login_img']) and $LoginRow['login_img']!='')
					{
						$_SESSION['PaliAdminPanel']['login_img']='';
					}
					$location="./dashboard";
					
					if(isset($_REQUEST['error']) and isset($_REQUEST['errormsg']) and isset($_REQUEST['redirect']) and $_REQUEST['error']=='true' and $_REQUEST['errormsg']!='' and $_REQUEST['redirect']!='')
					{
						$location="./".$_REQUEST['redirect'];
					}
					//echojson_encode(array("location"=>$location,"success"=>"200","Token"=>$_SESSION["Token"]));
					$_SESSION['PaliAdminPanel']["loggedin"]="";
					unset($_SESSION["Token"]);
					LoginRedirect('./');
					exit;
				}
				elseif($LoginRow['login_status']=='deactive')
				{
					$arr=[];
					$arr["error"]["Token"]=$_SESSION["Token"];
					$arr["error"]["login_disabled"]="Login disabled by Admin..";
					//echo json_encode($arr);
					exit;
					//echo "<script>alert('Login disabled by Admin.')</script>";
				}
			}
			else
			{
				$arr=[];
				$arr["error"]["Token"]=$_SESSION["Token"];
				$arr["error"]["login_incorrect_details"]="Username or Password is incorrect.";
				echo json_encode($arr);
				exit;
				//echo "<script>alert('Username or Password is incorrect.')</script>";
			}
		}
		exit;
	}
	elseif(isset($_POST['p_title']) and isset($_POST['p_short_desc']) and isset($_POST['p_full_desc']) and isset($_POST['p_features']) and isset($_POST['p_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['p_status']))
		{
			$st="active";
		}
		$concat="";
		if(isset($_POST['p_seo_title']))
		{
			$concat.=", p_seo_title='".addslashes($_REQUEST['p_seo_title'])."'";
		}
		if(isset($_POST['p_seo_desc']))
		{
			$concat.=", p_seo_desc='".addslashes($_REQUEST['p_seo_desc'])."'";
		}
		if(isset($_POST['p_seo_keywords']))
		{
			$concat.=", p_seo_keywords='".addslashes($_REQUEST['p_seo_keywords'])."'";
		}
		if($_POST['p_id_pk']==0)
		{
			$pQry="INSERT INTO products SET pc_id_fk='".addslashes($_REQUEST['pc_id_fk'])."', p_title='".addslashes($_REQUEST['p_title'])."', p_short_desc='".addslashes($_REQUEST['p_short_desc'])."', p_full_desc='".addslashes($_REQUEST['p_full_desc'])."', p_features='".addslashes($_REQUEST['p_features'])."', p_status='".$st."', p_order='".addslashes($_REQUEST['p_order'])."', p_entrydatetime='".date("Y-m-d H:i:s")."'".$concat;
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			$p_id_pk=mysqli_insert_id($con);
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
		}
		elseif($_POST['p_id_pk']>0)
		{
			$pQry="UPDATE products SET pc_id_fk='".addslashes($_REQUEST['pc_id_fk'])."', p_title='".addslashes($_REQUEST['p_title'])."', p_short_desc='".addslashes($_REQUEST['p_short_desc'])."', p_full_desc='".addslashes($_REQUEST['p_full_desc'])."', p_features='".addslashes($_REQUEST['p_features'])."', p_status='".$st."', p_order='".addslashes($_REQUEST['p_order'])."'".$concat." where p_id_pk='".addslashes($_POST['p_id_pk'])."'";
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			$p_id_pk=$_POST['p_id_pk'];
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		if(isset($_FILES["pi_img"]["name"]))
		{
			for($x=0;$x<count($_FILES["pi_img"]["name"]);$x++)
			{
				if(isset($_FILES["pi_img"]['name'][$x]) and $_FILES["pi_img"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('pi_img', $x, '../upload', 'auto', FALSE, '../upload/thumb', '500', '490');
					if($UpImg!=false)
					{
						$piQry="INSERT INTO products_images SET p_id_fk='".addslashes($p_id_pk)."', pi_img='".$UpImg."', pi_status='active' , pi_entrydatetime='".date("Y-m-d H:i:s")."'";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
					}
				}
				
			}
		}
		if($pSql===true)
		{
			LoginRedirect("./products");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['s_id_pk']) and isset($_POST['s_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['s_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["s_image"]["name"]))
		{
			for($x=0;$x<count($_FILES["s_image"]["name"]);$x++)
			{
				if(isset($_FILES["s_image"]['name'][$x]) and $_FILES["s_image"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('s_image', $x, '../upload', 'auto', FALSE, '../upload/thumb', '1920', '730');
					if($UpImg!=false)
					{
						if($_POST['s_id_pk']==0)
						{
							$piQry="INSERT INTO slider SET s_image='".$UpImg."', s_order='".addslashes($_REQUEST['s_order'])."', s_status='".$st."' , s_entrydatetime='".date("Y-m-d H:i:s")."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Added Successfully!';
						}
						elseif($_POST['s_id_pk']>0)
						{
							$piQry="UPDATE slider SET s_image='".$UpImg."', s_order='".addslashes($_REQUEST['s_order'])."', s_status='".$st."' WHERE s_id_pk='".addslashes($_POST['s_id_pk'])."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Updated Successfully!';
						}
					}
				}
				
			}
		}
		
		if($_POST['s_id_pk']>0 and !isset($piSql))
		{
			$piQry="UPDATE slider SET s_order='".addslashes($_REQUEST['s_order'])."', s_status='".$st."' WHERE s_id_pk='".addslashes($_POST['s_id_pk'])."'";
			$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		if(true)
		{
			LoginRedirect("./slider");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['p_id_pk']) and isset($_FILES["pi_images"]["name"]))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['pi_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["pi_images"]["name"]))
		{
			for($x=0;$x<count($_FILES["pi_images"]["name"]);$x++)
			{
				if(isset($_FILES["pi_images"]['name'][$x]) and $_FILES["pi_images"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('pi_images', $x, '../upload', 'auto', FALSE, '../upload/thumb', '500', '490');
					if($UpImg!=false)
					{
						$piQry="INSERT INTO products_images SET pi_img='".$UpImg."', p_id_fk='".addslashes($_REQUEST['p_id_pk'])."', pi_status='".$st."' , pi_entrydatetime='".date("Y-m-d H:i:s")."'";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
						
					
					}
				}
				
			}
		}
		
		if(true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
			LoginRedirect("./products-images&id=".$_POST['p_id_pk']);
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['e_id_pk']) and isset($_FILES["e_image"]["name"]))
	{
		CheckLogin('./');
		$concat="";
		
		if(isset($_FILES["e_image"]["name"]))
		{
			for($x=0;$x<count($_FILES["e_image"]["name"]);$x++)
			{
				if(isset($_FILES["e_image"]['name'][$x]) and $_FILES["e_image"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('e_image', $x, '../upload', 'auto', FALSE, '../upload/thumb', '1100', 'auto');
					if($UpImg!=false)
					{
						mysqli_query($con, "TRUNCATE establishment") or die(mysqli_error($con));
						$piQry="INSERT INTO establishment SET e_image='".$UpImg."'";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
						
					
					}
				}
				
			}
		}
		
		if(true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
			LoginRedirect("./establishment");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['resume_id_pk']) and isset($_FILES["resume_file"]["name"]))
	{
		CheckLogin('./');
		$concat="";
		
		if(isset($_FILES["resume_file"]["name"]))
		{
			for($x=0;$x<count($_FILES["resume_file"]["name"]);$x++)
			{
				if(isset($_FILES["resume_file"]['name'][$x]) and $_FILES["resume_file"]['name'][$x]!='')
				{
					$UpFile=UploadMultipleFiles('resume_file', $x, '../resume', 'auto');
					if($UpFile!=false)
					{
						mysqli_query($con, "DELETE FROM resume WHERE resume_id_pk='".addslashes($_POST['resume_id_pk'])."'") or die(mysqli_error($con));
						$piQry="INSERT INTO resume SET resume_file='".$UpFile."', resume_id_pk='".addslashes($_POST['resume_id_pk'])."'";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
					}
				}
				
			}
		}
		
		if(true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
			LoginRedirect("./resume&id=".$_REQUEST['id']);
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['g_id_pk']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['g_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["g_img"]["name"]))
		{
			for($x=0;$x<count($_FILES["g_img"]["name"]);$x++)
			{
				if(isset($_FILES["g_img"]['name'][$x]) and $_FILES["g_img"]['name'][$x]!='')
				{
					$UpFile=UploadMultipleImages('g_img', $x, '../upload/gallery', 'auto', TRUE, '../upload/gallery/thumb', '800', 'auto');
					if($UpFile!=false)
					{
						$piQry="INSERT INTO gallery SET g_img='".$UpFile."', g_status='".$st."', g_entrydatetime='".date("Y-m-d H:i:s")."', g_order='".addslashes($_REQUEST["g_order"])."'";
						$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
					}
				}
				
			}
		}
		elseif(isset($_POST['g_id_pk']) and $_POST['g_id_pk']>0)
		{
			$piQry="Update gallery SET g_status='".$st."', g_order='".addslashes($_REQUEST["g_order"])."' where g_id_pk='".addslashes($_POST['g_id_pk'])."'";
			$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
			
		}
		
		if(true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
			LoginRedirect("./gallery");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['cl_id_pk']) and isset($_POST['cl_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['cl_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["cl_image"]["name"]))
		{
			for($x=0;$x<count($_FILES["cl_image"]["name"]);$x++)
			{
				if(isset($_FILES["cl_image"]['name'][$x]) and $_FILES["cl_image"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('cl_image', $x, '../upload', 'auto', FALSE, '../upload/thumb', '140', '90');
					if($UpImg!=false)
					{
						if($_POST['cl_id_pk']==0)
						{
							$piQry="INSERT INTO companies_logo SET cl_image='".$UpImg."', cl_order='".addslashes($_REQUEST['cl_order'])."', cl_status='".$st."' , cl_entrydatetime='".date("Y-m-d H:i:s")."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Added Successfully!';
						}
						elseif($_POST['cl_id_pk']>0)
						{
							$piQry="UPDATE companies_logo SET cl_image='".$UpImg."', cl_order='".addslashes($_REQUEST['cl_order'])."', cl_status='".$st."' WHERE cl_id_pk='".addslashes($_POST['cl_id_pk'])."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Updated Successfully!';
						}
					}
				}
				
			}
		}
		
		if($_POST['cl_id_pk']>0 and !isset($piSql))
		{
			$piQry="UPDATE companies_logo SET cl_order='".addslashes($_REQUEST['cl_order'])."', cl_status='".$st."' WHERE cl_id_pk='".addslashes($_POST['cl_id_pk'])."'";
			$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		if(true)
		{
			LoginRedirect("./companies-logo");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['cc_id_pk']) and isset($_POST['cc_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['cc_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["cc_image"]["name"]))
		{
			for($x=0;$x<count($_FILES["cc_image"]["name"]);$x++)
			{
				if(isset($_FILES["cc_image"]['name'][$x]) and $_FILES["cc_image"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('cc_image', $x, '../upload', 'auto', FALSE, '../upload/thumb', '1080', 'auto');
					if($UpImg!=false)
					{
						if($_POST['cc_id_pk']==0)
						{
							$piQry="INSERT INTO company_certificates SET cc_image='".$UpImg."', cc_order='".addslashes($_REQUEST['cc_order'])."', cc_status='".$st."' , cc_entrydatetime='".date("Y-m-d H:i:s")."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Added Successfully!';
						}
						elseif($_POST['cc_id_pk']>0)
						{
							$piQry="UPDATE company_certificates SET cc_image='".$UpImg."', cc_order='".addslashes($_REQUEST['cc_order'])."', cc_status='".$st."' WHERE cc_id_pk='".addslashes($_POST['cc_id_pk'])."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Updated Successfully!';
						}
					}
				}
				
			}
		}
		
		if($_POST['cc_id_pk']>0 and !isset($piSql))
		{
			$piQry="UPDATE company_certificates SET cc_order='".addslashes($_REQUEST['cc_order'])."', cc_status='".$st."' WHERE cc_id_pk='".addslashes($_POST['cc_id_pk'])."'";
			$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		if(true)
		{
			LoginRedirect("./company-certificates");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['cpl_id_pk']) and isset($_POST['cpl_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['cpl_status']))
		{
			$st="active";
		}
		$concat="";
		
		if(isset($_FILES["cpl_image"]["name"]))
		{
			for($x=0;$x<count($_FILES["cpl_image"]["name"]);$x++)
			{
				if(isset($_FILES["cpl_image"]['name'][$x]) and $_FILES["cpl_image"]['name'][$x]!='')
				{
					//echo "aaaa ".UploadSingleImage('pi_img', '../upload', 'auto', TRUE, '../upload/thumb', '200', 'auto');
					$UpImg=UploadMultipleImages('cpl_image', $x, '../upload', 'auto', FALSE, '../upload/thumb', '1920', '755');
					if($UpImg!=false)
					{
						if($_POST['cpl_id_pk']==0)
						{
							$piQry="INSERT INTO about_me_slider SET cpl_image='".$UpImg."', cpl_order='".addslashes($_REQUEST['cpl_order'])."', cpl_status='".$st."' , cpl_entrydatetime='".date("Y-m-d H:i:s")."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Added Successfully!';
						}
						elseif($_POST['cpl_id_pk']>0)
						{
							$piQry="UPDATE about_me_slider SET cpl_image='".$UpImg."', cpl_order='".addslashes($_REQUEST['cpl_order'])."', cpl_status='".$st."' WHERE cpl_id_pk='".addslashes($_POST['cpl_id_pk'])."'";
							$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
							
							$_SESSION['SweetAlert']['type']='success';
							$_SESSION['SweetAlert']['p1']='Success!';
							$_SESSION['SweetAlert']['p2']='Updated Successfully!';
						}
					}
				}
				
			}
		}
		
		if($_POST['cpl_id_pk']>0 and !isset($piSql))
		{
			$piQry="UPDATE about_me_slider SET cpl_order='".addslashes($_REQUEST['cpl_order'])."', cpl_status='".$st."' WHERE cpl_id_pk='".addslashes($_POST['cpl_id_pk'])."'";
			$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		if(true)
		{
			LoginRedirect("./about-me-slider");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['cp_overview']))
	{
		CheckLogin('./');
		
		mysqli_query($con, "TRUNCATE about_me_overview") or die(mysqli_error($con));
		
		$piQry="INSERT INTO about_me_overview SET cp_overview='".addslashes($_REQUEST['cp_overview'])."', cp_entrydatetime='".date("Y-m-d H:i:s")."'";
		$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
		
		$_SESSION['SweetAlert']['type']='success';
		$_SESSION['SweetAlert']['p1']='Success!';
		$_SESSION['SweetAlert']['p2']='Updated Successfully!';
	
		if($piSql==true)
		{
			LoginRedirect("./about-me-content");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['po_overview']))
	{
		CheckLogin('./');
		
		mysqli_query($con, "TRUNCATE products_overview") or die(mysqli_error($con));
		
		$piQry="INSERT INTO products_overview SET po_overview='".addslashes($_REQUEST['po_overview'])."', po_entrydatetime='".date("Y-m-d H:i:s")."'";
		$piSql=mysqli_query($con, $piQry) or die(mysqli_error($con));
		
		$_SESSION['SweetAlert']['type']='success';
		$_SESSION['SweetAlert']['p1']='Success!';
		$_SESSION['SweetAlert']['p2']='Updated Successfully!';
	
		if($piSql==true)
		{
			LoginRedirect("./products-overview");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['cd_type'])and isset($_POST['cd_data']) and isset($_POST['cd_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['cd_status']))
		{
			$st="active";
		}
		$concat="";
		
		if($_POST['cd_id_pk']==0)
		{
			$pQry="INSERT INTO contact_data SET cd_order='".addslashes($_REQUEST['cd_order'])."', cd_type='".addslashes($_REQUEST['cd_type'])."', cd_data='".addslashes($_REQUEST['cd_data'])."', cd_status='".$st."', cd_entrydatetime='".date("Y-m-d H:i:s")."'".$concat;
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
		}
		elseif($_POST['cd_id_pk']>0)
		{
			$pQry="UPDATE contact_data SET cd_order='".addslashes($_REQUEST['cd_order'])."', cd_type='".addslashes($_REQUEST['cd_type'])."', cd_data='".addslashes($_REQUEST['cd_data'])."', cd_status='".$st."'".$concat." where cd_id_pk='".addslashes($_POST['cd_id_pk'])."'";
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		
		if($pSql===true)
		{
			LoginRedirect("./contact-info");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['pc_title'])and isset($_POST['pc_order']))
	{
		CheckLogin('./');
		$st="deactive";
		if(isset($_POST['pc_status']))
		{
			$st="active";
		}
		$concat="";
		
		if($_POST['pc_id_pk']==0)
		{
			$pQry="INSERT INTO products_category SET pc_title='".addslashes($_REQUEST['pc_title'])."', pc_order='".addslashes($_REQUEST['pc_order'])."', pc_status='".$st."', pc_entrydatetime='".date("Y-m-d H:i:s")."'".$concat;
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
		}
		elseif($_POST['pc_id_pk']>0)
		{
			$pQry="UPDATE products_category SET pc_title='".addslashes($_REQUEST['pc_title'])."', pc_order='".addslashes($_REQUEST['pc_order'])."', pc_status='".$st."'".$concat." where pc_id_pk='".addslashes($_POST['pc_id_pk'])."'";
			$pSql=mysqli_query($con, $pQry) or die(mysqli_error($con));
			
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Updated Successfully!';
		}
		
		if($pSql===true)
		{
			LoginRedirect("./products-category");
		}
		exit;
		//htmlspecialchars
	}
	elseif(isset($_POST['changeStatus']))
	{
		
		$data=explode("->",$_REQUEST['changeStatus']);
		$table=$data[0];
		$pri_ky_col=$data[1];
		$pri_ky_val=$data[2];
		$status_col=$data[3];
		$status='active';
		$sql=mysqli_query($con,"select * from ".$table." where ".$pri_ky_col."='".$pri_ky_val."'") or die(mysqli_error($con));
		$row=mysqli_fetch_assoc($sql);
		if($row[$status_col]=='active')
		{
			$status='deactive';
		}
		mysqli_query($con,"update ".$table." set ".$status_col."='".$status."' where ".$pri_ky_col."='".$pri_ky_val."'") or die(mysqli_error($con));
		echo "Status successfully changed to ".$status;
		/************ /
		if($pSql===true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
			LoginRedirect("./products");
		}
		/************/
		exit;
	}
	elseif(isset($_POST['deleteData']))
	{
		
		$data=explode("->",$_REQUEST['deleteData']);
		$table=$data[0];
		$pri_ky_col=$data[1];
		$pri_ky_val=$data[2];
		$img_col=$data[3];
		$img_path=$data[4];
		mysqli_query($con,"delete from ".$table." where ".$pri_ky_col."='".$pri_ky_val."'") or die(mysqli_error($con));
		if(file_exists($img_path) and $img_path!='null')
		{
			unlink($img_path);
		}
		echo $pri_ky_val;
		/************ /
		if($pSql===true)
		{
			$_SESSION['SweetAlert']['type']='success';
			$_SESSION['SweetAlert']['p1']='Success!';
			$_SESSION['SweetAlert']['p2']='Added Successfully!';
			LoginRedirect("./products");
		}
		/************/
		exit;
	}
	exit;
}
elseif(isset($_SESSION["Token"]) and isset($_POST["token"]) and $_POST["token"]!=$_SESSION["Token"])
{
	echo "<script>alert('Someting went wrong, Please close other tabs and reload your page.');</script>";
	exit;
}
?>