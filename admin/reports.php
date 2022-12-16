<?php
require '../core/session.php';
require '../core/config.php';
require '../core/admin-key.php';
$session_name = $_SESSION['username'];
if (empty($_POST) === false) {
  $subject = mysql_real_escape_string($_POST['subject']);
  $story =  mysql_real_escape_string($_POST['story']);

  if (empty($subject) || empty($story)) {
  } else {
    mysql_query("INSERT INTO `posts` VALUES ('0','$subject','$story','$session_name')") or die(mysql_error());
    $message = "
      <div class='alert succ' id='msg'>
        <div class ='text-right' id='close'>
          <svg class='pointer' fill='#ccc' height='24' viewBox='0 0 24 24' width='24'     xmlns='http://www.w3.org/2000/svg'>
            <path d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z'/>
            <path d='M0 0h24v24H0z' fill='none'/>
          </svg>
          <p class='text-center'>Your post has been Posted</p>
        </div>
      </div>";
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UGBS-ICS</title>
  <link rel="shortcut icon" href="../files/img/ico.ico">
  <link rel="stylesheet" href="../files/css/bootstrap.css">
  <link rel="stylesheet" href="../files/css/custom.css">
  <script src="../files/js/script.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

</head>

<body>


  <?php require 'nav.php'; ?>
  <div class="animated fadeIn">

    <div class="row bg-black">
      <div class=" main col-12 col-lg-12">
        <h1 class="text-center" >REPORTS</h1>

        <p class="text-right">
          <?php echo date("l, d M"); ?>
        </p>

      </div>
    </div>

    <div class="row" style="float:left;  position:relative; overflow-y: auto; max-height:61.3rem; left:23rem; width:90%; ">
      <div class="col-12 col-lg-12 ">

    


        <table class="table  mt-5">
          <thead>
            <tr>
              <th scope="col">
                <h2>Email</h2>
              </th>
              <th scope="col">
                <h2>Category</h2>
              </th>
              <th scope="col">
                <h2>Date</h2>
              </th>
              <th scope="col">
                <h2>View</h2>
              </th>
            
            </tr>
          </thead>
          <?php

$sql = mysql_query("SELECT * FROM `cmp_log` ");
while ($array = mysql_fetch_array($sql)) {
$email = $array['email'];
$category = $array['category'];
$date = $array['date'];

?>
          <tbody>
          <tr>
      <th scope="row"><p> <?php echo $email ?></p></th>
      <td><p><?php echo $category ?></p></td>
      <td><p><?php echo $date ?></p></td>
      <td><a href=""><p> View </p></a></td>
     
      
    </tr>
    <?php }?>
   
     
      
 
 
          </tbody>
        </table>
      </div>
    </div>









    <footer style="position: relative; top: 5rem;">
      <br><br>Copyright &copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
    </footer>

    <script src="../files/js/jquery.js"></script>
    <script src="../files/js/bootstrap.min.js"></script>
    <script src="../files/js/script.js"></script>
    <script>
      $(document).ready(function() {
        $("#close").click(function() {
          $("#msg").remove();
        });
      });
    </script>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
</body>

</html>