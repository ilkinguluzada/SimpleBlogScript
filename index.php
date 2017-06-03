       <?php include("includes/header.php");?>

       <?php

        $db = new Database();


        //post qUery
        $query = "SELECT * FROM posts
                  ORDER BY id DESC";
        $posts = $db->select($query);

        //category query
        $query = "SELECT * FROM categories";
        $categories = $db->select($query);

       ?>



       <?php if($posts) : ?>
          <?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>

           <?php echo shortenText($row['body']); ?>
            

            <a class="davami" href="post.php?id=<?php echo urlencode($row['id']); ?>">Davamını oxu</a>
            
          </div><!-- /.blog-post -->
       <?php endwhile; ?>
       <?php else : ?>

        <p> Heç Bir Post Yoxdur </p>

       <?php endif; ?>

       <?php include("includes/footer.php");?>