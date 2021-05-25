<?php
    if(ifItIsMethod('post')){

        if (isset($_POST['login'])) {
            if(isset($_POST['username']) && isset($_POST['password'])){
                login_user($_POST['username'], $_POST['password']);
            }else {
                location('index.php');
            }
        }
    }
?>

<div class="col-md-4">

<!-- Blog Search Well -->
<div id="well-container1">
    <div class="well">
        <h4>Blog Search</h4>
        <form action="./search.php" method="POST" autocomplete="off">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form> 
    </div>

    <!-- Login -->
    <div class="well">

        <?php if(isset($_SESSION['user_role'])): ?>
            <h4>Logged in as: <span class="badge bg-primary"><?php echo $_SESSION['username'] ?></span></h4>
            <a href="includes/logout.php" class='btn btn-primary'>Logout</a>

        <?php else: ?>
            <h4>Login</h4>
            <form  method="POST" autocomplete="on">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password">
            </div>
            <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit</button>
            </span>
            <div class="form-group">
                <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
            </div>
            </form> 

        <?php endif; ?> 

    </div>
    
    <div class="well">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection, $query);
            ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                <?php
                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                ?>
                </ul>
            </div>
            <!-- <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    </div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>

</div>

</div>

<style>
 #well-container1{
  width:23%;  
  position: -webkit-sticky;
  position: fixed;
  top: 10;
}
</style> 