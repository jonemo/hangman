<?php

include('connect.php');

?>

<div class="main">

<form class="form" action="raten.php?sid=<?php echo $sid ?>" method="get">
	<input type="hidden" name="sid" value="<?php echo $_GET['sid'] ?>" />
	<input class="submit" name="try" type="submit" value="a" />
	<input class="submit" name="try" type="submit" value="b" />
	<input class="submit" name="try" type="submit" value="c" />
	<input class="submit" name="try" type="submit" value="d" />
	<input class="submit" name="try" type="submit" value="e" />
	<input class="submit" name="try" type="submit" value="f" />
	<input class="submit" name="try" type="submit" value="g" />
	<input class="submit" name="try" type="submit" value="h" />
	<input class="submit" name="try" type="submit" value="i" />
	<input class="submit" name="try" type="submit" value="j" />
	<input class="submit" name="try" type="submit" value="k" />
	<input class="submit" name="try" type="submit" value="l" />
	<input class="submit" name="try" type="submit" value="m" />
	<input class="submit" name="try" type="submit" value="n" />
	<input class="submit" name="try" type="submit" value="o" />
	<input class="submit" name="try" type="submit" value="p" />
	<input class="submit" name="try" type="submit" value="q" />
	<input class="submit" name="try" type="submit" value="r" />
	<input class="submit" name="try" type="submit" value="s" />
	<input class="submit" name="try" type="submit" value="t" />
	<input class="submit" name="try" type="submit" value="u" />
	<input class="submit" name="try" type="submit" value="v" />
	<input class="submit" name="try" type="submit" value="w" />
	<input class="submit" name="try" type="submit" value="x" />
	<input class="submit" name="try" type="submit" value="y" />
	<input class="submit" name="try" type="submit" value="z" />
</form>



<?php
	$anz = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM wortliste WHERE 1"));
	
	$n = rand(0, $anz[0]-1);
	
	$sql = "SELECT * FROM wortliste WHERE 1 LIMIT ".$n.",1";
	$erg = mysql_query($sql);
	$row = mysql_fetch_array($erg);
	
	$my->act_word = $row['wort'];
	$my->buchstaben = array();

	$wort = '';

	while ($a = substr($my->act_word, $x,1))
	{
	if ($a == ' ')
		$wort .= ' ';
	else
		$wort .= '_';

	$x++;
	}
?>

<div class="word"><?php echo $wort ?></div>

</div>
<?php
include ('schluss.php');
?>