<?php
    require 'core/session.php';
    require 'core/config.php';
    include 'core/user_key.php';
    //for session
    $session=$_SESSION['email'];
    $ref = rand (3858558,100000);$error = "";$message = "";$alpha="M y a p p ";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UGBS-ICS</title>
    <link rel="shortcut icon" href="files/img/ico.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    
  </head>
  <body>
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>My Complaints</h2>
    </div>
    <?php require 'nav-profile.php'; ?>
    <div class="animated fadeIn">
      <div class="padd">
        <div class="col-lg-12 text-center">
        <div class="container-fluid table-dark" >
        <table class="table table-striped table-bordered" data-toggle="table" style="text-align: center;">

        <thead style="text-align: center;">
        <tr>
          <th >SUBJECT</th>
          <th >COMPLAIN</th>
          <th >REF NO.</th>
          <th >STATUS</th>
          <th>DATE</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $tbquery = mysql_query("SELECT  `subject`, `complain`, `ref_no`, `status`, `date` FROM `cmp_log` WHERE email ='$session' ");
      while ($arry = mysql_fetch_array($tbquery)) {
          $subject = $arry['subject'];
          $complain = $arry['complain'];
          $ref_no = $arry['ref_no'];
          $status = $arry['status'];
          $date = $arry['date'];

          if($status == 0){
          $status = "Not Processed Yet";
          }
          elseif($status == 1){
          $status = "Pending";
          }
          elseif($status){
          $status = "Done";
          }

      ?>
        


    
        <tr>
          <td><?php echo $subject; ?></td>
          <td><?php echo $complain; ?></td>
          <td><?php echo $ref_no; ?></td>
          <td colspan="1" ><?php echo $status; ?></td>
          <td><?php echo $date;

      } ?></td>
    
        </tr>
      
         
      </tbody>
    </table>
    </div>
        </div>
      </div>
    </div>


      <div class="row" style="position: relative; top: 28rem">
        <div class="col-lg-12 col-12">
          <footer>
            <p>Copyright &copy: <?php echo Date("Y") ?></p>
          </footer>
        </div>
      </div>


    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/materialize-css@1.0.0/dist/js/materialize.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/themes/materialize/bootstrap-table-materialize.min.js"></script>

  </body>
</html>
      