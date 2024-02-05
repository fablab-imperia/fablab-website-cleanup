<?php namespace Database;

class Event
{
    public int $id;
    public string $title;
    public string $description;
    public string $event_timestamp;

    public ?string $repeats;
    public string $where_address;
    public string $where_map_url;


    function __construct($db_row)
    {
        $this->id = $db_row["id"];
        $this->title = $db_row["title"];
        $this->description = $db_row["description"];
        $this->event_timestamp = $db_row["event_timestamp"];

        $this->repeats = $db_row["repeats"];
        $this->where_address = $db_row["where_address"];
        $this->where_map_url = $db_row["where_map_url"];
    }

    function get_datetime(): \DateTime
    {
        $d = new \DateTime();
        $d->setTimestamp(
            intval($this->event_timestamp)
        );
        return $d;
    }
}


?>