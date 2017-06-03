
       <?php include("includes/header.php");?>
<?php
        $id = $_GET['id'];


       $db = new Database();


        //post qUery
        $query = "SELECT * FROM posts WHERE id = " . $id;
        $posts = $db->select($query);

        //post category
        $query = "SELECT * FROM categories";
        $categories = $db->select($query);
?>

 <?php if($posts) : ?>
          <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>

           <?php echo $row['body']; ?>
            

          
            
          </div><!-- /.blog-post -->
       <?php endwhile; ?>
       <?php else : ?>

        <p> Heç Bir Post Yoxdur </p>

       <?php endif; ?>

       <?php include("includes/footer.php");?>