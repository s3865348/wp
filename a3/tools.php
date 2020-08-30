
<?php
  session_start();
// Put your PHP functions and modules here
// Name is valid
    $isInputValid=true;
if (isset($_POST['name'])) {
    if (!preg_match('/[A-Za-z]{1,32}/',$_POST['name'])) {
        $isInputValid=false;
        echo " Name is in an invalid format. Please ensure it uses A-Z characters and is less than 32 characters in length." ;
    }   
}else{
    $isInputValid=false;
    echo "Name is not recorded. Please enter a name.";
}
// Email is valid
if (isset($_POST['email'])) {
    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',$_POST['email'])) {
        $isInputValid=false;
        echo "Error. Email is in an invalid format. Please ensure it is in a format such as xxx@yyy...";           
    }
}
else{
    $isInputValid=false;
    echo "Email is not recorded. Please enter a valid email address.";
}
if (isset($_POST['mobile_num'])) {
    if (!preg_match('/^(\+61){1}[0-9]{1}[0-9]{4}[0-9]{4}$/',$_POST['mobile_num'])) {
        $isInputValid=false;
        echo "Error. Phone is in an invalid format. Please ensure it is in a format such as +61412345678";
    }
}
else{
    $isInputValid=false;
    echo "Mobile Number is not recorded. Please enter a valid mobile phone number.";
}

if (!isset($_POST['comment'])) {                          
$isInputValid=false;
    echo "Please enter a comment to send an email.";
}

if($isInputValid){
    // Write to file
    try
    { 
        $file = fopen("mail.txt","a");

        fputcsv($file, $_POST);

        fclose($file);
        echo "Success. Email sent.";
    } 
    catch(Exception $e) {
        echo "Error. Something went wrong sending the email";
    }
}
?>