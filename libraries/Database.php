<?php
class Database{
  public $host=DB_HOST;
  public $username=DB_USER;
  public $password=DB_PASS;
  public $db_name=DB_NAME;
  public $link;
  public $error;
  //build constructor
  public function __construct()
      {
          $this->connect();
      }
//connect to database
  private function connect(){
    $this->link = new PDO('mysql:host=localhost;port=3306;dbname=blog', "root", "");
    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
public function select($query){
  $stmt=$this->link->prepare($query);
  $stmt->execute();
  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $row;
}
public function select2($query,$id){
  $stmt=$this->link->prepare($query);
  $stmt->execute(array(":id"=>$id));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
}
public function select3($query,$id){
  $stmt=$this->link->prepare($query);
  $stmt->execute(array(":id"=>$id));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
}
public function insert($query,$category,$title,$body,$author,$tag){
$stmt=$this->link->prepare($query);
$stmt->execute(array(
  ":category"=>$category,
  ":title"=>$title,
  ":body"=>$body,
  ":author"=>$author,
  ":tags"=>$tag
));

return $stmt->rowcount();
}
public function category($query,$name){
$stmt=$this->link->prepare($query);
$stmt->execute(array(
  ":name"=>$name
));
return $stmt->rowcount();
}


public function update($query,$category,$title,$body,$author,$tag,$id){
$stmt=$this->link->prepare($query);
$stmt->execute(array(
  ":category"=>$category,
  ":title"=>$title,
  ":body"=>$body,
  ":author"=>$author,
  ":tags"=>$tag,
   ":id"=>$id
));
return $stmt->rowcount();
}
public function update_category($query,$name,$id){
$stmt=$this->link->prepare($query);
$stmt->execute(array(
  ":name"=>$name,
   ":id"=>$id
));
return $stmt->rowcount();
}


public function delete($query,$id){
$stmt=$this->link->prepare($query);
$stmt->execute(array(":id"=>$id));
return $stmt->rowcount();
}
} //eof class
 ?>
