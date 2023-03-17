

<style>
 <?php include "admin.css";?>
 </style>
        <div id="sidenav">
        <img class = "nav_img" src = "/food planet/admin/bg_img/nav_img.png ">

        <div id="nav_info">
    
          <span class="admin_info">
            <?php echo $_SESSION['admin_info'];?>
          </span><br>

          <button id="logout"><a href="logout.php"> Logout </a></button>
          </div>

        <ul id = "nav_list">
            <li><a href = "dashboard.php"><i class="bi bi-box-seam"></i> Dashboard</a></li>
            <li><a href = "category.php"><i class="bi bi-tag"></i> Category</a></li>
            <li><a href = "your_food.php"><i class="bi bi-basket-fill"></i> Your Food</a></li>
            <li><a href = "delivery.php"><i class="bi bi-truck"></i> Delivery Boy</a></li></a></li>
            <li><a href = "yourorders.php"><i class="bi bi-basket-fill"></i> Your Orders</a></li>
            <li><a href = "users.php"><i class="bi bi-person"></i> Users</a></li>
            <li><a href = "comments.php"><i class="bi bi-person"></i> Comments</a></li>
            
        </ul>

        </div>