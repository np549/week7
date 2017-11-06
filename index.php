<?php
$servername = "mysql:host=sql2.njit.edu";
$username = "np549";
$password = "X7bBAA4xP";

	try {
    $conn = new PDO($servername,$username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully ";
    echo "<br><hr>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    echo "<br><hr>";
    }

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Birthday</th><th>Gender</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

try {
    $conn = new PDO("mysql:host=sql2.njit.edu;dbname=np549", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id FROM accounts WHERE `id`<=\"6\""); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        $count=$count+1;}
        echo "$count<br><hr>";
    $stmt = $conn->prepare("SELECT `id`,`email`,`fname`,`lname`,`phone`,`birthday`,`gender` FROM `accounts` WHERE `id`<=\"6\""); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

echo "</table>";

?>
