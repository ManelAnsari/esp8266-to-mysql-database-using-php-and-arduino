<?php
class sensor1{
 public $link='';
 function __construct($temperature, $humidity){
  $this->connect();
  $this->storeInDB($temperature, $humidity);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','admin','raspberry') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'esp_data') or die('Cannot select the DB');
 }
 
 function storeInDB($temperature, $humidity){
  $query = "insert into sensor1 set humidity='".$humidity."', temperature='".$temperature."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['temperature'] != '' and  $_GET['humidity'] != ''){
 $sensor1=new sensor1($_GET['temperature'],$_GET['humidity']);
}
?>
