<!-- header section starts  -->

<header>

    <div class="header-1">

        <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>groco admin panel</a>

        <form action="" class="search-box-container">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form>

    </div>

    <div class="header-2">

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar">
            <a href="index.php">DashBoard</a>
            <a href="products.php">Products</a>
            <a href="order.php">Order</a>
            <a href="category.php">Category</a>
            <a href="users.php">Users</a>

            <?php
            if(isset($_SESSION['admin_login_success'])){
                echo '<a href="logout.php">Logout</a>';
            }
            else{
                echo ' <a href="login.php">Login</a>';
            }
            ?>
           
            
        </nav>
<!-- 
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-user-circle"></a>
        </div> -->

    </div>

</header>

<!-- header section ends -->