<?php include('includes/header.php'); ?>
<?php 
 //databaza Objecti
 $db = new Database();

if(isset($_POST['submit'])){
		
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		
		

		if($name == "" ){
			//error mesaji
			$error = "Bütün Xanaları Doldur";
			echo $error;

		} else {
			$query = "INSERT INTO categories
			            (name)
			            VALUES('$name')";



			 $update_row = $db->update($query);
		}




	} 




?>
	
	<form method="post" action="add_category.php">
		  <div class="form-group">
		    <label>Kateqoriya Adı</label>
		    <input name="name" type="text" class="form-control"  placeholder="Adı Daxil Edin">
		  </div>

		  
		  <div style="margin-bottom: 15px;">
		  <input name="submit" type="submit" class="btn btn-default" value="Yaz">

		  <a href="index.php" class="btn btn-danger">Ləğv Et</a> 

		  </div>
</form>

<?php include('includes/footer.php'); ?>