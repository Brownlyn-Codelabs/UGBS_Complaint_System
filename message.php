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
    <link rel="stylesheet" href="files/css/bootstrap.css">
    <link rel="stylesheet" href="files/css/custom.css">
    <style media="screen">
    table{border: 0px;}
    td{
      padding:10px;
      border-top: 0px solid #eee;
      border-bottom: 0px solid #eee!important;
      padding-left: 0px;
      color:#D2AB66;
    }
    input,button.log{width: 450px;}
    </style>
  </head>
  <body>
    <div class="cover user text-center" style="height:120px;">
      <br>
      <h2>Add Complaints</h2>
    </div>
    <?php require 'nav-profile.php'; ?>
    <div class="animated fadeIn">
      <div class="padd">
        <div class="col-lg-12 text-center">
          <?php
            $query1=mysql_query("SELECT * FROM `circle` WHERE email LIKE '%$session%'");
            while( $arry=mysql_fetch_array($query1) ) {
              $id=$arry['id'];
              $name=$arry['name'];
              $username=$arry['username'];
              $email = $arry['email'];
                 }
                   if(empty($_POST)===false){
                     $phoneno =mysql_real_escape_string($_POST['phoneno']);
                      $cat = mysql_real_escape_string($_POST['category']);
                     $subject = mysql_real_escape_string($_POST['subject']);
                     $complain = mysql_real_escape_string($_POST['complain']);
                     $floor = mysql_real_escape_string($_POST['floor']);
                     $room_no = mysql_real_escape_string($_POST['room_no']);
                     $status = mysql_real_escape_string($_POST['status']);
                      
                     if(empty($phoneno) || empty($cat) || empty($subject) || empty($complain) || empty($floor) || empty($room_no)){
                        $message = "All Fields are required";
                     }elseif (!preg_match("/^[0-9]*$/",$phoneno)) {
                       $error = "Invalid Phone Number";
                     }else{
                       mysql_query("INSERT INTO `cmp_log`(`id`, `user_id`, `name`, `username`, `email`, `phone no`, `category`, `subject`, `complain`, `floor`, `room_no`, `ref_no`, `status`) VALUES ('0','$id','$name','$username','$email','$phoneno', '$cat', '$subject','$complain', '$floor', '$room_no','$ref','$status')") or die(mysql_error());
                       $message = "Your Complain has been Registered";
                       }
                   }
              ?>
          <form class="" method="post" autocomplete="off">
            <div class="container">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <h2>Your Reference no : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ref;
                      echo"<p><span class='error'>".$error."</p></span>";
                      echo "<p><span class='message'>".$message."</p></span>";
                      ?></h2>
                  </div>
              </div>
              <table>
                <tr>
                  <td class="text-left">Your Reference no</td>
                  <td class="text-left"><div class="dis_b"><?php echo $ref;  ?></div></td>
                </tr>

                <?php
                // Use a constant in the format parameter
                echo date(DATE_RFC822) . "<br> <br>" ;

                    ?>
                <tr>
                  <td class="text-left">Your Username</td>
                  <td class="text-left"><div class="dis_b"><?php echo $username;?></div></td>
                </tr>
              

                <tr>
                  <td class="text-left">Your Contact Number *</td>
                  <td><input type = "text" name = "phoneno" maxlength=10 placeholder = "Your Phone number">  </td>
                </tr>

                <tr>
                  <td class="text-left">Category *</td>
                  <td><select maxlength=10 name="category" id="category">
                      <option value="">   -- Select a category --   </option>
                      <option value="Software">Software</option>
                      <option value="Hardware">Hardware</option>
                      <option value="Internet">Internet</option>
                      <option value="Printer">Printer</option>
                      <option value="Other">Other</option>
                      </select> 
                  </td>
                </tr>
                

                
                <tr>
                  <td class="text-left">Your Subject *</td>
                  <td><input type="text" name = "subject" placeholder = "Subject"></td>
                </tr>
                <tr>
                  <td class="text-left">Your Complain *</td>
                  <td><textarea name="complain" rows="8" cols="80" placeholder="Your complain"></textarea></td>
                </tr>

                <tr>
                <td class="text-left">Floor *</td>
                  <td><select maxlength=10 name="floor" id="floor">
                      <option value="">   -- Select Floor --   </option>
                      <option value="Ground Floor">Ground Floor</option>
                      <option value="First Floor">First Floor</option>
                      <option value="Second Floor">Second Floor</option>
                      <option value="Third Floor">Third Floor</option>
                      </select> 
                  </td>
                </tr>

                <tr>
                  <td class="text-left">Your Room Number *</td>
                  <td><input type="text" name = "room_no" placeholder = "Room no"></td>
                </tr>

                
                
                <tr><td></td><td><input type="hidden" name="status" value="0"></td></tr>
                <tr>  
                  <td></td>
                  <td><button type="submit" class="log">Submit</button></td>
                </tr>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
      <footer>
            <br><br>copyright &copy <?php echo date("Y"); ?> <?php echo $web_name; ?>
      </footer>
    <script src="files/js/jquery.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
    <script src="files/js/script.js"></script>
  </body>
</html>
