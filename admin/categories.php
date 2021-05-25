<?php
include "includes/admin_header.php";
?>

<body>

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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>


                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                        <!-- UPDATE AND INCLUDE QUERY -->
                        
                        <?php updateAndInclude() ?>
                         
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                        <!-- FIND ALL CATEGORIES QUERY -->
                                    
                               <?php findAllCategories(); ?>
                                
                        <!-- DELETE QUERY   -->

                                <?php delete_categories(); ?>
                                                     
                                </tbody>
                            </table>
                        </div>

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