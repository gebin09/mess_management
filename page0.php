<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles_page0.css">
  <title>CodeID Search</title>
</head>
<body>
  <div class="container">
    <div class="left-side">
      <form method="post">
        <input type="text" name="codeId" placeholder="Enter Code ID">
        <button type="submit" name="submitButton">Submit</button>
      </form>
    </div>
    <div class="right-side">
      <?php
      if (isset($_POST['submitButton'])) {
        // Simulated database connection
        include "db_conn.php";
        $conn = new mysqli($sname, $uname, $password, $db_name);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $codeId = $_POST['codeId'];
        $currentDate = date("Y-m-d");
        $query = "SELECT * FROM images WHERE codeId = '$codeId'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          echo '<div class="result-image"><img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '"></div>';
          echo '<div class="result-name">' . $row['name'] . '</div>';

        $checkQuery1 = "SELECT * FROM details WHERE codeId = '$codeId' AND date='$currentDate'";
  	$checkResult1 = $conn->query($checkQuery1);

  	if ($checkResult1->num_rows > 0) {
    	echo '<div class="result-error">Code ID already entered</div>';
 	 } else {       
 

          echo '<div class="result-status">IN</div>';
         	 $currentTime  = date("H:i:s");;                                                  // Capture current date and time
                 $currentDate = date("Y-m-d");
 		 $checkQuery = "INSERT INTO details (codeId,time,date) VALUES ('$codeId','$currentTime','$currentDate')"; //inserting into second database
 		 $checkResult = $conn->query($checkQuery);
		}

        } else {
          echo '<div class="result-error">Code ID not found</div>';
        }

        $conn->close();
      }
      ?>
    </div>
  </div>
</body>
</html>
