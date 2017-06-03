<?php include('includes/header.php'); ?>
<?php 
 //databaza Objecti
 $db = new Database();

if(isset($_POST['submit'])){
		
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$category = $_POST['category'];
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);

		if($title == "" ||  $body=="" || $category == "" || $author=""){
			//error mesaji
			$error = "Bütün Xanaları Doldur";
			echo $error;

		} else {
			$query = "INSERT INTO posts
			            (title, body, category, author)
			            VALUES('$title', '$body', '$category', '$author')";



			 $insert_row = $db->insert($query);
		}




	} 




?>



<?php
       


      


        
        //post category
        $query = "SELECT * FROM categories";
        $categories = $db->select($query);
?>
	
	<form method="post" action="add_post.php">
		  <div class="form-group">
		    <label>Yazı Başlığı</label>
		    <input name="title" type="text" class="form-control"  placeholder="Başlığı Daxil Edin">
		  </div>

		  <div class="form-group">
		    <label>Yazı</label>
		    <textarea name="body" class="form-control" placeholder="Yazını yaz"></textarea>

		  <div class="form-group">
		    <label>Kateqoriya</label>
		    <select name="category" class="form-control">

		    <?php while($row = $categories->fetch_assoc()) : ?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
			<?php endwhile;?>
			</select>
		  </div>

		  <div class="form-group">
		    <label>Yazıçı</label>
		    <input name="author" type="text" class="form-control"  placeholder="Yazıçı Kimdir?">
		  </div>

		  <div class="form-group">
		    <label>Teqlər</label>
		    <input name="tags" type="text" class="form-control"  placeholder="Teqlər">
		  </div>

		  <input name="submit" type="submit" class="btn btn-default" value="Yaz">

		  <a href="index.php" class="btn btn-danger">Ləğv Et</a>
</form>

<?php include('includes/footer.php'); ?>