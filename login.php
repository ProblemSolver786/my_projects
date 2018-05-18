<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
    session_start();
    
    include("includes/dbconnect.php");
    include("includes/login.class.php");
    
if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
{   
    $username=$_POST['username'];
    $password=$_GET['password'];
    $obj=new mainLogin();
    $obj->login($username,$password);
	
	$login_id	=$obj->login_id;
	$username	=$obj->username;
	$password	=$obj->password;
	$role		=$obj->role;
	$status		=$obj->status;
	
	if(($role=="Administrator")&&($status=='1'))
	{
		$_SESSION['mylogin']=$login_id;		
		$msg="Welcome to Administrator Portal";
		header("Location:admin/admin_home.php?msg=$msg");
		exit();
	}
	else if($role=="User")
	{
		$_SESSION['mylogin']=$login_id;		
		$msg="Welcome to User Portal";
		header("Location:user/user_home.php?msg=$msg");
		exit();
	}
        else if($role=="Vegetable Vendors")
	{
		$_SESSION['mylogin']=$login_id;		
		$msg="Welcome to Vegetable Vendor Portal";
		header("Location:vegetable_vendors/vegetable_vendor_home.php?msg=$msg");
		exit();
	}
        else if($role=="Fruit Vendors")
	{
		$_SESSION['mylogin']=$login_id;		
		$msg="Welcome to Fruit Vendor Portal";
		header("Location:fruit_vendors/fruit_vendor_home.php?msg=$msg");
		exit();
	}
        else if($role=="Dietitian")
        {
            	$_SESSION['mylogin']=$login_id;		
		$msg="Welcome to Dietitian Portal";
		header("Location:dietitian/dietitian_home.php?msg=$msg");
		exit();
        }
	else
	{
		$msg="Invalid Login attempt";
                header("Location:invalid.php?msg=$msg");
	}
}
include './common_header.php';
?>
<div class="sidebar-item">
								<div class="latest-activity">
									<div class="main-title-1 custom-font-1">
										<span>Registered users Login here</span>
									</div>
									<!-- BEGIN .tabs-1 -->
									<div class="tabs-1 custom-font-1">
									<!-- END .tabs-1 -->
									</div>
									<!-- BEGIN .list -->
									<div class="list">
										<!-- BEGIN .item -->
										<div class="item">
                                                                                    <form method="post" action="login.php" name="login" class="contact-form">
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td class="label">Username:</td>
                                                                                                <td><input type="text" name="username" class="input-text-1"></td><td style="line-height: 28px;">Username length: 5 to 15 characters maximum long</td>
                                                                                            </tr>
                                                                                            <tr><td class="comment-spacer-1" colspan="2"></td></tr>
                                                                                            <tr>
                                                                                                <td class="label">Password:</td>
                                                                                                <td><input type="password" name="password" class="input-text-1"></td><td style="line-height: 28px;">Password length: 4 to 8 characters maximum long</td>
                                                                                            </tr>
                                                                                            <tr><td class="comment-spacer-1" colspan="2"></td></tr>
                                                                                            <tr>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><input type="submit" name="submit" value="Login" onclick="return loginValidation()" class="btn-1 btn-1-color-default"></td>
                                                                                            </tr>
                                                                                        </table>                    	
                                                                                    </form>
										</div>
                                                                                
									</div>
								</div>
                                                                <div class="sidebar">
                                                                    <img src="images/updated_images/login_updated.jpg">
                                                                </div>
							<!-- END .sidebar-item .latest-activity -->
							</div>
<?php include './footer.php';?><script language="javascript" type="text/javascript" src="js/validate_entry.js"></script>