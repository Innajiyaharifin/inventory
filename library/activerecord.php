<?php
/**
* activerecord adalah class unutk koneksi record
*/	
require 'koneksi.php';

class activerecord extends koneksi
{
	public function query($query)
		{
			$proses = $this->mysqli->query("$query")or die($this->mysqli->error);
			return $proses;
		}
	public function getAll($table)
		{
			$proses=$this->mysqli->query("SELECT * From $table") or die($this->mysqli->error);
			return $proses;
		}	
	public function getInsert($table,$value)
		{
			$proses=$this->mysqli->query("INSERT into $table values ($value)") or die($this->mysqli->error);
			return $proses;
		}
	public function getUpdate($table,$value,$where)
		{
			$proses=$this->mysqli->query("UPDATE $table set $value where $where") or die($this->mysqli->error);
			return $proses;
		}	
	public function getData($table, $field)
	{
		$proses=$this->mysqli->query("SELECT $field FROM $table");
		return $proses;
	}
	public function getWhere($table, $field, $where)
	{
		$proses=$this->mysqli->query("SELECT $field FROM $table where $where")or die($this->mysqli->error);
		return $proses;
	}
	public function getOrder($table,$field,$where,$order, $sort)
	{
		$proses=$this->mysqli->query("SELECT $field from $table where $where order by $order $sort") or die($this->mysqli->error);
		return $proses;
	}
	public function getOrderby($table,$order, $sort)
	{
		$proses=$this->mysqli->query("SELECT * from $table order by $order $sort") or die($this->mysqli->error);
		return $proses;
	}
	public function getLimit($table, $field,$limit)
	{
		$proses=$this->mysqli->query("SELECT $field FROM $table LIMIT $limit") or die($this->mysqli->error);
			return $proses;
	}
//fungsi untuk menghitung jum record yg di panggil
	public function numRows($proses)
	{
		$proses=$proses->num_rows or die($this->mysqli->error);
		return $proses;
	}

	//fungsi ambil data dlm bentuk array
	public function rowArray($param)
	{
		return $param->fetch_array() or die($this->mysqli->error);
		
	}

	//fungsi ambil data dalam bentuk objeck
	public function fetch($param)
	{
		$proses = $param->fetch_object() or die($this->mysqli->error);
		return $proses;
		
	}
	public function error()
	{
		return $proses = $this->mysqli->error;
	}

	public function getDelete($table,$where)
	{
		$proses=$this->mysqli->query("DELETE FROM $table where $where") or die($this->mysqli->error);
			return $proses;
	}
}	