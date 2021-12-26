<?php
require_once "connection.php";

$con = new Connection();
$pdo = $con->Connect();
$stmt =$pdo->prepare("SELECT * FROM users");

$stmt->execute();

//$result = $stmt ->fetch(PDO::FETCH_ASSOC);

//echo var_dump($result);

/*
echo "<table border='1'>
<tr>
<th>iD</th>
<th>Username</th>
<th>Pass</th>
</tr>";
*/


while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $rows[] = $row;
   // print_r($rows);
   /*
   echo "<tr>";   
       echo "<td>". $row['id'] . "</td>";
       echo "<td>". $row['username'] . "</td>";   
       echo "<td>". $row['password'] . "</td>";
   echo "</tr>";
*/
    

}
echo json_encode($rows);
//echo "<tr>";
//echo "<td>" . $row['username'] . "</td>";
//echo "<td>" . $row['password'] . "</td>";
//echo "</tr>";

//echo "</table>";
