<?php 

require_once('../Connections/conexao.php'); 


if(isset($_POST['ok'])){

	$q = mysql_escape_string($_POST['b']);
	
mysql_select_db($database_conexao, $conexao);
$query_busca = "SELECT * FROM mercadoria WHERE mer_tipo LIKE '%$q%' OR mer_nome LIKE '%$q%'";
$busca = mysql_query($query_busca, $conexao) or die(mysql_error());
$row_busca = mysql_fetch_assoc($busca);
$totalRows_busca = mysql_num_rows($busca);

} else{
mysql_select_db($database_conexao, $conexao);
$query_busca = "SELECT * FROM mercadoria";
$busca = mysql_query($query_busca, $conexao) or die(mysql_error());
$row_busca = mysql_fetch_assoc($busca);
$totalRows_busca = mysql_num_rows($busca);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1174" border="1">
    <tr>
      <th width="1164" id="form" scope="col"><label> Digite o nome ou o tipo da mercadoria:
        <input type="text" name="b" id="b" />
        <input type="submit" name="ok" id="ok" value="buscar" />
        <a href="buscar.php">Limpar busca</a></label></th>
    </tr>
  </table>
  <table width="1159" border="1" cellspacing="5">
    <tr>
      <td width="107" height="27">Código</td>
      <td width="189">Tipo da mercadoria</td>
      <td width="257">Nome da mercadoria</td>
      <td width="86">Quantidade</td>
      <td width="77">Preço</td>
      <td width="104">Tipo de negocio</td>
      <td width="293">Ação</td>
    </tr>
    <?php do{ ?>
    <tr>
      <td><?php echo $row_busca['mer_codigo']; ?></td>
      <td><?php echo $row_busca['mer_tipo']; ?></td>
      <td><?php echo $row_busca['mer_nome']; ?></td>
      <td><?php echo $row_busca['mer_quantidade']; ?></td>
      <td><?php echo $row_busca['mer_preco']; ?></td>
      <td><?php echo $row_busca['mer_negocio']; ?></td>
      <td>Editar | Deletar</td>
    </tr>
	<?php } while($row_busca = mysql_fetch_assoc($busca)); ?>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($busca);
?>
