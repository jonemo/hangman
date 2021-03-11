<?php

	mysql_query("UPDATE sessions SET inhalt='". serialize($my) ."' WHERE sid='".$sid."'");

?>

</body>
</html>