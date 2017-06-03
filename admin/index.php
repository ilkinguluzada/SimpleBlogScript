<?php include('includes/header.php'); ?>
      
       <?php

        $db = new Database();


        //post qUery
        $query = "SELECT posts.*, categories.name FROM posts
                  INNER JOIN categories
                  ON posts.category = categories.id
                  ORDER BY posts.title DESC";
        $posts = $db->select($query);

        //category query
        $query = "SELECT * FROM categories
        ORDER BY id DESC";
        $categories = $db->select($query);

       ?>


      <!-- Yazilar cedveli -->
        <table class="table table-striped">
          <tr>
            <th>Yazı Nömrəsi</th>
            <th>Yazı Başlığı</th>
            <th>Kateqoriya</th>
            <th>Yazan</th>
            <th>Tarix</th>
          </tr>
          <?php while($row = $posts->fetch_assoc()) : ?>
          <tr>

          
            <td><?php echo $row['id']; ?></td>
            <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo formatDate($row['date']); ?></td>
            
          </tr>
          <?php endwhile; ?>
        </table>

        <!-- Kateqoriya cedveli -->
        <table class="table table-striped">
          <tr>
            <th>Kateqoriya Nömrəsi</th>
            <th>Kateqoriya Adı</th>
          </tr>
          <?php while($row = $categories->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
            
          </tr>
          <?php endwhile; ?>
        </table>




<?php include('includes/footer.php'); ?>
        