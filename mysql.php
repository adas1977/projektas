<?php
require_once('config.php');

$conn = new mysqli(
    $settings['db_host'],
    $settings['db_username'],
    $settings['db_password'],
    $settings['db_schema'],
    $settings['db_port']
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}