<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php 

if (isset($_POST['submit'])) {

    $to = "dejan98vgd@gmail.com";                   //primalac
    $subject = wordwrap($_POST['subject'], 70);     //premet poruke
    $body = $_POST['body'];                         //poruka
    $header = "From: " .$_POST['email'];            //posiljalac

    mail($to, $subject,  $body);


  
}

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class='text-center'>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your subject">
                        </div>
                         <div class="form-group">
                          <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Contact Us">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


