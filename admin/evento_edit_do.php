<?php
require __DIR__ . "/../private/event_management.php";
require __DIR__ . "/../private/database.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $obj = $_POST;
    if (!array_key_exists("repeats", $obj))
    {
        $obj["repeats"] = null;
    }
    $obj["event_timestamp"] = strtotime($obj["date"] . " " . $obj["time"]);
    $e = new Event($obj);
    $db = new Database();
    $db->event_save($e);
    require __DIR__ . "/../private/feed_generation.php";
    header('Location: /admin/evento_edit.php?id=' . $e->id);
}
?>