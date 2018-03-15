<?php header('Content-Type: text/html; charset=UTF-8');
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();

			$sql = "SELECT id_commune, lib_commune, AsText(geom_commune) AS geom FROM commune ORDER BY lib_commune ASC";
			$result = mysql_query($sql);
			$i = 0;
			while ($row = mysql_fetch_array($result)){
				$arr[$i]['id_commune'] = $row['id_commune'];
				$arr[$i]['lib_commune'] = stripslashes($row['lib_commune']);
				$arr[$i]['geom'] = stripslashes($row['geom']);
				$i++;
			}
			echo '({"commune":'.json_encode($arr).'})';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
