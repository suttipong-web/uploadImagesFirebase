<?php 
    define("PATH",$_SERVER["DOCUMENT_ROOT"].'/');
	header("Content-Type:text/html;charset=utf-8");
	define("BASEURL",'/');
	define("TITLE","Welcome to ESTIMA, AI-driven web-application for blood loss estimation");

    // connect mysql 
    define("DB_HOSTNAME","localhost");
	define("DB_DATABASE","dbblood");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");	
	
	
	$mysqli=new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);
	$mysqli->select_db(DB_DATABASE);
	$mysqli->query("SET NAMES utf8;");
	if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}