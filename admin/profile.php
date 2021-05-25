 <?php
include "includes/admin_header.php";
?>

<?php

    if(isset($_SESSION['username'])) {

        $username = $_SESSION['username'];
    
        $query = "SELECT * FROm users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);
            
        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

        }
    }

?>

        <?php

            if (isset($_POST['edit_user'])) {
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_role = $_POST['user_role'];

             $user_image = $_FILES['user_image'] ['name'];
             $user_image_temp = $_FILES['user_image'] ['tmp_name'];

                $username = $_POST['username'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
         
             move_uploaded_file($user_image_temp, "../images/$user_image" );

            $query = "UPDATE users SET ";
                    $query .="user_firstname = '{$user_firstname}', ";
                    $query .="user_lastname = '{$user_lastname}', ";
                    $query .="user_role = '{$user_role}', ";
                    $query .="user_image = '{$user_image}', ";
                    $query .="username = '{$username}', ";
                    $query .="user_email = '{$user_email}', ";
                    $query .="user_password = '{$user_password}' ";
                    $query .="WHERE username = '{$username}' ";

                    $edit_user_query = mysqli_query($connection, $query);
                    confirmQuery($edit_user_query);
            }  

        ?>  

    <div id="wrapper">

        <!-- Navigation -->
       
        <?php
        include "includes/admin_navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin panel
                            <small><?php echo $username; ?></small>
                        </h1>
                        
                                        
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Firstname</label>
                        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                    </div>

                    <div class="form-group">
                        <label for="post_status">Lastname</label>
                        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                    </div>

                    <div class="form-group">
                        <select class='btn btn-primary dropdown-toggle' name="user_role" id="">
                        <option value="subscriber"><?php echo $user_role;?></option>
                        <?php
                            if ($user_role == 'admin') {
                                echo "<option value='subscriber'>subscriber</option>";
                            }else {
                                echo "<option value='admin'>admin</option>";
                            }
                        ?>
                        </select>
                    </div>

                   <div class="form-group">	
                        <label for="user_image">User Image</label>
                        
                            <img class="img-responsive left-block" height="300px" width="500px"
                            src="../images/<?php echo $user_image;?>" alt="image">
                        
		            </div> 

                    <div class="form-group">
                        <label for="user_image">User image</label>
                        <input type="file" value="<?php echo $user_image; ?> name="user_image">
                    </div>
                    <div class="form-group">
                        <label for="post_tags">Username</label>
                        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Email</label>
                        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="post_content">Password</label>
                        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                    </div>
                    </form>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php
include "includes/admin_footer.php";
?>