<?php namespace Database;

require "event_management.php";
require "config.php";


class Db
{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new \SQLite3(__DIR__  . '/data.sqlite3');
    }

    function event_fetch_one(int $id): Event
    {
        $st = $this->db_handle->prepare("SELECT * FROM EVENTS WHERE id=? LIMIT 1;");
        $st->bindValue(1, $id, SQLITE3_INTEGER);

        return new Event(
            $st->execute()->fetchArray(SQLITE3_ASSOC)
        );
    }

    /// Restituisce array<Event>
    function event_fetch_future(): array
    {
        $now = new \DateTime();
        // Inizio della giornata
        $now->setTime(0,0);

        $st = $this->db_handle->prepare("SELECT * FROM EVENTS WHERE event_timestamp >= ? ORDER BY event_timestamp;");
        $st->bindValue(1, $now->getTimestamp(), SQLITE3_INTEGER);
        $res = $st->execute();

        $resulting_array = [];

        while($result = $res->fetchArray(SQLITE3_ASSOC))
        {
            $ev = new Event($result);
            array_push(
                $resulting_array,
                $ev
            );
        }

        return $resulting_array;
    }

    function event_save(Event $ev)
    {
        // Se id evento è -1, vuol dire che devo aggiungerlo
        // Se è impostato a qualcosa, devo aggiornarne i dati
        if ($ev->id == -1)
        {
            $st = $db_handle->prepare(
                "INSERT INTO events(title, description, event_timestamp, repeats, where_address, where_map_url) VALUES (?, ?, ?, ?, ?, ?)"
            );
            $st->bind_param(
                "ssisss",
                $ev->title,
                $ev->description,
                $ev->event_timestamp,
                $ev->repeats,
                $ev->where_address,
                $ev->where_map_url
            );
            $st->execute();
            
            $ev->id = $this->db_handle->insert_id;
        }
        else
        {
            $st = $db_handle->prepare(
                "UPDATE events SET title=?, description=?, event_timestamp=?, repeats=?, where_address=?, where_map_url=? WHERE id=?"
            );
            $st->bind_param(
                "ssisssi",
                $ev->title,
                $ev->description,
                $ev->event_timestamp,
                $ev->repeats,
                $ev->where_address,
                $ev->where_map_url,
                $ev->id
            );
            $st->execute();
        }
    }

    function __destruct()
    {
        $this->db_handle->close();
    }
}

?>