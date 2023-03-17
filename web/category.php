<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive grocery website design tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php
include "partials/header.php";
?>

<!-- home section starts  

<section class="home" id="home">

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>

    <div class="content">
        <span>fresh and organic</span>
        <h3>your daily need products</h3>
        <a href="#" class="btn">get started</a>
    </div>

</section>

<!-- home section ends -->

<!-- banner section starts  

<section class="banner-container">

    <div class="banner">
        <img src="images/banner-1.jpg" alt="">
        <div class="content">
            <h3>special offer</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">check out</a>
        </div>
    </div>

    <div class="banner">
        <img src="images/banner-2.jpg" alt="">
        <div class="content">
            <h3>limited offer</h3>
            <p>upto 50% off</p>
            <a href="#" class="btn">check out</a>
        </div>
    </div>

</section>

 banner section ends -->

<!-- category section starts  -->

<section class="category" id="category">

    <h1 class="heading">shop by <span>category</span></h1>

    <div class="box-container">

        <div class="box">
            <h3>vegitables</h3>
            <p>upto 50% off</p>
            <img src="images/category-1.png" alt="">
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <h3>juice</h3>
            <p>upto 44% off</p>
            <img src="images/category-2.png" alt="">
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <h3>meat</h3>
            <p>upto 35% off</p>
            <img src="images/category-3.png" alt="">
            <a href="#" class="btn">shop now</a>
        </div>
        <div class="box">
            <h3>fruite</h3>
            <p>upto 12% off</p>
            <img src="images/category-4.png" alt="">
            <a href="#" class="btn">shop now</a>
        </div>

    </div>

</section>
<!-- 
category section ends -->

<!-- product section starts  

<section class="product" id="product">

    <h1 class="heading">latest <span>products</span></h1>

    <div class="box-container">

        <div class="box">
            <span class="discount">-33%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-1.png" alt="">
            <h3>organic banana</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-45%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-2.png" alt="">
            <h3>organic tomato</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-52%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-3.png" alt="">
            <h3>organic orange</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-13%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-4.png" alt="">
            <h3>natural mild</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-20%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-5.png" alt="">
            <h3>organic grapes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-29%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-6.png" alt="">
            <h3>natural almonts</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-55%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-7.png" alt="">
            <h3>organic apple</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-30%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-8.png" alt="">
            <h3>natural butter</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

        <div class="box">
            <span class="discount">-40%</span>
            <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <img src="images/product-9.png" alt="">
            <h3>organic carrot</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"> $10.50 <span> $13.20 </span> </div>
            <div class="quantity">
                <span>quantity : </span>
                <input type="number" min="1" max="1000" value="1">
                <span> /kg </span>
            </div>
            <a href="#" class="btn">add to cart</a>
        </div>

    </div>

</section>

 product section ends -->

<!-- deal section starts  

<section class="deal" id="deal">

    <div class="content">

        <h3 class="title">deal of the day</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam possimus voluptates commodi laudantium! Doloribus sint voluptatibus quaerat sequi suscipit nulla?</p>

        <div class="count-down">
            <div class="box">
                <h3 id="day">00</h3>
                <span>day</span>
            </div>
            <div class="box">
                <h3 id="hour">00</h3>
                <span>hour</span>
            </div>
            <div class="box">
                <h3 id="minute">00</h3>
                <span>minute</span>
            </div>
            <div class="box">
                <h3 id="second">00</h3>
                <span>second</span>
            </div>
        </div>

        <a href="#" class="btn">check the deal</a>

    </div>

</section>

<!-- deal section ends 

<!-- contact section starts  

<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <form action="">

        <div class="inputBox">
            <input type="text" placeholder="name">
            <input type="email" placeholder="email">
        </div>

        <div class="inputBox">
            <input type="number" placeholder="number">
            <input type="text" placeholder="subject">
        </div>

        <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>

        <input type="submit" value="send message" class="btn">

    </form>

</section>

<!-- contact section ends -->

<!-- newsletter section starts  

<section class="newsletter">

    <h3>subscribe us for latest updates</h3>

    <form action="">
        <input class="box" type="email" placeholder="enter your email">
        <input type="submit" value="subscribe" class="btn">
    </form>

</section>

 newsletter section ends -->

<!-- footer section starts --> 

<section class="footer">

    <div class="box-container">

        <div class="box">
            <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>groco</a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam culpa sit enim nesciunt rerum laborum illum quam error ut alias!</p>
            <div class="share">
                <a href="#" class="btn fab fa-facebook-f"></a>
                <a href="#" class="btn fab fa-twitter"></a>
                <a href="#" class="btn fab fa-instagram"></a>
                <a href="#" class="btn fab fa-linkedin"></a>
            </div>
        </div>
        
        <div class="box">
            <h3>our location</h3>
            <div class="links">
                <a href="https://www.bing.com/maps?osid=6ccbb13d-76ca-45d7-870d-6404992fa2cc&cp=23.716623~77.627956&lvl=6&imgid=b0c97124-1b68-415c-a149-b86ba2341e43&v=2&sV=2&form=S00027">india</a>
                <a href="https://www.bing.com/maps?osid=f3fd49b2-21d1-49a9-80fd-81224fa987b9&cp=39.829613~-113.485579&lvl=4.55&pi=0&imgid=91f612d4-e5a7-4973-856f-0bb2c15dffd9&v=2&sV=2&form=S00027">USA</a>
                <a href="https://www.bing.com/maps?osid=67fe63bc-e1ed-43b8-865b-de02325819bc&cp=46.637039~-3.547764&lvl=5.89&pi=0&imgid=784af4ba-d431-4d32-98b2-15b115ba8d7d&v=2&sV=2&form=S00027">france</a>
                <a href="https://www.bing.com/maps?osid=d4b77585-1af0-414a-af55-e4c51e188060&cp=46.637039~-3.547764&lvl=5.89&pi=0&imgid=5bb22d1c-3e64-4864-b674-41ce90fcbb00&v=2&sV=2&form=S00027">japan</a>
                <a href="https://www.bing.com/maps?osid=5c2d0375-74a4-4684-8648-4964495d14f3&cp=63.147749~51.246622&lvl=2.73&pi=0&imgid=d746a9fd-1a56-4d44-8b5e-92fb707f8a23&v=2&sV=2&form=S00027">russia</a>
            </div>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <div class="links">
                <a href="index.html">home</a>
                <a href="category.html">category</a>
                <a href="#">product</a>
                <a href="#">deal</a>
                <a href="#">contact</a>
            </div>
        </div>

        <div class="box">
            <h3>download app</h3>
            <div class="links">
                <a href="#">google play</a>
                <a href="#">window xp</a>
                <a href="#">app store</a>
            </div>
        </div>

    </div>

    <!--<h1 class="credit"> created by <span> mr. web designer </span> | all rights reserved! </h1>-->

</section>

<!-- footer section ends -->



















<!-- custom js file link  -->
<script src="js/script.js"></script>
    
</body>
</html>