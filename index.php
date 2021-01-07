<!DOCTYPE html>
<html>
<head>
	<title>
		sql azure try
	</title>
</head>
<body>
	<?php
	// PHP Data Objects(PDO) Sample Code:
	try {
	    $conn = new PDO("sqlsrv:server = tcp:sql-triton-demo0.database.windows.net,1433; Database = sqlDemo", "triton", "Akash@)@)");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to SQL Server";
	}
	catch (PDOException $e) {
	    print("Error connecting to SQL Server.");
	    die(print_r($e));
	}

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "triton", "pwd" => "Akash@)@)", "Database" => "sqlDemo", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:sql-triton-demo0.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	
	
	$username = "triton";
	$password = "Akash@)@)";
	$database="sqlDemo";

	$mysqli = new mysqli($servername, $username, $password, $database);
	$mysqli->select_db($database) or die( "Unable to select database");
	echo "debug1";

	$sql = "INSERT INTO loginCredentials (email,password1,time1,date1,device)
	VALUES ('akagmail.com', 'Doe', 'df','dfg','dfg')";

	if ($mysqli->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error occc: " . $sql . "<br>" . $conn->error;
	}


	?>
	<h1>hello</h1>
</body>
</html>
