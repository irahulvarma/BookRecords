<?php
/**
 * Manages DB Connection
 */
namespace BookRecords\DB;

class DBConnection 
{
	
	public $connection;
	
	//initialize connection with database
	function __construct($driver, $host, $username, $password, $database = null)
	{
		$db_string = "";
		if ($database) {
			$db_string = ";dbname=" . $database;
		}
		
		try{
            $this->connection = new \PDO($driver.":host=" . $host . $db_string, $username, $password);
            $this->connection->exec("set names utf8");
            return $this->connection;
        }catch(\PDOException $exception){			
			//throw exception
            echo json_encode(
				array("transaction" => 'failed', 'message' => 'Database Exception')
			);
			die;
        }
		
	}
	
	//execution of query here
	function query($query, $conditions = array(), $assoc = '')
	{		
				
		$stmt = $this->connection->prepare($query);
		$stmt->execute($conditions);
		if($assoc == 'assoc'){
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
		return $stmt->fetchAll();
		
	}
	
	//insertion of record and return row count
	function insertTable($query, $parameters)
	{
		
		$stmt = $this->connection->prepare($query);
		$stmt->execute($parameters);
		return $this->connection->lastInsertId();		
		
	}

	//for execution of create database, tables or others
	function exec($query) 
	{
		return $this->connection->exec($query);
	}
	
}
