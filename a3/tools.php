<?php
  session_start();
// Put your PHP functions and modules here
if (isset($_POST['contactsubmit'])){

    // Name is valid
        $isInputValid=true;
    $name="";
    if (isset($_POST['name'])) {
    
        $name = rtrim(preg_replace(['/[^[:print:]\n]/','/( +\n)/'],['',"\n"],$_POST['name']));
        if (!preg_match('/[A-Za-z]{1,32}/',$name)) {
            $isInputValid=false;
            echo " Name is in an invalid format. Please ensure it uses A-Z characters and is less than 32 characters in length." ;
        }   
    }else{
        $isInputValid=false;
        echo "Name is not recorded. Please enter a name.";
    }
    // Email is valid
    $email="";
    if (isset($_POST['email'])) {
        $email = rtrim(preg_replace(['/[^[:print:]\n]/','/( +\n)/'],['',"\n"],$_POST['email']));
        if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',$_POST['email'])) {
            $isInputValid=false;
            echo "Error. Email is in an invalid format. Please ensure it is in a format such as xxx@yyy...";           
        }
    }
    else{
        $isInputValid=false;
        echo "Email is not recorded. Please enter a valid email address.";
    }
    $mobile_num="";
    if (isset($_POST['mobile_num'])) {
        $mobile_num = rtrim(preg_replace(['/[^[:print:]\n]/','/( +\n)/'],['',"\n"],$_POST['mobile_num']));
        if (!preg_match('/^(\+61){1}[0-9]{1}[0-9]{4}[0-9]{4}$/',$_POST['mobile_num'])) {
            $isInputValid=false;
            echo "Error. Phone is in an invalid format. Please ensure it is in a format such as +61412345678";
        }
    }
    else{
        $isInputValid=false;
        echo "Mobile Number is not recorded. Please enter a valid mobile phone number.";
    }
$comment="";
    if (!isset($_POST['comment'])) {                          
    $isInputValid=false;
        
        echo "Please enter a comment to send an email.";
    }
else {
    $comment = rtrim(preg_replace(['/[^[:print:]\n]/','/( +\n)/'],['',"\n"],$_POST['comment']));
    
}
    if($isInputValid){
        // Write to file
        try
        { 
            $file = fopen("mail.txt","a"); 
            $parsedpost = array($name, $email, $mobile_num,$comment);
            fputcsv($file, $parsedpost);

            fclose($file);
            echo "Success. Email sent.";
        } 
        catch(Exception $e) {
            echo "Error. Something went wrong sending the email";
        }
    }
}
?>