<?php
namespace database;
use PDO;
use PDOException;

class database{
    private $option=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8');
    private $conn;
public function __construct()
{
try{
$this->conn=new PDO("mysql:host=".db_host.";dbname=".db_name,db_username,db_password,$this->option);

}catch (PDOException $e){
echo $e->getMessage();
exit();
}
}


public function select($query,$value=null){
    try{
    $stmt=$this->conn->prepare($query);
    if ($value===null){
        $stmt->execute();
    }else{
        $stmt->execute($value);
    }
    return $stmt;
    }catch (PDOException $e){
        echo $e->getMessage();
        exit();
    }
}

public function create($table,$fields,$values){
    try{
        $query="insert into $table (".implode(", ",$fields).', `created_at`,`updated_at`) values (:'.
            implode(", :",$fields).",now(),now());";

    $stmt=$this->conn->prepare($query);
    $stmt->execute(array_combine($fields,$values));
    return true;
}catch (PDOException $e){
        echo $e->getMessage();
        exit();
    }
}
public function update($table,$fields,$values,$where=null,$id=null){
    try {
     $query="update $table set";
     foreach (array_combine($fields,$values) as $field=>$value){
       if($value===""){
            $query.="`$field`=null ,";
        }else{
           $query.= "`$field`= ?,";
       }
     }
$query.=" updated_at=Now() ";
if ($where!==null){
    $query.="where `$where`=?";
}
$stmt=$this->conn->prepare($query);
if ($id!=null) {

    $result=$stmt->execute(array_merge(array_values($values), [$id]));
}else{
    $result=$stmt->execute(array_filter(array_values($values)));
}

return true;
    }catch (PDOException $e){
echo $e->getMessage();
exit();
}
}
public function delete($tablename,$where,$id){
    $query="delete from $tablename where $where=?";
    $stmt=$this->conn->prepare($query);
    $stmt->execute([$id]);

}



}