<!DOCTYPE html>
<html><body>
<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "dht11";
// REPLACE with Database user
$username = "admin";
// REPLACE with Database user password
$password = "raspberry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ID, temperature, humidity, date FROM dht11 ORDER BY ID DESC";

echo '<table cellspacing="4" cellpadding="4">
      <tr> 
        <td>ID</td> 
        <td>temperature</td> 
        <td>humidity</td>
        <td>Timestamp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_ID = $row["ID"];
        $row_temperature = $row["temperature"];
        $row_humidity = $row["humidity"];
        $row_date = $row["date"]; 
      
        echo '<tr> 
                <td>' . $row_ID . '</td> 
                <td>' . $row_temperature . '</td> 
                <td>' . $row_humidity . '</td> 
                <td>' . $row_date . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
