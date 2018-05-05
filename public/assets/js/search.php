<?php
//database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'db_ass2';

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//get search term
$searchTerm = $_GET['term'];

//get matched data from skills table
$query = $db->query("SELECT * FROM users WHERE name LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['name'];
}

//return json data
echo json_encode($data);
?>