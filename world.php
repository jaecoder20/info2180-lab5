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

<table class="content-table">
  <thead>
    <tr>
      <th>NAME</th>
      <th>CONTINENT</th>
      <th>INDEPENDENCE</th>
      <th>HEAD OF STATE</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
					  



