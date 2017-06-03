<?php include('includes/header.php'); ?>
<?php
        $id = $_GET['id'];


       $db = new Database();


        

        //post category
        $query = "SELECT * FROM categories
        			WHERE id =".$id;
        $categories = $db->select($query)->fetch_assoc();
?>

<!--YENILE -->
<?php 

if(isset($_POST['submit'])){
		
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		
		

		if($name == "" ){
			//error mesaji
			$error = "Bütün Xanaları Doldur";
			echo $error;

		} else {
			$query = "UPDATE categories
			            SET name = '$name'
			            WHERE id=" . $id;



			 $update_row = $db->update($query);
		}




	} ?>


	<!--SIL -->
<?php 

if(isset($_POST['delete'])){
		
		
			$query = "DELETE FROM categories
			            WHERE id=" . $id;



			 $delete_row = $db->delete($query);
		}




	?>
	
	<form method="post" action="edit_category.php?id=<?php echo $id;?>">
		  <div class="form-group">
		    <label>Kateqoriya Adı</label>
		    <input name="name" type="text" class="form-control"  placeholder="Adı Daxil Edin" value="<?php echo $categories['name']; ?>">
		  </div>

		  
		  <div style="margin-bottom: 15px;">
		  <input name="submit" type="submit" class="btn btn-default" value="Düzəliş Et">

		  <input name="delete" type="submit" class="btn btn-warning" value="Sil">

		  <a href="index.php" class="btn btn-danger">Ləğv Et</a> 

		  </div>
</form>

<?php include('includes/footer.php'); ?>