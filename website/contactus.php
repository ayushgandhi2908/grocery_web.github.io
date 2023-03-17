<?php include "partials/_dbconnect.php"; ?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <title>Profile</title>
  <link rel="stylesheet" href="website.css">

</head>
<?php include "partials/_navbar.php";?>
<body>

<form action="" method="post">
<div id="contactus_container">
  <h1>Contact Us</h1>
<div id="contactus">

<div class="left_box">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Your Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="uname" placeholder="name@example.com">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" name="uemail" placeholder="name@example.com">
</div>
</div>

<div class="right_box">
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="udisc" rows="5" cols="15"placeholder="Enter Query"></textarea>
</div>
</div>


</div>
<button type="submit" class="btn btn-danger contactusbtn" onclick="submit_query()">Submit</button>

</div>

</form>


<div id="contact_msg_box">

<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-plus-circle" viewBox="0 0 16 16" onclick="msg_box()">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>

<h5>Your Query has been submited</h5>
</div>


<script>

  function msg_box(){
    document.getElementById('contact_msg_box').style.display="none";
  }


</script>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  

  $uname = $_POST['uname'];
  $udisc = $_POST['udisc'];
  $uemail = $_POST['uemail'];

  $sql = "INSERT INTO `contactus` (`name`, `email`, `discription`, `date`) VALUES ('$uname', '$uemail', '$udisc', current_timestamp())";
  $result = mysqli_query($conn, $sql);

  if(isset($result)){
    echo '<script>  function submit_query(){
      document.getElementById("contact_msg_box").style.display="block";
    </script>';
  }

  
}
?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
