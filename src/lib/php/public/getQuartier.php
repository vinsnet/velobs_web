<?php
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();
			$sql = "SELECT id_quartier, lib_quartier FROM quartier ORDER BY id_quartier ASC";
			$result = mysql_query($sql);
			$i = 0;
			while ($row = mysql_fetch_array($result)){
				$arr[$i]['id_quartier'] = $row['id_quartier'];
				$arr[$i]['lib_quartier'] = stripslashes($row['lib_quartier']);
				$i++;
			}
			echo '({"quartier":'.json_encode($arr).'})';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
