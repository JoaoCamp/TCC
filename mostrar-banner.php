<?php
require("conexao.php");

$idevento = filter_input(INPUT_GET, "idevento");

$sql = "select banner, tipo FROM evento where idevento = ?";
$stmt = $conn->prepare($sql);
$result = $stmt->execute([$idevento]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$data = $row['banner'];
$tipo = $row['tipo'];

$string = stream_get_contents($data);

header("Content-type: $tipo");
echo $string;
