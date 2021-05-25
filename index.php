<?php include "includes/db.php"; ?>
    <!-- Header -->
<?php 
include "includes/header.php";
?>
    <!-- Navigation -->
<?php 
include "includes/navigation.php";
?>

<main class="container">
<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">
	
   		 <?php 

			$per_page = 4; //Broj postova po stranici

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}else {
				$page = "";
			}

			if ($page == "" || $page == 1) {
				$page_1 = 0;
			}else{
				$page_1 = ($page * $per_page) - $per_page;
			}

			$post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
			$find_count =  mysqli_query($connection, $post_query_count);
			$count = mysqli_num_rows($find_count);

			if ($count < 1) {
			echo "<h2 class='text-center'>NO AVAILABLE POSTS </h2>";
			}else {

			$count = ceil($count /$per_page);

			$query = "SELECT * FROM posts LIMIT $page_1, $per_page";
			$select_all_posts_query = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author']; 
			$post_date = $row['post_date']; 
			$post_image = $row['post_image']; 
			$post_content = substr($row['post_content'], 0,150); 
			$post_status = $row['post_status'];                   
			
			?>
			  <!-- <h1><?php echo $count; ?></h1> -->
			  <article class="postcard">
		<a class="postcard__img_link" href="post.php?p_id=<?php echo $post_id; ?>">
			<img class="postcard__img" src="images/<?php echo $post_image; ?>" alt="Image Title" />
		</a>
		<div class="postcard__text">
			<h1 class="postcard__title blue"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h1>
			<div class="postcard__subtitle small">
				<time datetime="2020-05-25 12:00:00">
					<i class="fas fa-calendar-alt mr-2"></i><?php echo " " . $post_date; ?>
				</time>
			</div>
			<div class="postcard__bar"></div>
			<div class="postcard__preview-txt"><?php echo $post_content; ?><div>
			<ul class="postcard__tagbox">
				<li class="tag__item play blue">
					<a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><i class="fas fa-play mr-2"></i><?php echo $post_author; ?></a>
				</li>
					<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
				<li class="tag__item play blue">
					<a href="post.php?p_id=<?php echo $post_id; ?>"><i class="fas fa-play mr-2"></i>Read More</a>
				</li>
			</ul>
		</div>
	</article>
	<?php }  } ?>  
	</div>
	  <!-- Blog Sidebar Widgets Column -->
	  <?php 
           include "includes/sidebar.php";
      ?>
      <ul class="pager">
            <?php
                for ($i = 1; $i <= $count  ; $i++) { 

                    if ($i == $page) {
                        echo "<li><a class='active_link' href='index2.php?page={$i}'>{$i}</a></li>";
                    }else {
                        echo "<li><a href='index2.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
        </ul>
 
    <!-- Footer -->
<?php 
include "includes/footer.php";
?>