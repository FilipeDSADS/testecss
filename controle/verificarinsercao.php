<?php session_start(); ?>

<?php 

 include_once("conexao.php");
 include_once("constantes.php");
 
$cpf_cnpj=$_POST['cpf_cnpj'];

$situacao='';

if( isset($cpf_cnpj) && (!empty($cpf_cnpj) )) { 

 
  $conexao=new mysql_conexao($SERVER, $USERNAME,  $PASSWORD );
  $conexao->conectar($NOME_BANCO);
  
  $result= $conexao->query("SELECT * FROM $TABELA_CLIENTE WHERE cpfcnpj='$cpf_cnpj'");
  
 if(mysql_num_rows($result) > 0){ 
  $situacao='encontrado'; 
 } 

  /*if(!empty($guia) ){
   $result= $conexao->query("SELECT * FROM $TABELA_GUIA WHERE (cpfcnpj='$cpf_cnpj') and (gui='$guia')");
   
    if(mysql_num_rows($result) > 0){ 
     $guia=mysql_result($result, 0,'gui');
     $nome=mysql_result($result, 0,'nom');
    }
  }*/
   
   
   
   
 $conexao->desconectar();

	
}else{
 $situacao='';
}?>


<html>
<head>
<title>atualizar</title>
</head>

<body>
<form method="post" action="../controle/atualizar.php" >
<font>situacao: </font>    <input name="situacao" type="text"  size="15" align="middle"   value="<?php echo (empty($situacao)?"":$situacao); ?>"/> 
</form>
</body>
</html>