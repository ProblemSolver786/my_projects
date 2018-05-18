<?php
ob_start();
    include("includes/dbconnect.php");
    include("includes/registration.class.php");
    
    if(isset($_POST['submit']) && $_POST['submit']=="Register"){
        $username           =   $_POST['username'];
        $password           =   $_POST['password'];
        $vendor_name         =   $_POST['vendor_name'];
        $vendor_address        =   $_POST['vendor_address'];
        $land_phone         =   $_POST['land_phone'];
        $mobile_phone       =   $_POST['mobile_phone'];
        $email_id           =   $_POST['emailid'];
                
        $obj=new registration();
        $obj->vegetableRegistration($login_id, $vendor_name, $vendor_address, $land_phone, $mobile_phone, $email_id, $username, $password);
        $msg="Your Registration was successful";
	header("Location:index.php?msg=$msg");
        
    }
include './common_header.php';?>
					<!-- BEGIN .left-content-sidebar-wrapper -->
					<div class="left-content-sidebar-wrapper">

						<!-- BEGIN .left-content -->
						<div class="left-content">

							<!-- BEGIN .post -->
							<div class="post">

								<div class="main-title-1 custom-font-1">
									<span>New Vegetable Vendors Register Here</span>
								</div>
<!--								<form action="#" class="contact-form">-->
<form method="post" action="vegetable_vendor_registration.php" name="vegetable_vendor_registration" enctype="multipart/form-data" class="contact-form">
									<table>
										<tr>
											<td class="label">Username:</td>
                                                                                        <td><p><input type="text" name="username" placeholder="Enter Username" class="input-text-1" /></p></td>
										</tr>
										<tr><td class="comment-spacer-1" colspan="2"></td></tr>
										<tr>
											<td class="label">Password:</td>
											<td><p><input type="password" name="password" value="" placeholder="Enter Password" class="input-text-1" /></p></td>
										</tr>
										<tr>
											<td class="label">Vendor Name</td>
                                                                                        <td><input type="text" name="vendor_name" value="" placeholder="Enter First Name" class="input-text-1" /></p></td>
										</tr>										
										
										<tr>
											<td class="label">Address:</td>
											<td>
												<textarea name="vendor_address" rows="5" cols="23" placeholder="Your Address *" class="text-area-1"></textarea>
											</td>
										</tr>
                                                                                
                                                                                <tr>
											<td class="label">Land Phone:</td>
											<td><p><input type="text" name="land_phone" value="" placeholder="Enter Land Phone *" class="input-text-1" /></p></td>
										</tr>
                                                                                <tr>
											<td class="label">Mobile Phone:</td>
											<td><p><input type="text" name="mobile_phone" value="" placeholder="Enter Mobile Number *" class="input-text-1" /></p></td>
										</tr>                                                                                
                                                                                
                                                                                <tr>
											<td class="label">Email Id:</td>
                                                                                        <td><p><input type="email" name="emailid" value="" placeholder="Enter Email Id *" class="input-text-1" /></p></td>
										</tr>
                                                                                
										<tr>
											<td></td>
											<td>
                                                                                            <p class="show-all">
                                                                                                    <input type="submit" name="submit" value="Register"   onclick="return vegetableVendorValidation()" class="btn-1 btn-1-color-default">
                                                                                            </p>
                                                                                        </td>
										</tr>
									</table>
								</form>

							<!-- END .post -->
							</div>

						<!-- END .left-content -->
						</div>


						<!-- BEGIN .sidebar -->
						<div class="sidebar">

							<!-- BEGIN .sidebar-item .latest-activity -->
                                                        <a href="login.php">Registered users Login here</a>
                                                        
                                                        <img src="images/updated_images/vendor_2.jpg">
							
						</div>
						
						<div class="clear"></div>


					<!-- END .left-content-sidebar-wrapper -->
					</div>

					<div class="clear"></div>

					<?php include './footer.php';?>

				<!-- END .main-content -->
				</div>

			<!-- END .main-content-wrapper -->
			</div>


		<!-- END .main-body-wrapper -->
		</div>


	<!-- END body -->
	</body>

<!-- END html -->

<!-- Mirrored from botanica.orange-themes.com/html/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Feb 2017 09:19:02 GMT -->
</html>
<script language="javascript" type="text/javascript" src="js/validate_entry.js"></script>