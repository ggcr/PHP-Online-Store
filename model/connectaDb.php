<?php

function connectaBD() {
    $conn = new PDO(
        'mysql:host=127.0.0.1;dbname=tdiwj5;port=3306;charset=utf8mb4',
        'tdiw-j5',
        '2FyFxhuo'
    );
    return $conn;
}