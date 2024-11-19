<?php session_start(); ?>

<?php 

 include_once("conexao.php");
 include_once("constantes.php");
 
$cpf_cnpj=$_POST['cpf_cnpj'];
$guia=$_POST['guia'];

if( isset($cpf_cnpj) && (!empty($cpf_cnpj) )) { 

 
  $conexao=new mysql_conexao($SERVER, $USERNAME,  $PASSWORD );
  $conexao->conectar($NOME_BANCO);
  
  $result= $conexao->query("SELECT * FROM $TABELA_CLIENTE WHERE cpfcnpj='$cpf_cnpj'");
  
 if(mysql_num_rows($result) > 0){ 

   $codigo=mysql_result($result, 0,'cod');
   $razao_social=mysql_result($result, 0,'razsoc');
   $nome_fantasia=mysql_result($result, 0,'nomfan');
   $endereco=mysql_result($result, 0,'end');
   $cidade=mysql_result($result, 0,'cid');
   $bairro=mysql_result($result, 0,'bai');
   $cep=mysql_result($result, 0,'cep');
   $fone=mysql_result($result, 0,'fon');
   $pessoa=mysql_result($result, 0,'pes');
   $cpf_cnpj=mysql_result($result, 0,'cpfcnpj');
   $rg=mysql_result($result, 0,'rg');
   $fax=mysql_result($result, 0,'fax');
   $estado=mysql_result($result, 0,'est');
   $data_cadastro=mysql_result($result, 0,'datcad');
} 

  if(!empty($guia) ){
   $result= $conexao->query("SELECT * FROM $TABELA_GUIA WHERE (cpfcnpj='$cpf_cnpj') and (gui='$guia')");
   
    if(mysql_num_rows($result) > 0){ 
     $guia=mysql_result($result, 0,'gui');
     $nome=mysql_result($result, 0,'nom');
    }
  }
   
   
   
   
 $conexao->desconectar();

	
}?>


<html>
<head>
<title>atualizar</title>
</head>

<body>
<form method="post" action="../controle/atualizar.php" >
<font>CÓdigo: </font>    <input name="codigo" type="text"  size="15" align="middle"   value="<?php echo (empty($codigo)?"":$codigo); ?>"
 /> 
<font>RazÃo Social: </font>    <input name="razao_social" type="text"  size="40" align="middle"  value="<?php echo (empty($razao_social)?"":$razao_social); ?>"/> <br/> <br/>
<font>Nome Fantasia: </font>    <input name="nome_fantasia" type="text"  size="40" align="middle"   value="<?php echo (empty($nome_fantasia)?"":$nome_fantasia); ?>" /> <br/> <br/>
<font>EndereÇo: </font>    <input name="endereco" type="text"  size="50" align="middle"   value="<?php echo (empty($endereco)?"":$endereco); ?>" /> <br/> <br/>
<font>Cidade :</font><input name="cidade" type="text" size="20" align="middle"   value="<?php echo (empty($cidade)?"":$cidade); ?>" /> <br/> <br/>
<font>Bairro :</font><input name="bairro" type="text" size="30" align="middle"   value="<?php echo (empty($bairro)?"":$bairro); ?>" /> <br/> <br/>
<font>cep :</font><input name="cep" type="text" size="10" align="middle"   value="<?php echo (empty($cep)?"":$cep); ?>" /> <br/> <br/>
<font>fone :</font><input name="fone" type="text" size="15" align="middle"  value="<?php echo (empty($fone)?"":$fone); ?>"  /> <br/> <br/>
<font>fax :</font><input name="fax" type="text" size="15" align="middle"   value="<?php echo (empty($fax)?"":$fax); ?>" /> <br/> <br/>
<font>Pessoa :</font><input name="pessoa" type="text" size="15" align="middle"  value="<?php echo (empty($pessoa)?"":$pessoa); ?>" /> 
<font>CPF/CNPJ  :</font><input name="cpf_cnpj" type="text" size="20" align="middle"  value="<?php echo (empty($cpf_cnpj)?"":$cpf_cnpj); ?>" /> <br/> <br/>
<font>RG :</font><input name="rg" type="text" size="10" align="middle"  value="<?php echo (empty($rg)?"":$rg); ?>" /> <br/> <br/>
<font>estado :</font><input name="estado" type="text" size="15" align="middle"  value="<?php echo (empty($estado)?"":$estado); ?>" />
<font>data cadastro :</font><input name="data_cadastro" type="text" size="15" align="middle"  value="<?php echo (empty($data_cadastro)?"":$data_cadastro); ?>" />


<font>guia :</font><input name="guia" type="text" size="15" align="middle"  value="<?php echo (empty($guia)?"":$guia); ?>" />
<font>nome :</font><input name="nome" type="text" size="15" align="middle"  value="<?php echo (empty($nome)?"":$nome); ?>" />

<input type="submit" value="atualizar" class="estilo_botao" name="atualizar" />
</form>
</body>
</html>