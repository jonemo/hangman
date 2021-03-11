<?php
include('connect.php');
$try = $_GET['try'];
$sol = $_GET['sol'];
$geloest = 0;



    if (!in_array($try, $my->buchstaben))
        $my->buchstaben[] = $try;

    $underscroes = 0;

    while ($a = substr($my->act_word, $x,1))
    {
        if (!in_array($a, $my->buchstaben) AND $a != ' ')
                $underscores++;
        $x++;
    }

	if ($underscores == 0)
	{
		$feedback = '<strong>RICHTIG GELÖST!</strong>';
		$geloest = 1;
	}
	elseif ($sol != '')
	{
		if ($sol == $my->act_word)
		{
			$feedback = '<strong>RICHTIG GELÖST!</strong>';
			$geloest = 1;
		}
		else
		{
			$feedback = '<strong>Falsch gelöst.</strong>';
		}
	}
	else
	{

        if (in_array($try, $my->buchstaben) AND $my->buchstaben[(count($my->buchstaben) - 1)] != $try )
        {
            $feedback = 'Den Buchstaben hast du schon mal geraten!';
        }
        else
        {

            if (strpos ($my->act_word, $try) === false)
                $feedback = 'Kommt leider nicht vor.';
            else
                $feedback = 'Kommt vor!';
        }
	}

	$x = 0;
	$wort = '';

	while ($a = substr($my->act_word, $x,1))
	{
	if ($a == ' ')
		$wort .= ' ';
	elseif (in_array($a, $my->buchstaben))
		$wort .= $a;
	else
	{
		$wort .= '_';
	}
	$x++;
	}



	$c = 0;
	$falsch = 0;
	$falsche = '';

	while ($b = $my->buchstaben[$c])
	{
		if (strpos ($my->act_word, $b) === false)
		{
			$falsch++;
			$falsche .= $b;
		}

		$c++;
	}

?>

<div class="main">

		<div class="word"><?php echo $wort ?></div>

        <div class="feedback">
        	<div><?php echo $feedback ?></div>	
        	<br />
	        <div style="font-size: 8pt;"><?php echo $falsch ?> falsche Buchstaben geraten</div>
        	<div><span style="font-size: 8pt; letter-spacing: 3px;"><?php echo $falsche ?></span></div>
        </div>
        
        
        
        <div class="hangman"><img src="man/<?php echo $falsch ?>.gif" width="300" height="400" alt="der hangman" /></div>


        <?php
if ($falsch >=9)
{

	echo 'NICHT GELÖST <a href="start.php">nochmal</a>';

}
else
{
        if ($geloest == 0)
        {

        ?>
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

                <!--<form name="loesen" action="raten.php" method="get">
                    <input type="text" name="sol" />
                    <input type="hidden" name="sid" value="<?php echo $_GET['sid'] ?>" />
                    <input type="submit" value="lösen" />
                </form>-->

        <?php

        }
        else
        {
        ?>
			<form class="form" action="new_word.php?sid=<?php echo $sid ?>" method="get">
            	<input type="hidden" name="sid" value="<?php echo $_GET['sid'] ?>" />
                <input class="submit" style="width: 150px;" name="" type="submit" value="neues wort" />
            </form>
        <?php
		}
}
?>
		
</div>		
        
<?php
include ('schluss.php');
?>
