<?php 
include "DB.php";
class DataOperation extends Database{
	
    public function insert_data($table,$fileds){
    	$sql = "";
    	$sql .= "INSERT INTO ".$table;
    	$sql .= " (".implode(",",array_keys($fileds)).") VALUES";
    	$sql .= "('".implode("','",array_values($fileds))."')";
    	$query = $this->dbconn->query($sql);
    	if ($query) {
    		return true;
    	}
    }

    public function fetch_record($table){
    	$sql = "SELECT * FROM ".$table;
    	$array  = [];
    	$query  = $this->dbconn->query($sql);
    	while ($row = $query->fetch_assoc()) {
    	    $array[] = $row;
    	}
    	return $array;
    }

    public function select_record($table,$where){
    	$sql = "";
    	$condition = "";
    	foreach ($where as $key => $value) {
    		$condition .= $key . "='" .$value. "' AND ";
    	}
    	$condition = substr($condition,0,-5);
    	$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
    	$query  = $this->dbconn->query($sql);
    	$row = $query->fetch_assoc();
    	return $row;
    }

    public function update_data($table,$where,$fields){
    	$sql = "";
    	$condition = "";
    	foreach ($where as $key => $value) {
    		$condition .= $key . "='" .$value. "' AND ";
    	}
    	$condition = substr($condition,0,-5);
    	foreach ($fields as $key => $value) {
    		$sql .= $key ."='".$value."' , ";
    	}
    	$sql = substr($sql,0,-2);
    	echo $sql ="UPDATE ".$table." SET ".$sql." WHERE ".$condition;
    	if ($query  = $this->dbconn->query($sql)) {
    		return true;
    	}
    }

    public function delete_data($table,$where){
    	$sql = "";
    	$condition = "";
    	foreach ($where as $key => $value) {
    		$condition .= $key . "='" .$value. "' AND ";
    	}
    	$condition = substr($condition,0,-5);
    	echo $sql = "DELETE FROM " .$table." WHERE ".$condition;
    	if ($query  = $this->dbconn->query($sql)) {
    		return true;
    	}

    }
}


$obj = new DataOperation();


if (isset($_POST['submit'])) {
	$array = [
		"name" => $_POST['medicine'],
		"qty" => $_POST['qty']
	];
	if ($obj->insert_data("medicine",$array)) {
		header("Location: ../index.php?msg=Success");
	}

}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$where = ['id'=>$id];
	$array = [
		"name" => $_POST['medicine'],
		"qty" => $_POST['qty']
	];
	if ($obj->update_data("medicine",$where,$array)) {
		header("Location: ../index.php?umsg=Success");
	}

}

if (isset($_GET['delete'])) {
	$id = $_GET['id'] ?? null;
	$where = ["id"=>$id];
	if ($obj->delete_data("medicine",$where)) {
		header("Location: index.php?dmsg=Success");
	}

}



?>