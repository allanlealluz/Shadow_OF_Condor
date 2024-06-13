<?php
require_once 'DB/connect.php';
$con = new Conect();
$result = $con->query("SELECT id, titulo AS nome, data FROM roteiros ORDER BY data DESC");
$rows = $result->fetch_all(MYSQLI_ASSOC);
foreach ($rows as $row) {
    echo "<tr>";
    echo "<td><a href='#' class='story-link' data-id='" . $row['id'] . "'>" . htmlspecialchars($row['nome']) . "</a></td>";
    echo "<td>" . htmlspecialchars($row['data']) . "</td>";
    echo "</tr>";
}
?>
