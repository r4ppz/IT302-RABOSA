<?php
// Database configuration
define('DB_HOST', 'mysql');
define('DB_NAME', 'it302_rabosa');
define('DB_USER', 'it302_rabosa');
define('DB_PASS', 'it302_rabosa');

function getDBConnection()
{
  try {
    $pdo = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
      DB_USER,
      DB_PASS,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
      ]
    );
    return $pdo;
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
}

