<?php header('Content-Type: text/html; charset=UTF-8');
	include_once '../key.php';
	include_once '../database.php';

	switch (SGBD) {
		case 'mysql':
			$link = Database::getIntance()->connect();

			$sql = "SELECT id_subcategory, lib_subcategory FROM subcategory WHERE proppublic_subcategory = TRUE ORDER BY lib_subcategory ASC";
			$result = mysql_query($sql);
			$i = 0;
			while ($row = mysql_fetch_array($result)){
				$arr[$i]['id_subcategory'] = $row['id_subcategory'];
				$arr[$i]['lib_subcategory'] = stripslashes($row['lib_subcategory']);
				$i++;
			}
			echo '({"subcategory":'.json_encode($arr).'})';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}

?>
