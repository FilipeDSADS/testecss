
<?php
/*
 * Created on 25/02/2008
 *
 */

 include_once("conexao.php");
 include_once("constantes.php");
 
 $codigo= $_POST['codigo'];
 $razao_social=$_POST['razao_social'];
 $nome_fantasia=$_POST['nome_fantasia'];
 $endereco=$_POST['endereco'];
 $cidade=$_POST['cidade'];
 $bairro=$_POST['bairro'];
 $cep=$_POST['cep'];
 $fone=$_POST['fone'];
 $pessoa=$_POST['pessoa'];
 $cpf_cnpj=$_POST['cpf_cnpj'];
 $rg=$_POST['rg'];
 $fax=$_POST['fax'];
 $estado=$_POST['estado'];
 $data_cadastro=$_POST['data_cadastro'];
 
 $guia=$_POST['guia'];
 $nome=$_POST['nome'];
 
 $erro=false;
 $cont=0;
 $informar;
 $conclusao=false;
 
/*if(empty($codigo) || empty($razao_social) || empty($nome_fantasia) || empty($endereco) || empty($cidade) || empty($bairro) || empty($cep) || empty($fone) || empty($cpf_cnpj) || empty($rg) ){
 	
 	$erro=true;	
 	
 	$informar[$cont++]='Campo(s) em Branco:';
 	
 	if(empty($codigo))
 	  $informar[$cont++]="Código";
 	
 	if(empty($razao_social))
 	 $informar[$cont++]="Razão social";
 	
 	if(empty($nome_fantasia))
 	  $informar[$cont++]="Nome fantasia";
 	
 	if(empty($endereco))
 	 $informar[$cont++]="Endereço";
 	 
 	if(empty($cidade))
 	$informar[$cont++]="Cidade";
 	 
 	if(empty($bairro))
 	 $informar[$cont++]="Bairro";
	 
	 if(empty($cep))
 	 $informar[$cont++]="CEP";
	 
	if(empty($fone))
 	 $informar[$cont++]="Fone"; 
	 
	if(empty($cpf_cnpj))
 	 $informar[$cont++]="CPF/CNPJ"; 
	 
	if(empty($rg))
 	 $informar[$cont++]="RG";  
 
 }*/
 

if(!$erro){
	
  $conexao=new mysql_conexao($SERVER, $USERNAME,  $PASSWORD );
  $conexao->conectar($NOME_BANCO);
  
  $sql=$conexao->query("SELECT * FROM $TABELA_CLIENTE WHERE cpfcnpj='$cpf_cnpj'");
  
  if(mysql_num_rows($sql) > 0){
  	//$informar[$cont++]="ja existe cliente com esse cÓdigo";
	  $conexao->query(" UPDATE $TABELA_CLIENTE  SET cod='$codigo', razsoc='$razao_social' ,nomfan='$nome_fantasia' ,end='$endereco' ,cid='$cidade' ,bai='$bairro',cep='$cep' ,fon='$fone',cpfcnpj='$cpf_cnpj' ,rg='$rg', fax='$fax', pes='$pessoa', est='$estado', datcad='$data_cadastro'  WHERE cpfcnpj='$cpf_cnpj'");
    }else{
  	  $conexao->query(" INSERT INTO $TABELA_CLIENTE (cod,razsoc,nomfan,end,cid,bai,cep,fon,cpfcnpj,rg, fax, pes, est, datcad ) VALUES ('$codigo','$razao_social','$nome_fantasia','$endereco','$cidade','$bairro','$cep','$fone','$cpf_cnpj','$rg','$fax', '$pessoa', '$estado', '$data_cadastro')");
	
  	$conclusao=true;
  }
 
 
 
  if( !empty($guia) ){
     $sql2=$conexao->query("SELECT * FROM $TABELA_GUIA WHERE (cpfcnpj='$cpf_cnpj') and (gui='$guia') ");
	
	if(mysql_num_rows($sql2) > 0){
	    $conexao->query(" UPDATE  $TABELA_GUIA  SET cpfcnpj='$cpf_cnpj' ,gui='$guia',nom='$nome'  WHERE (cpfcnpj='$cpf_cnpj') and (gui='$guia')");
	}else{
      $conexao->query(" INSERT INTO $TABELA_GUIA (cpfcnpj ,gui,nom ) VALUES ('$cpf_cnpj','$guia','$nome')");
	}
  }
  
  $conexao->desconectar();
}

?>

<?php if(!$conclusao) { ?>



<table width="510" cellpadding="2" cellspacing="0" border="1" >
  <tr valign="top">
    <td width="473" >
    
  <br/> <br/> <hr/> 
  <font  >  
<?php
 for( $i=0; $i< $cont ; $i++)
     printf(  '%s <br/>',$informar[$i]);
?>

 </font> <hr/><br/> <br/></td>

 </tr>
</table>

<head>
<title>cadastro</title>
</head>
<body>
</body>


<?php }else { ?>

<?php //include("../interface/incusaoconcluido.html");?>

<?php } ?>
