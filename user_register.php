<?php
ob_start();
    include("includes/dbconnect.php");
    include("includes/registration.class.php");
    include 'includes/dietition_manage_recommendations.class.php';
    include 'includes/recommend_user.class.php';
    
    if(isset($_POST['submit']) && $_POST['submit']=="Register"){
        $username           =   $_POST['username'];
        $password           =   $_POST['password'];
        $first_name         =   $_POST['first_name'];
        $last_name          =   $_POST['last_name'];
        $txt_address        =   $_POST['txt_address'];
        $city               =   $_POST['city'];
        $state              =   $_POST['state'];
        $country            =   $_POST['country'];
        $zip_code           =   $_POST['zip_code'];
        $land_phone         =   $_POST['land_phone'];
        $mobile_phone       =   $_POST['mobile_phone'];
        $gender             =   $_POST['gender'];
        $email_id           =   $_POST['email_id'];
        $date_of_birth      =   $_POST['date_of_birth'];
        $age_id1          =   $_POST['age_id'];
        $age_group          =   $_POST['age_id'];
        $disease            =   $_POST['disease_id'];
        $disease_id         =   $_POST['disease_id'];
        $disease_id1         =   $_POST['disease_id'];
        
        if($disease_id!="otherDisease"){
            $obj=new registration();
            $obj->userRegistration($login_id, $first_name, $last_name, $txt_address, $city, $state, $country, $zip_code, $email_id, $gender, $land_phone, $mobile_phone,  $date_of_birth, $age_group, $disease, $username, $password);                      
            $msg="Your Registration was successful";
        }
        else if($_POST['disease_id']=="otherDisease"){
            $otherDisease       =   $_POST['otherDisease'];            
            $obj=new registration();
            $obj->insertNewDisease($otherDisease);
            $obj->userRegistration($login_id, $first_name, $last_name, $txt_address, $city, $state, $country, $zip_code, $email_id, $gender, $land_phone, $mobile_phone,  $date_of_birth, $age_group, $otherDisease, $username, $password);
            $msg="You have added a new Disease. Thank you for your contribution. Visit your profile to find you solution";
        }
        else if($_POST['disease_id']=="no"){
            $noDisease  =   $_POST['no'];
            $noDisease  =   "No disease specified or added";
            $obj=new registration();
            $obj->userRegistration($login_id, $first_name, $last_name, $txt_address, $city, $state, $country, $zip_code, $email_id, $gender, $land_phone, $mobile_phone,  $date_of_birth, $age_group, $noDisease, $username, $password);
            $msg="You have specified no disease nor selected one from the list. Thank you Have a nice day";
        }
        else
        {
            echo "Something has gone wrong!";
        }
          
        //header("Location:user_register.php?msg=$msg");
        
  
                $obj=new recommend_user();
            $obj->recommendResult($age_id1, $disease_id1);
            $txt_recommendations    =   $obj->txt_recommendations;
	}
include './common_header.php';?>
					<!-- BEGIN .left-content-sidebar-wrapper -->
					<div class="left-content-sidebar-wrapper">

						<!-- BEGIN .left-content -->
						<div class="left-content">

							<!-- BEGIN .post -->
							<div class="post">

								<div class="main-title-1 custom-font-1">
									<span>New Users Register Here</span>
								</div>
                                                            <center>
                                                                <!--								<form action="#" class="contact-form">-->
<form method="post" action="user_register.php" name="user_register" enctype="multipart/form-data" class="contact-form">
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
											<td class="label">First Name</td>
                                                                                        <td><input type="text" name="first_name" value="" placeholder="Enter First Name" class="input-text-1" /></p></td>
										</tr>										
										<tr>
											<td class="label">Last Name:</td>
											<td><p><input type="text" name="last_name" value="" placeholder="Enter Last Name *" class="input-text-1" /></p></td>
										</tr>										
										<tr>
											<td class="label">Address:</td>
											<td>
												<textarea name="txt_address" rows="5" cols="23" placeholder="Your Address *" class="text-area-1"></textarea>
											</td>
										</tr>
                                                                                <tr>
											<td class="label">City:</td>
											<td><p><input type="text" name="city" value="" placeholder="Enter City *" class="input-text-1" /></p></td>
										</tr>
                                                                                <tr>
											<td class="label">State:</td>
											<td><p><input type="text" name="state" value="" placeholder="Enter State *" class="input-text-1" /></p></td>
										</tr>
                                                                                <tr>
											<td class="label">Country:</td>
											<td><p><input type="text" name="country" value="" placeholder="Enter Country *" class="input-text-1" /></p></td>
										</tr>
                                                                                <tr>
											<td class="label">Zip Code:</td>
											<td><p><input type="text" name="zip_code" value="" placeholder="Enter Zip Code *" class="input-text-1" /></p></td>
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
											<td><p><input type="text" name="email_id" value="" placeholder="Enter Email Id *" class="input-text-1" /></p></td>
										</tr>
                                                                                <tr>
											<td class="label">Gender:</td>
											<td>
                                                                                            <p>
                                                                                                <input type="radio" name="gender" value="Male" placeholder="Enter Gender *">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="gender" value="Female" placeholder="Enter Gender *">Female
                                                                                            </p>
                                                                                        </td>
										</tr>                                                                                
                                                                                <tr>
											<td class="label">Date of Birth:</td>
                                                                                        <td><p><input id="demo1" size="30" type="text" name="date_of_birth" value="" placeholder="Enter Date of Birth *" class="input-text-1" /><a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="images/cal.gif" width="20" height="20" border="0" alt="Pick a date"></a></p></td>
										</tr>
                                                                                <tr>
                                                                                    <td class="label">Select Age</td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $obj=new dietition_manage_recommendations();
                                                                                        $obj->selectAllAge();
                                                                                        $age_id     =   $obj->age_id;
                                                                                        $age_value  =   $obj->age_value;
                                                                                        $countAge   =   count($age_id);
                                                                                    ?>
                                                                                        <select name="age_id" class="input-text-1">
                                                                                        <option value="select_an_option">Select Age</option>
                                                                                        <?php   for($i=0;$i<$countAge;$i++)    { ?>
                                                                                        <option value="<?php echo $age_id[$i];?>"><?php echo $age_value[$i];?></option>
                                                                                        <?php   }     ?>
                                                                                    </select>
                                                                                    </td>
										</tr>
                                                                                <tr>
                                                                                    <td class="label">Diease</td>
                                                                                    <td>
                                                                                        <input type="radio" name="disease_id" id="diseaseYes" class="" value="yes" onclick="hideDisease()">Yes
                                                                                        <?php
                                                                                            $obj=new dietition_manage_recommendations();
                                                                                            $obj->selectAllDisease();
                                                                                            $disease_id     =   $obj->disease_id;
                                                                                            $disease_name   =   $obj->disease_name;
                                                                                            $countDisease   =   count($disease_id);
                                                                                        ?>
                                                                                        <select name="disease_id" id="selectDisease" class="input-text-1" onchange="showfield(this.options[this.selectedIndex].value)">
                                                                                            <option value="select_an_option">Select Disease</option>
                                                                                            <?php   for($j=0;$j<$countDisease;$j++)    { ?>
                                                                                            <option value="<?php echo $disease_id[$j];?>" style="overflow-y: visible;"><?php echo $disease_name[$j];?></option>
                                                                                            <?php   }     ?>
                                                                                            <option value="otherDisease">Other</option>
                                                                                        </select>  
                                                                                        <script type="text/javascript">
                                                                                            function showfield(name){
                                                                                            if(name=='otherDisease')document.getElementById('div1').innerHTML='<input type="text" name="otherDisease" class="input-text-1" />';
                                                                                                else document.getElementById('div1').innerHTML='';
                                                                                            }
                                                                                        </script>
                                                                                        <div id="div1"></div>
                                                                                        <input type="radio" name="disease_id" id="diseaseNo" class="" value="no" onclick="hideDisease()" checked="checked">No
                                                                                    </td>
                                                                                </tr>
										<tr>
											<td></td>
											<td>
                                                                                            <p class="show-all">
                                                                                                <input type="submit" name="submit" onclick="return userValidation()" value="Register" class="btn-1 btn-1-color-default">
                                                                                            </p>
                                                                                        </td>
										</tr>
                                                                                
									</table>    
								</form>
                                                            </center>

							<!-- END .post -->
							</div>

						<!-- END .left-content -->
						</div>


						<!-- BEGIN .sidebar -->
						<div class="sidebar">

							<!-- BEGIN .sidebar-item .latest-activity -->
                            <a href="login.php">Registered users Login here</a>
                                                        
                            <img src="images/updated_images/vendor_1.jpg">
							
						</div>
						
						<div class="clear"></div>

<table>
    <tr><td style="font-family: sans-serif; font-size: medium; text-align: justify;"><?php echo $txt_recommendations;?></td></tr>
    <tr>
        <td>
            <?php   if(!empty($txt_recommendations)){   ?>
            <a href="savnbasket/"><img src="images/red_ordernow.png" style="width: 200px;" /></a>
            <?php   }   ?>
            
        </td>
    </tr>
    </table>
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
<script>
$(document).ready(
    function()
    {
        $("#diseaseYes, #diseaseNo").click(
            function()
            {
                if (this.id == "diseaseNo")
                    $("#selectDisease").hide();
                else
                    $("#selectDisease").show();
            });
    });
</script>
<script language="javascript" type="text/javascript" src="js/datetimepick/datetimepicker.js">

//Date Time Picker script- by Jinu Jose 
//Script featured on JavaScript Kit (http://www.javascriptkit.com)
//For this script, visit http://www.javascriptkit.com 

</script>
<script language="javascript" type="text/javascript" src="js/validate_entry.js"></script>