<?php
  session_start();
// Put your PHP functions and modules here
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile_num'])&& isset($_POST['comment'])) 
{       
    $file = fopen("/home/sl8/S3865348/public_html/wp/a3/mail.txt","a");
            
    fputcsv($file, $_POST);
    
    fclose($file);
}
?>
