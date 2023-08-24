<?php
 if (isset($_POST['submit']) && isset($_FILES['imageInput'])) 
 {
    include "db_conn.php";
   echo "<pre>";
   print_r($_FILES['imageInput']);
   echo "</pre>";
   $name1 = $_POST['name'];
   $name = strtoupper($name1);
   $codeId = $_POST['codeId'];
   $img_name = $_FILES['imageInput']['name'];
   $img_size = $_FILES['imageInput']['size'];
   $tmp_name = $_FILES['imageInput']['tmp_name'];
   $error =    $_FILES['imageInput']['error']; 

   if ($error === 0)
    {
        if ($img_size > 125000) {
        
	$em = "file too large!" ;
	header("Location: page2.php?error=$em");
     }
   else {
	$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$allowed_exs = array("jpg", "jpeg", "png");
	if (in_array($img_ex_lc, $allowed_exs))
	 {
	      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
              $img_upload_path = 'uploads/'.$new_img_name;
	      move_uploaded_file($tmp_name, $img_upload_path);   

              //INSERT INTO DATABASE
                $sql = "INSERT INTO images (name,codeId,image) VALUES ('$name','$codeId','$new_img_name')";
		mysqli_query($conn, $sql);
		$em = "Entered Sucessfull";
		header("Location: page2.php?error=$em");
                
	}
	else 
	{
		$em = "*You can't upload files of this type";
		header("Location: page2.php?error=$em");
	}
     }
  }
  else 
  {
    $em = "*Unknown Error Occurred!";
    header("Location: page2.php?error=$em");
  }
 }
 else
  {
     header("Location: page2.php");
  }
 
?>