<?php 

class Database{
	public $host     = DB_HOST;
	public $username = DB_USER;
	public $password = DB_PASS;
	public $db_name  = DB_NAME;

	public $link;
	public $error;

	/*
	* Klasin Konstruktoru
	*/
	public function __construct(){
		//connect funksiyasini cagiriram
		$this->connect();
	}


	/*
	* Elaqelendiren
	*/
	private function connect(){
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
		if(!$this->link){
			$this->error = "Əlaqə Yaradılmadı: " . $this->link->connect_error;
			return false;
		}
	}

	/*
	* Seçən
	*/
	public function select($query){

		$result = $this->link->query($query) or die(    $this->link->error.__LINE__);

		if($result->num_rows > 0){

			return $result;

		} else {

			return false;

		}

	}

	/*
	* Əlavə Edən
	*/

	public function insert($query){
		$insert_row = $this->link->query($query) or die(    $this->link->error.__LINE__);
		if($insert_row){

			header('Location: index.php?msg=' . urldecode("Əlavə Edildi"));
			exit();

		} else {

			die('Error :(' . $this->link->errno .') '.  $this->link->error);

		}
	}


	/*
	* Yenileyen
	*/

	public function update($query){
		$update_row = $this->link->query($query) or die(    $this->link->error.__LINE__);
		if($update_row){

			header('Location: index.php?msg=' . urldecode("Yeniləndi"));
			exit();

		} else {

			die('Error :(' . $this->link->errno .') '.  $this->link->error);

		}
	}


	/*
	* Silen
	*/

	public function delete($query){
		$delete_row = $this->link->query($query) or die(    $this->link->error.__LINE__);
		if($delete_row){

			header('Location: index.php?msg=' . urldecode("Silindi"));
			exit();

		} else {

			die('Error :(' . $this->link->errno .') '.  $this->link->error);

		}
	}

}