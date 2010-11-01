<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_project = "localhost";
$database_conn_project = "thuvien";
$username_conn_project = "root";
$password_conn_project = "123456";
$conn_project = mysql_pconnect($hostname_conn_project, $username_conn_project, $password_conn_project) or trigger_error(mysql_error(),E_USER_ERROR); 
?>