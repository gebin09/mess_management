<head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="styles_page3.css">
</head>
<body><center><h1>ENROLLED STUDENT DETAILS</h1></center></body>
<div class="container py-5">
 <div class="row mt-4">
  <?php
   include 'db_conn.php';
   $query = "SELECT * FROM images";
   $query_run = mysqli_query($conn, $query);
   $check_name = mysqli_num_rows($query_run) > 0;
  if($check_name)
   {
      while($row = mysqli_fetch_assoc($query_run))
       {
       ?>
       <div class="col-md-3 mt-3">
       <div class="card">
       <img src="uploads/<?php echo $row['image']; ?>" width="400px" height="200px" alt="Faculty Images">
       <div class="card-body">
       <h4 class="card-title"> <?php echo $row['name']; ?> </h4>
       <h3 class="card-title"> <?php echo $row['codeId']; ?> </h3>
  </div>
 </div>
</div>
<?php
  }
}
else
{
  echo "No Data Found";
}
?>
 </div>
</div>