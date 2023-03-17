<?php
session_start();
include "partials/dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $disc = $_POST['discription'];

    $sql = "INSERT INTO `contact_us` (`name`, `email`, `disc`, `date`)
     VALUES ('$name', '$subject', '$disc', current_timestamp());";
    $result = mysqli_query($conn, $sql);

    if($result){
        
        $contactsend = true;
    
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
include "partials/header.php";
?>

<?php
if(isset($contactsend)){

  echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Your feedback has been send succesfully</strong>
  <a href="contactus.php">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
</div>';
}
?>
<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <form action="" method="post">

        <div class="inputBox">
            <input type="text" placeholder="name" name="name" required>
            <input type="text" placeholder="subject" name="subject" required>
        </div>

        <textarea placeholder="message" name="discription" id="" cols="30" rows="10" required></textarea>

        <input type="submit" value="send message" class="btn" name="contact_btn">

    </form>

</section>

<!-- contact section ends -->



<?php
include "partials/footer.php";
?>






<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

