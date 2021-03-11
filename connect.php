<html>
<head>
	<link rel="stylesheet" href="hangman.css" />
</head>
<body>


<?php

	class session
	{
		var $spielername;
		var $act_word;
		var $old_words;
		var $buchstaben;
	}

	mysql_connect("localhost", "root", "secret")
		or die ("<b>Ausnahme - Fehler</b><br />Die Datenbank scheint nicht online zu sein.");
	mysql_select_db("hangman");

	if ($sid == '')
		$sid = $_GET['sid'];

	$erg = mysql_query("SELECT * FROM sessions WHERE sid='".$sid."'");
	$row = mysql_fetch_array($erg);
	$my = unserialize($row['inhalt']);


?>
