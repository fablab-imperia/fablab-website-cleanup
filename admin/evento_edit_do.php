<?php
require "../private/event_management.php";
require "../private/database.php";


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
    header('Location: /admin/evento_edit.php?id=' . $e->id);
}
?>