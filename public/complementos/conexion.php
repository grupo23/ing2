<?php
$conexionMYSQL = mysql_connect('localhost','root','root');
$baseMYSQL=mysql_select_db('bestnid');
$conexionPDO = new PDO('mysql'.':host='.'localhost'.';dbname='.'bestnid','root','root');
?>