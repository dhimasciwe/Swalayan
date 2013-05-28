<?php
	class Mysql{
		var $db;
		var $host;
		var $user;
		var $password;
		var $database;
		var $query;
		var $result;
		var $row;
		var $dataSet;
		var $numRows;
		
		// function untuk konfigurasi Mysql
		function Mysql($host="localhost",$user="root",$password="",$database="sipmbdb"){
			$this->host=$host;
			$this->user=$user;
			$this->password=$password;
			$this->database=$database;
		}
        // function untuk koneksi ke database
		function connect(){
			$this->db=mysql_connect($this->host,$this->user,$this->password);
			mysql_select_db($this->database,$this->db);
		}
        // function untuk mengeksekusi query mysql
		function execute($query){
			$this->query=$query;
			if($this->result=mysql_query($query,$this->db) ){
				return true;
			} else {
				return false;
			}
		}
        // function mengambil data dalam bentuk array
		function getDataSet(){
			$dataSet=array();
			$i=0;
			while($r=mysql_fetch_row($this->result)){
				$field=0;
				for($field=0;$field<mysql_num_fields($this->result);$field++){
					$dataSet[$i][$field]=$r[$field];
				}
				$i++;
			}
			return $dataSet;
		}
        // function untuk mengambil nomor dari dari baris tertentu
		function getNumRows(){
			$this->numRows=mysql_num_rows($this->result);
			return $this->numRows;
		}
        // function mengakhiri koneksi mysql
		function closeConnection(){
			mysql_close($this->db);
		}
	}
	
?>