<?php
session_start();
$_SESSION['type'] = 2;
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
?>
<html>
<head>
  <title>Update</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

</head>
<body>
  <div class="container">


    <form class="form-horizontal" method="get" action="index.php">
        <h2 class="text-center">Update  Here</h2>
      </br>
        <hr>
   <div class="form-group">
     <label for="inputroll" class="col-sm-2 control-label" >Roll Number</label>
     <div class="col-sm-12">
       <input type="number" class="form-control" id="inputid" name="sid" placeholder="Enter Roll Number" required>
     </div>
   </div>
   <div class="form-group">
     <label for="inputbookname" class="col-sm-2 control-label">Student Name</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" pattern="^[a-zA-Z\s]*$" oninvalid="setCustomValidity('Plz enter only Alphabets ')"
    onchange="try{setCustomValidity('')}catch(e){}" id="inputname" name="sname" placeholder="Enter Student Name" required>
     </div>
   </div>
  <div class="form-group">
     <label for="inputdept" class="col-sm-2 control-label">Subject 1</label>
     <div class="col-sm-12">
       <input type="number" max="100" class="form-control" id="inputsub1" name="s1" placeholder="Enter Subject 1 marks" required>
     </div>
   </div>
   <div class="form-group">
      <label for="inputdept" class="col-sm-2 control-label">Subject 2</label>
      <div class="col-sm-12">
        <input type="number" max="100" class="form-control" id="inputsub2" name="s2" placeholder="Enter Subject 2 marks" required>
      </div>
    </div>


   <div class="form-group">
     <div class="text-center col-sm-12" id="btnRegister">
       <button type="submit" name="btnupdate"class="btn btn-primary btn-sx">Update!!</button>
     </div>
   </div>

 </form>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
