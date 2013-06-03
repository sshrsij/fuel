<html>
    <head>
	<meta charset="utf-8">
    </head>
    <body>
	<p>root </p>
	<?php
	$services_json = getenv('VCAP_SERVICES');
	$services = json_decode($services_json, true);
	$config = null;
	if (!is_null($services)) {
	    foreach ($services as $name => $service) {
		if (0 === stripos($name, 'mysql')) {
		    $config = $service[0]['credentials'];
		    break;
		}
	    }
	}
	//var_dump($config);
	// && die('MySQL service information not found.');
	$host = is_null($config) ? "localhost" : $config["hostname"];
	$user = is_null($config) ? "player" : $config["user"];
	$pass = is_null($config) ? "Zxcvbnm,." : $config["password"];
	$db = is_null($config) ? "dbdb" : $config["name"];

	$qstring = "select id,name,hex(name) from eggs;";
	var_dump($qstring);
	echo "<br/>x";
	try {
	    $link = mysqli_connect($host, $user, $pass, $db);
	    var_dump(mysqli_set_charset($link, 'utf8'));
	    mysql_set_charset("utf8");
	    mysqli_multi_query($link, $qstring);
	    echo "result <br/>";
	    $result = mysqli_use_result($link) or die("mysqli_use_result not work");
	    echo "=> <br/>";
	    while ($row = mysqli_fetch_row($result)) {
		printf("%s:%s (hex:%s = %s )\n<br/>", $row[0], $row[1], $row[2], hex2bin($row[2]));
	    }
	    mysqli_free_result($result);
	}catch(PDOException $pdoe){
	    var_dump($pdoe);
	} catch (Exception $e) {
	    var_dump($e);
	    echo $e->getTraceAsString();
	}
	mysqli_close($link);
//	$db_selected = mysql_select_db($db, $link);
//	$result = mysql_query($qstring);
//	var_dump("mysql_fetch_assoc($result)");
//	var_dump(mysql_fetch_assoc($result));
//	mysql_close($link);
	?>
    </body>
</html>