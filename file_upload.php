<?php

include("db.php");

$error_count = 0;

$sql = "Insert INTO document(documentTitle, documentGrade) VALUES('".$_POST['title']."',".$_POST['grade'].")";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    //echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    $error_count += 1;
}



   if(isset($_FILES['document'])){
      $errors= array();
      $file_name = $last_id.".pdf";
      $file_size = $_FILES['document']['size'];
      $file_tmp = $_FILES['document']['tmp_name'];
      $file_type = $_FILES['document']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['document']['name'])));
      
      $extensions= array("pdf");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="Extension not allowed, please choose PDF file.";
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         //echo "Success";
      }else{
        $error_count += 1;
      }
   }

   if($error_count >0){
    header('Location: '."portal.php?fail=true");
   }else{
    header('Location: '."download.php?grade=".$_POST['grade']);
   }
?>
