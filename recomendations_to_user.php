<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
	session_start();
	
	//$login_id=$_SESSION['mylogin'];

	include("../includes/dbconnect.php");
	
        include '../includes/recommend_user.class.php';
        
echo $_REQUEST['age_id'];
        echo    $_REQUEST['disease_id'];
        ?>
