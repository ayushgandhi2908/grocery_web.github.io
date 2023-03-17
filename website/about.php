<?php
  session_start();
if(isset($_SESSION['login'])){
  $user_email = $_SESSION['user_email'];

}

?>
<?php include "partials/_dbconnect.php";?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>About US</title>
    <link rel="stylesheet" href="website.css">
    <style>
    <?php require "website.css";
    ?><?php require "footer.css";
    ?>
    </style>
</head>

<body>
    <?php require "partials/_navbar.php";?>

    <center style="margin-top:20px">
        <h2>About US</h2>

       <img style="width:400px;" src="web_img/food1.jpg" alt=""> 
    </center>
    

    <center>
        <p style="width:900px">Food pLanet are our first placers because they provide you with an astounding variety of
            recipes for almost any food you might be looking for. Founded in 1997, they categorize the recipes according
            to the occasion, method of cooking, ease of cooking, and the time it takes to cook. This makes it simple to
            navigate their site because you just click on a subcategory page to reduce the amount of content you have to
            read that isn’t relevant to your search.

            Food Planet provides excellent food content and has over 60 million monthly unique visitors, it is no wonder
            why they are top of our Top Food Websites. They are also integrated with all major IAB advertising units
            making it ideal for food advertisers.<br><br>
            Subcategorizes its content for ease of filtering. The website reportedly has over 50 million monthly unique
            visitors, while its magazine has over 10 million readers. They also have a section called ‘What We’re Eating
            This Week,’ which could help provide you with ideas if you’re looking for inspiration for an article on your
            brand. <br><br>
            <img style="width:400px;" src="web_img/food2.jpg" alt=""> <br><br>
            One great feature on the Food Network website is their search feature. You might not always have the time to
            enjoy the content on the site or might already have the details you’re searching for figured out. This
            feature offers you a quick way of finding what you are looking for. They also host shows and have video
            episodes that entice viewers to put their recipes – and your products – into action! <br><br>
            Taste of Home provides a variety of recipes as well as videos that could help in building your brand. Their
            seasonal collection is well thought out to give warm suggestions on recipes to try out in the current
            season. In their spotlight collection, you can easily find recipes for the coming holidays.

            Customers can subscribe to the magazine for a fee and rate recipes based on how much they enjoyed them. They
            also publish food-related articles, and videos, organize similar recipes into a collection and give
            recommendations of gift ideas for loved ones. </p>
    </center>


    <?php require "partials/_footer.php";?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>