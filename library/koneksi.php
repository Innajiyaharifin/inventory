<?php 
/**
 * @author Kelompok 6
 */
 class koneksi
 {
 	//1. properties
 	//2. methode

 	#1. Properties di pemrograman adalah variabel
	Protected $host;
	Protected $username;
	Protected $password;
	Protected $database;
	Protected $mysqli;
 	
 	//metode cara metode itu fungsi
 	//metode 1
 	function __construct()//koding yg dijalankan ketika object dipanggil
 	{
 		require '../config/database.php';

 		$this->host=$host;
 		$this->username=$user;
 		$this->password=$pass;
 		$this->database=$db;
 		$this->mysqli = new mysqli ($this->host, $this->username, $this->password, $this->database);
 		if ($this->mysqli->connect_errno) {
 			printf("koneksi Gagal : %s", $this->mysqli->connect_error);
 			exit();
 		}
 		
 		$this->mysqli->set_charset("utf8");
 	}

 	//metode 2
 	function tutupkoneksi()
 	{

 		$proses=$this->mysqli->close();
 		if ($proses) {
 			echo "Berhasil Ditutup";
 		}
 		else{
 			echo "Gagal Ditutup";
 		}
 	}

 	
 }
//akhir class
// klo undefined property ga ada propertynya
 // jika methode tidak menggunakan () itu artinya sistem mengganggap property bukan metode


 




  ?>



 