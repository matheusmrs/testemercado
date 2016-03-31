<?php require_once('conexao.php'); ?>
<?php


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mercadoria (mer_codigo, mer_tipo, mer_nome, mer_quantidade, mer_preco, mer_negocio) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['mer_codigo'], "int"),
                       GetSQLValueString($_POST['mer_tipo'], "text"),
                       GetSQLValueString($_POST['mer_nome'], "text"),
                       GetSQLValueString($_POST['mer_quantidade'], "int"),
                       GetSQLValueString($_POST['mer_preco'], "double"),
                       GetSQLValueString($_POST['mer_negocio'], "text"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());

  $insertGoTo = "sucesso.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<script type="text/javascript">
function validaForm(){
           d = document.cadastro;
           if (d.mer_tipo.value == ""){
                     alert("O campo tipo deve ser preenchido!");
                     d.mer_tipo.style.backgroundColor="red";
                     d.mer_tipo.style.color="#ffffff";
                    d.mer_tipo.focus();
                     return false;
           }        
          
          
            if (d.mer_nome.value == ""){
                   alert("O campo nome  deve ser preenchido!");
                   d.mer_nome.style.backgroundColor="red";
                   d.mer_nome.style.color="#ffffff";
                   d.mer_nome.focus();
                   return false;
         }
	    if (d.mer_quantidade.value == ""){
                   alert("O campo quantidade  deve ser preenchido!");
                   d.mer_quantidade.style.backgroundColor="red";
                   d.mer_quantidade.style.color="#ffffff";
                   d.mer_quantidade.focus();
                   return false;
         }
	    if (d.mer_preco.value == ""){
                   alert("O campo preço  deve ser preenchido!");
                   d.mer_preco.style.backgroundColor="red";
                   d.mer_preco.style.color="#ffffff";
                   d.mer_preco.focus();
                   return false;
         }
	    if (d.mer_negocio.value == ""){
                   alert("O campo tipo de négocio deve ser preenchido!");
                   d.mer_negocio.style.backgroundColor="red";
                   d.mer_negocio.style.color="#ffffff";
                   d.mer_negocio.focus();
                   return false;
         }
              
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro</title>
</head>

<body>


<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">

  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo de mercadoria</td>
      <td><input type="text" name="mer_tipo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome da mercadoria</td>
      <td><input type="text" name="mer_nome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Quantidade de mercadoria</td>
      <td><input type="text" name="mer_quantidade" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Preço da mercadoria</td>
      <td><input type="text" name="mer_preco" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo de negocio</td>
      <td><select name="mer_negocio">
        <option value="Compra" <?php if (!(strcmp("Compra", ""))) {echo "SELECTED";} ?>>Compra</option>
        <option value="Venda" <?php if (!(strcmp("Venda", ""))) {echo "SELECTED";} ?>>Venda</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="mer_codigo" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>