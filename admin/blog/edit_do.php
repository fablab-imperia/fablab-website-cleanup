<?php
require __DIR__ . "/../../private/blog_management.php";
require __DIR__ . "/../../private/database.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $obj = $_POST;
    $obj["creation_timestamp"] = strtotime($obj["date"] . " " . $obj["time"]);
    $e = new Blog($obj);
    $db = new Database();
    $db->blog_save($e);
    require __DIR__ . "/../../private/feed_generation.php";
    header('Location: /admin/blog/edit.php?id=' . $e->id);
}
?>