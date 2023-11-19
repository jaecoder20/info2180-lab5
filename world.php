<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = htmlspecialchars($_GET['country']);


$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE '%$country%'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Use a prepared statement to prevent SQL injection

?>

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>


