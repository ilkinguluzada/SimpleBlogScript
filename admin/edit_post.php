<?php include('includes/header.php'); ?>
<?php
        $id = $_GET['id'];


       $db = new Database();


        //post qUery
        $query = "SELECT * FROM posts WHERE id = " . $id;
        $post = $db->select($query)->fetch_assoc();

        //post category
        $query = "SELECT * FROM categories";
        $categories = $db->select($query);
?>

<?php 


//UPDATE
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
			$query = "UPDATE posts
						SET
						 title = '$title',
						 body = '$body',
						 category = '$category',
						 author = '$author',
						 tags = '$tags'
						 WHERE id = " . $id;



			 $update_row = $db->update($query);
		}




	} 

?>




	<!--SIL -->
<?php 

if(isset($_POST['delete'])){
		
		
			$query = "DELETE FROM posts
			            WHERE id=" . $id;



			 $delete_row = $db->delete($query);
		}




	?>

	
	<form method="post" action="edit_post.php?id=<?php echo $id; ?>">
		  <div class="form-group">
		    <label>Yazı Başlığı</label>
		    <input name="title" type="text" class="form-control"  placeholder="Başlığı Daxil Edin" value="<?php echo $post['title'];?>">
		  </div>

		  <div class="form-group">
		    <label>Yazı</label>
		    <textarea name="body" class="form-control" placeholder="Yazını yaz" ><?php echo $post['body'];?></textarea>

		  <div class="form-group">
		    <label>Kateqoriya</label>
		    <select name="category" class="form-control">

		    <?php while($row = $categories->fetch_assoc()) : ?>


		    	<?php if($row['id'] == $post['category']){
		    		$selected = "selected";
		    	} else{
		    		$selected = "";
		    	}
		    	?>


			  <option <?php echo $selected; ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
			  
			<?php endwhile;?>
			</select>
		  </div>

		  <div class="form-group">
		    <label>Yazıçı</label>
		    <input name="author" type="text" class="form-control"  placeholder="Yazıçı Kimdir?" value="<?php echo $post['author'];?>">
		  </div>

		  <div class="form-group">
		    <label>Teqlər</label>
		    <input name="tags" type="text" class="form-control"  placeholder="Teqlər" value="<?php echo $post['tags'];?>">
		  </div>

		  <input name="submit" type="submit" class="btn btn-default" value="Düzəliş Et">
		  <input name="delete" type="submit" class="btn btn-warning" value="Sil">

		  <a href="index.php" class="btn btn-danger">Ləğv Et</a>
</form>

<?php include('includes/footer.php'); ?>