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
                    </div>
                </div>
                <!-- /.row -->

                <!-- ADMIN WIDGETS -->
                            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">       
                                    
                                       <div class='huge'><?php echo $post_counts = recordCount('posts'); ?></div>
                            
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                <div class='huge'><?php echo $comment_counts = recordCount('comments'); ?></div>

                                <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                <div class='huge'><?php echo $user_counts = recordCount('users'); ?></div>

                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                <div class='huge'><?php echo $category_counts = recordCount('categories'); ?></div>
                                  
                                <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php
            //PUBLISH POSTS
            $post_published_counts = checkStatus('posts', 'post_status', 'published');

            //DRAFT POSTS
            $post_draft_counts = checkStatus('posts', 'post_status', 'draft');

            //UNAPPROVED COMMENTS          
            $unapproved_comment_counts = checkStatus('posts', 'post_status', 'unapproved');

             //SUBSCRIBER USERS            
             $subscriber_counts = checkUserRole('users', 'user_role', 'subscriber');
        ?>


        <div style="background: #ffffff; padding: 20px;" class="row-full">
        <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Data', 'Count'],

            <?php
                $element_text = ['All Posts', 'Active Post', 'Draft Posts', 'Comments', 'Pending Comments ', 'Users', 'Subscribers', 'Categories'];
                $element_count = [$post_counts, $post_published_counts, $post_draft_counts, $comment_counts, $unapproved_comment_counts, $user_counts, $subscriber_counts, $category_counts];

                for ($i=0; $i<8; $i++) { 
                    echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";  // to je ovo ['Posts', 1000],
                }
            ?>

            //['Posts', 1000],
           
            ]);

            var options = {
            chart: {
                title: '',
                subtitle: '',
            }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
    </div> 

        <?php include "includes/admin_footer.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
 Pusher.logToConsole = true;
    $(document).ready(function(){
        var pusher = new Pusher('c637df627a433e696e44', {
             cluster: 'eu',
             encrypted: true
    });
        var notification_Channel = pusher.subscribe('notifications');
        notification_Channel.bind('new_user', function(notification){
            var message = notification.message;

            toastr.success(`${message} just registered`);
        });
    });
</script>

