<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <meta charset="UTF-8">
    <title>SI401A</title>
</head>

<body>
<?php
    const FILE = "filename.txt";
    $all = [];
    $data = file(FILE);
    foreach($data as $student) {
        array_push($all, json_decode($student, true));
    }
    usort($all, function ($item1, $item2) {
        return $item1['ra'] <=> $item2['ra'];
    });
    foreach($all as $student) {
        echo "<ul><li>".$student["name"]."</li>";
        echo "<li>".$student["ra"]."</li>";
        echo "<li>".$student["gender"]."</li>";
        echo "<li>".$student["age"]."</li>";
        echo "<li>".$student["address"]."</li>";
        echo "<li>".$student["phone"]."</li>";
        echo "<li>".$student["mail"]."</li></ul>";
    }
?>
</body>