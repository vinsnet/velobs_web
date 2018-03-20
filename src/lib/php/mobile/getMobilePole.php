<?php header('Content-Type:text/xml');
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();

			$sql = "SELECT id_pole, lib_pole FROM pole ORDER BY id_pole ASC";
			$result = mysql_query($sql);
			print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			print '<poles>';
			while ($row = mysql_fetch_array($result)) {
				print '<pole nom="'.stripslashes($row['lib_pole']).'" id="'.$row['id_pole'].'" />';
			}
			print '</poles>';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
