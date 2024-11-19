<?php

 
 abstract class conexao{
 	
 	public $server;
 	public $username;
 	public $password;
 	
 	/*public function conexao($server, $username, $password){
 		$this->server=$server;
 		$this->username=$username;
 		$this->password=$password;
 	}*/
 	
 	abstract public function conectar($namedb);
 	abstract public function desconectar();
 	abstract  public function query($q);
 }
 
 
 class mysql_conexao extends conexao{
 	
 	public $link;
 	//private $namedb;
 	
 	public function mysql_conexao($server, $username, $password){
 		$this->server=$server; 
 		$this->username=$username; 
 		$this->password=$password;
 	}
 	
  	 public function conectar($namedb){
  	 	$this->link=mysql_connect($this->server, $this->username, $this->password) or  
  	 	die('Erro ao conectar: ' . mysql_error());
		
  	 	
  	 	mysql_select_db($namedb,$this->link) or die('Erro selecionar banco de dados: ' . mysql_error());
  	 }
  	 
  	 public function get_link(){
  	 	
  	 	if($this->link==null){
  	 	  die("sem link");
		 }
  	 	  
  	 	return $this->link;
  	 }
  	 
 	 public function desconectar(){
 	 	
 	 	if(empty($this->link))
 	 	  return;
 	 	
 	 	mysql_close($this->link) or die("erro desconectar" . mysql_error());
 	 }
 	 
     public function query($q){
     	
     	$val= mysql_query($q, $this->link);
     	
     	if(!$val){
     	die("erro query: ".mysql_error());
     	 }
		 
     	return $val ;
     }
 	
 }
 
?>
