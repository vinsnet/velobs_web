<?php
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();
			$sql = "SELECT id_pole, lib_pole, AsText(geom_pole) AS geom  FROM pole ORDER BY lib_pole ASC";
			$result = mysql_query($sql);
			$i = 0;
			while ($row = mysql_fetch_array($result)){
				$arr[$i]['id_pole'] = $row['id_pole'];
				$arr[$i]['lib_pole'] = stripslashes($row['lib_pole']);
				$arr[$i]['geom'] = stripslashes($row['geom']);
				$i++;
			}
			echo '({"pole":'.json_encode($arr).'})';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>