<?php
session_start();
$alert = -1;
if(isset($_GET['regbtn'])){
    $sid = (int)$_GET['sid'];
    $sname = $_GET['sname'];

    $s1 = (int)$_GET['s1'];
    $s2 = (int)$_GET['s2'];
    $dbusername = 'root';
    $dbpassword = '';



    $mysqli = new mysqli('localhost','root','','student');

    /* check connection */
    if($mysqli->connect_errno){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    $total = $s1+$s2;
    $insert_row ="INSERT INTO stud(sid, sname, s1, s2,total) VALUES ('".$sid."','".$sname."','".$s1."','".$s2."','".$total."');";
    if($mysqli->query($insert_row)===true){
        // echo "Insert Successfully";
        $alert = 1;
    }
    else{
        // echo "Error";
        $alert = 0;
    }
    $_SESSION['type']=0;
    $mysqli->close();
}
if(isset($_GET['btnupdt'])){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "student";
  $sid = $_GET['sid'];
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM stud where sid = $sid";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
          $sid=$row["sid"];
          $sname =  $row["sname"];
          $s1 = $row["s1"];
          $s2 = $row["s2"];
  } else {
      echo "0 results";
  }
  $conn->close();
}
if(isset($_GET['update'])){
     $sid = $_GET['sid'];
     $sname = $_GET['sname'];

     $s1 = $_GET['s1'];
     $s2 = $_GET['s2'];
     $dbusername = 'root';
     $dbpassword = '';



     $mysqli = new mysqli('localhost','root','','student');

     /* check connection */
     if($mysqli->connect_errno){
         die('Unable to connect to database [' . $mysqli->connect_error . ']');
     }
     $total = $s1+$s2;
     $update_row ="update stud SET sid='$sid',sname='$sname',s1='$s1',s2='$s2',total='$total' WHERE sid = '$sid';";
     if($mysqli->query($update_row)===true){
        $alert = 2;
     }
     else{
        $alert = 0;
     }
     $_SESSION['type']=0;
     $mysqli->close();
}
if(isset($_GET['btnDelete'])){
   $sid = $_GET['sid'];
   $dbusername = 'root';
   $dbpassword = '';



   $mysqli = new mysqli('localhost','root','','student');

   if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // sql to delete a record
  $sql = "DELETE FROM stud WHERE sid=$sid";

if ($mysqli->query($sql) === TRUE) {
    $alert = 3;
} else {
    $alert = 0;
}

$mysqli->close();

}



?>

<html>
<head>
  <title>Display</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <style type="text/css">
  .form-horizontal, .control-label{
          text-align: left;
      }

     .pagination{
        justify-content: center;
        align-items: center;
      }
      .pagination a {

          color: black;
          align-self: center;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
          transition: background-color .3s;
        }

      .pagination a.active {
          background-color: #4CAF50;
          color: white;
      }

      .pagination a:hover:not(.active) {background-color: #dddddd;}
  </style>
</head>
<body>
  <?php
    $dbusername = 'root';
    $dbpassword = '';
    if($alert==0)
        echo '<div class="container"><div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Unsucessful!</strong> Please try again.
          </div></div>';
    else if($alert==1)
    echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <strong>Success!</strong> Registered Successfully.
          </div></div>';
    elseif ($alert==2) {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> Updated Successfully.
            </div></div>';
    }
    elseif ($alert==3) {
      echo '<div class="container"><div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> Deleted Successfully.
            </div></div>';
    }
    $bool=0;
    $mysqli = new mysqli('localhost', 'root', '','student');



    /* check connection */
    if($mysqli->connect_errno){
        die('Unable to connect to database [' . $mysqli->connect_error . ']');
    }

    $limit = 5;
    if(isset($_GET['page'])){ $page  = $_GET['page']; }
    else { $page=1; }
    $start_from = ($page-1) * $limit;
    $sql = "SELECT * FROM stud ORDER BY sid ASC LIMIT $start_from, $limit";
    $rs_result = mysqli_query($mysqli,$sql);

    if ($rs_result->num_rows > 0) {
        $bool=1;
        // output data of each row
        /*while($row = $result->fetch_assoc()) {
            echo $row["accno"]. "  " . $row["bname"]. " " . $row["author"]. " " .$row["edition"]. "<br>";
        }*/
    } else {
        $bool=2;
    }
    $mysqli->close();
?>
      <?php
              if($bool==1){
      echo '<div class="container">
              <table class="table table-hover table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>Student Roll</th>
              <th>Student Name</th>
              <th>Subject 1</th>
              <th>Subject 2</th>
              <th>Total</th>
              <th></th>
              <th></th>
            </tr>
          </thead>';
          echo '<tbody>';
                $i=1;
                $dbusername = 'root';
                $dbpassword = '';

                $mysqli = new mysqli('localhost','root','','student');

                /* check connection */
                if($mysqli->connect_errno){
                    die('Unable to connect to database [' . $mysqli->connect_error . ']');
                }



                while($row = $rs_result->fetch_assoc()) {


                echo '<tr>
                  <td>'.$row["sid"].'</td>
                  <td>'.$row["sname"].'</td>
                  <td>'.$row["s1"].'</td>
                  <td>'.$row["s2"].'</td>
                  <td>'.$row["total"].'</td>
                  <td><form action = "update.php" id="myform"> <input type="hidden" name="sid" value="'.$row["sid"].'"/>
                  <input class="btn btn-primary" name ="btnupdt" type="submit" value=" Edit "/></form>
                  </td>
                  <td><form  action = "index.php"> <input type="hidden" name="sid" value="'.$row["sid"].'"/>
                  <button name="btnDelete" onclick="clicked(event)" class="btn btn-primary" type="submit">Delete</button></form>
                  </td>
                </tr>';
                    $i=$i+1;
              }


          echo '</tbody>
        </table>
      </div>';
              }
              $sql = "SELECT COUNT(sid) FROM stud";
          $rs_result = mysqli_query($mysqli,$sql);
          $row = mysqli_fetch_row($rs_result);
          $total_records = $row[0];
          $total_pages = ceil($total_records / $limit);
          $pagLink = "<br/><br/><hr><div class=\"text-center\"><div class=\"pagination\">  <a href='index.php?page=1'>&laquo;</a>";
          for ($i=1; $i<=$total_pages; $i++) {
            $active = $i == $page ? 'class="active"' : '';
                       $pagLink .= "<a $active href='index.php?page=".$i."'>".$i."</a>";
          }
          $i = $i-1;
          echo $pagLink . "<a  href='index.php?page=".$i."'>&raquo;</a></div></div>";
    ?>
    <?php

?>
    <hr>
  </br>
<div class="text-center col-sm-12">
  <button class="btn btn-primary" data-toggle="modal" data-target="#regmodal">Register</button>

<div class="modal fade bd-example-modal-lg" id="regmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="container">


    <form class="form-horizontal" method="get" action="index.php">
        <h2 class="text-center">Register  Here</h2>
      </br>
        <hr>
   <div class="form-group">
     <label for="inputroll" class="col-sm-4 control-label" >Roll Number</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="inputEmail3" name="sid" placeholder="Enter Roll Number" required>
     </div>
   </div>
   <div class="form-group">
     <label for="inputbookname"  class="col-sm-4 control-label">Student Name</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="inputPassword3" pattern="^[a-zA-Z\s]*$" oninvalid="setCustomValidity('Plz enter only Alphabets ')"
    onchange="try{setCustomValidity('')}catch(e){}" name="sname" placeholder="Enter Student Name" required>
     </div>
   </div>
  <div class="form-group">
     <label for="inputdept" class="col-sm-4 control-label">Subject 1</label>
     <div class="col-sm-12">
       <input type="number" max="100"class="form-control" id="inputPassword3" name="s1" placeholder="Enter Subject 1 marks" required>
     </div>
   </div>
   <div class="form-group">
      <label for="inputdept" class="col-sm-4 control-label">Subject 2</label>
      <div class="col-sm-12">
        <input type="number"  max="100"class="form-control" id="inputPassword3" name="s2" placeholder="Enter Subject 2 marks" required>
      </div>
    </div>

</div>

</div>
<div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

        <input type="submit" class="btn btn-primary" value="Register" name="regbtn"/>
      </form>

      </div>
</div>
</div>
  </div>
  <script>
      var sid = "<?php echo $sid ?>";
      var sname = "<?php echo $sname ?>";
      var s1 = "<?php echo $s1 ?>";
      var s2 = "<?php echo $s2 ?>";
      document.getElementById("inputid").value = sid;
      document.getElementById("inputname").value = sname;
      document.getElementById("inputsub1").value = s1;
      document.getElementById("inputsub2").value = s2;
    </script>


    <script>
    function clicked(e)
    {
      if(!confirm('Are you sure?'))e.preventDefault();
    }
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
		<script src="js/datatables/datatables.js"></script>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  </body>
</html>
