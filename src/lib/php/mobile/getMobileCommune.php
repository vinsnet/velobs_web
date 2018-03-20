<?php header('Content-Type:text/xml');
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();

			$sql = "SELECT id_commune, lib_commune FROM commune ORDER BY id_commune ASC";
			$result = mysql_query($sql);
			print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			print '<communes>';
			while ($row = mysql_fetch_array($result)) {
				print '<commune nom="'.stripslashes($row['lib_commune']).'" id="'.$row['id_commune'].'" />';
			}
			print '</communes>';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
