<?php
session_start();
$command="mysql:dbname=u840981892_saumya;hostname=localhost";
$usrnm="u840981892_saumya9348";
$pwd="Sam@9348";
$conn = new PDO($command,$usrnm,$pwd,array(PDO::ATTR_AUTOCOMMIT=>false));