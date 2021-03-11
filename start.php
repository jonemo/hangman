<?php

    session_start();
    $sid = session_id();

    include ('connect.php');

?>

<div class="main">

<?php

$my = new session;
$my->spielername = 'lea';

echo '<a href="new_word.php?sid='.$sid.'">weiter</a>';

mysql_query("INSERT INTO sessions SET inhalt='', sid='".$sid."'");

?>

</div>

<?php
include('schluss.php');
?>