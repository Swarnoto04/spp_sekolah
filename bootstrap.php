<?php

/* -----------------------------------------------------------
| Bootstrap
---------------------------------------------------------- */

require_once __DIR__ . '/config/env.php';
require_once __DIR__ . '/helpers.php';

// Connection to database

$connection = new mysqli(
    DATABASE_HOST,
    DATABASE_USERNAME,
    DATABASE_PASSWORD,
    DATABASE_NAME,
    DATABASE_PORT
);

// Session

session_start();

// Set default timezone

date_default_timezone_set(DEFAULT_TIMEZONE);

// Create admin

$name = 'Admin';
$email = 'admin@school.co.id';
$password = password_hash('admin', PASSWORD_DEFAULT);
$role = 'admin';

$statement = $connection->prepare("SELECT * FROM users WHERE email = ?");
$statement->bind_param('s', $email);
$statement->execute();

$admin = $statement->get_result()->fetch_assoc();

if (!$admin) {

    $statement = $connection->prepare("
        INSERT INTO users ( name, email, password, role ) VALUES (
            ?, ?, ?, ?
        )
    ");

    $statement->bind_param('ssss', $name, $email, $password, $role);

    $statement->execute();
}
