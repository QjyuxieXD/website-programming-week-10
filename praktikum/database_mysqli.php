<?php
declare(strict_types=1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli("localhost", "root", "", "website_project");
$mysqli->set_charset("utf8mb4");