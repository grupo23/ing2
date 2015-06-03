<?php
Class Database extends PDO 
{
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
	}
	/**
	*@param String $sql la consulta
	*@param Array $array parametros para hacer el Bind
	*@param constant $fetchMode el fetch mode de PDO
	*@return mixed
	*/
	
	public function select($sql, $array = array(),$fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
		foreach ($array as $key => $value)
		{
			$sth->bindValue("$key",$value);
		}
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	//$sql = "select * from usuario WHERE id = :id"; $array = array('id'=>$id);
	/**
	*@param String $table
	*@param Array $data arreglo de strings asociativo
	*/
	
	public function insert($table, $data)
	{
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$filedValues = ':' . implode(', :', array_keys($data));

		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($filedValues)");

		foreach ($data as $key => $value)
		{
			$sth->bindValue(":$key",$value);
		}
		return $sth->execute();
	}
	/**
	*
	*@param String $table Nombre de la tabla
	*@param Array $data arreglo de strings asociativo
	*@param String $where condicion WHERE de la consulta
	*/
	public function update($table,$data,$where)
	{

		ksort($data);
		$fieldDetails = NULL;
		foreach ($data as $key => $values)
		{
			$fieldDetails .= "$key=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
		foreach($data as $key => $value)
		{
			$sth->bindValue(":$key", $value);
		}
		return $sth->execute(); 
	}
	/**
	*@param String $table Nombre de la tabla
	*@param String $where condicion WHERE de la consulta
	*@param String $key la columna a usar en la condicion
	*@param String $dato el valor a comparar
	*@param String $limit limite
	*@return mixed
	*/
	public function delete($table, $where, $key, $dato, $limit=1)
	{
		$sth = $this->prepare("DELETE FROM $table WHERE $where");
		$sth->bindValue(':$key',$dato);
		return $sth->execute();
	}
}
?>