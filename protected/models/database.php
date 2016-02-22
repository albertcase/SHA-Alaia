<?php

class database
{
  private $sql;

  public function __construct(){
    $this->sql = Yii::app()->db;
  }

    public function checkData(array $data=array() , $table){
	$select = array_keys($data);
	$rows = (new \yii\db\Query())
	    ->select($select)
	    ->from($table)
	    ->where($data)
	    ->limit(1)
	    ->all();
	 if($rows)
	    return true;
	 return false;
    }

    public function searchData(array $data=array() ,array $dataout=array(), $table ,$limit = 0){
	$rows = (new \yii\db\Query())
	    ->select($dataout)
	    ->from($table)
	    ->where($data);
	 if($limit > 0)
	    $rows = $rows->limit($limit);
	 $rows = $rows->all();
	 if($rows)
	    return $rows;
	 return false;
    }

    public function insertData(array $data=array(), $table){
	$connection = \Yii::$app->db;
	if(!$this->checkData($data ,$table))
	    return $connection->createCommand()->insert($table, $data)->execute();
	return false;
    }

    public function insertDatas(array $data=array(), $table){
	foreach($data as $x){
	    if($this->checkData($x, $table))
		continue;
	    $this->insertData($x, $table);
	}
	return true;
    }

    public function updateData(array $data=array() ,array $change=array(), $table){
	$connection = \Yii::$app->db;
	if($this->checkData($data ,$table))
	  return $connection->createCommand()->update($table, $change, $data)->execute();
	return false;
    }

    public function delData(array $data=array(), $table){
	$connection = \Yii::$app->db;
	if($this->checkData($data ,$table))
	    return $connection->createCommand()->delete($table, $data)->execute();
	return false;
    }

    public function delDatas(array $data=array(), $table){
	foreach($data as $x){
	    $this->delData($x ,$table);
	}
	return true;
    }
}
