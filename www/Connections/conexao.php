<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "mysql4.000webhost.com";
$dbname = "a5868022_mercado";
$user = "a5868022_root";
$senha = "matheus95";
// Seleciona o Banco de Dados
mysql_connect($host, $user, $senha) or die("Não foi possível conectar-se com o banco de dados");

// Seleciona o Banco de Dados
mysql_select_db($dbname)or die("Não foi possível conectar-se com o banco de dados");
//$conexao = mysql_pconnect($hostname_conexao, $username_conexao, $password_conexao) or trigger_error(mysql_error(),E_USER_ERROR); 
?>