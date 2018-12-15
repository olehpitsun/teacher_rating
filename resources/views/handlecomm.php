<?php
include 'db.php';

// з якого коментаря будемо робити запит
//ідентифікатор статті 
$startFrom = $_POST['startFrom'];
$article_id = $_POST['article_id'];
// отримуємо 10 статей , почнаючи з останньої
$res = mysqli_query($db, "SELECT * FROM `comm` WHERE article_id=$article_id ORDER BY `id` DESC LIMIT {$startFrom}, 10");

// формуємо масив
$articles = array();
while ($row = mysqli_fetch_assoc($res))
{
    $articles[] = $row;
}

// перетворюємо масив в json
echo json_encode($articles);