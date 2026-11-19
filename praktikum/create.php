<?php
declare(strict_types=1);

require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method tidak diizinkan.");
}

$title = trim($_POST["title"] ?? "");
$content = trim($_POST["content"] ?? "");

if ($title === "" || mb_strlen($title) > 150 || $content === "") {
    http_response_code(422);
    exit("Judul dan isi wajib diisi. Judul maksimal 150 karakter.");
}

$stmt = $pdo->prepare(
    "INSERT INTO posts (title, content)
     VALUES (:title, :content)"
);

$stmt->execute([
    "title" => $title,
    "content" => $content,
]);

header("Location: index.php", true, 303);
exit;