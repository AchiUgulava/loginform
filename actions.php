<?php 
// Start session 
session_start(); 
 
// Include and initialize DB class 
require_once 'database.class.php'; 
$db = new DB(); 
 
// Database table name 
$tblName = 'users'; 
 
$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 
$redirectURL = 'index.php'; 
 
// If Add request is submitted 
if(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'add'){ 
    $redirectURL = 'index.php'; 
     
    // Get user's input 
    $postData = $_POST; 
    $firstname = !empty($_POST['sfirstname'])?trim($_POST['sfirstname']):''; 
    $lastname = !empty($_POST['slastname'])?trim($_POST['slastname']):''; 
    $email = !empty($_POST['semail'])?trim($_POST['semail']):'';    

    // Validate form fields 
    if(empty($firstname || $lastname)){ 
        $valErr.='Please enter your full name';
    } 
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
            $valErr .= 'Please enter a valid email '; 
    } 

     
    if(empty($valErr)){ 
        $userData = array( 
            'firstname' => $firstname, 
            'lastname' => $lastname, 
            'email' => $email
        ); 
        $insert = $db->insert($tblName, $userData); 
         
        if($insert){ 
            ?>
            <span class="success alerttext"> Signed up Successfully </span>
            <?php
        }else{ 
            ?>
            <span class="fail alerttext"> Sign up Failed </span>
            <?php
        } 
    }else{ 
        ?>
        <span class="fail"><?=$valErr?></span>
        <?php
    } 

}elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && !empty($_POST['id'])){ 

    $conditions = array('id' => $_POST['id']); 
    $delete = $db->delete($tblName, $conditions); 
    if($delete){ 
        echo 'success'; 
        echo 'User data has been deleted successfully!'; 
        header("Location: userlist.php");
    }else{ 
        echo 'Something went wrong, please try again after some time.'; 
    } 
} 
 
exit;