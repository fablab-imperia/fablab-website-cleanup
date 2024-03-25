<?php

require_once "event_management.php";
require_once "blog_management.php";

class Database
{
	private $db_handle;

	function __construct()
	{
		$this->db_handle = new \SQLite3(__DIR__  . '/data.sqlite3');
		$this->db_handle->exec('PRAGMA journal_mode = wal;');
	}

	function event_fetch_one(int $id): ?Event
	{
		$st = $this->db_handle->prepare("SELECT * FROM EVENTS WHERE id=? LIMIT 1;");
		$st->bindValue(1, $id, SQLITE3_INTEGER);

		$res = $st->execute()->fetchArray(SQLITE3_ASSOC);
		if ($res)
		{
			return new Event(
				$res
			);
		}
		else
		{
			return null;
		}
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

	function event_fetch_past(): array
	{
		$now = new \DateTime();
		// Inizio della giornata
		$now->setTime(0,0);

		$st = $this->db_handle->prepare("SELECT * FROM EVENTS WHERE event_timestamp < ? ORDER BY event_timestamp DESC;");
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
		if ($ev->id == -1 || !isset($ev->id))
		{
			$st = $this->db_handle->prepare(
				"INSERT INTO events(title, description, event_timestamp, repeats, where_address, where_map_url, full_text, published) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
			);
			$st->bindValue(1, $ev->title, SQLITE3_TEXT);
			$st->bindValue(2, $ev->description, SQLITE3_TEXT);
			$st->bindValue(3, $ev->event_timestamp, SQLITE3_INTEGER);
			$st->bindValue(4, $ev->repeats, SQLITE3_TEXT);
			$st->bindValue(5, $ev->where_address, SQLITE3_TEXT);
			$st->bindValue(6, $ev->where_map_url, SQLITE3_TEXT);
			$st->bindValue(7, $ev->full_text, SQLITE3_TEXT);
			$st->bindValue(8, $ev->published, SQLITE3_INTEGER);
			$st->execute();
			
			$ev->id = $this->db_handle->lastInsertRowID();
		}
		else
		{
			$st = $this->db_handle->prepare(
				"UPDATE events SET title=?, description=?, event_timestamp=?, repeats=?, where_address=?, where_map_url=?, full_text=?, published=?, open_day=? WHERE id=?"
			);
			$st->bindValue(1, $ev->title, SQLITE3_TEXT);
			$st->bindValue(2, $ev->description, SQLITE3_TEXT);
			$st->bindValue(3, $ev->event_timestamp, SQLITE3_INTEGER);
			$st->bindValue(4, $ev->repeats, SQLITE3_TEXT);
			$st->bindValue(5, $ev->where_address, SQLITE3_TEXT);
			$st->bindValue(6, $ev->where_map_url);
			$st->bindValue(7, $ev->full_text, SQLITE3_TEXT);
			$st->bindValue(8, $ev->published, SQLITE3_INTEGER);
			$st->bindValue(9, $ev->open_day, SQLITE3_INTEGER);
			$st->bindValue(10, $ev->id, SQLITE3_INTEGER);
			$res = $st->execute();
		}
	}

	function event_delete(int $id)
	{
		$st = $this->db_handle->prepare("DELETE FROM EVENTS WHERE id = ?;");
		$st->bindValue(1, $id, SQLITE3_INTEGER);
		$res = $st->execute();
	}


	// ---------------
	// Gestione BLOG
	function blog_fetch_all()
	{
		$st = $this->db_handle->prepare("SELECT * FROM BLOG ORDER BY creation_timestamp DESC;");
		$res = $st->execute();
		
		$resulting_array = [];
		while($result = $res->fetchArray(SQLITE3_ASSOC))
		{
			$ev = new Blog($result);
			array_push(
				$resulting_array,
				$ev
			);
		}
		return $resulting_array;
	}

	function blog_fetch_one(int $id)
	{
		$st = $this->db_handle->prepare("SELECT * FROM BLOG WHERE id=? LIMIT 1;");
		$st->bindValue(1, $id, SQLITE3_INTEGER);

		$res = $st->execute()->fetchArray(SQLITE3_ASSOC);
		if ($res)
		{
			return new Blog(
				$res
			);
		}
		else
		{
			return null;
		}
	}



	function __destruct()
	{
		$this->db_handle->close();
	}

	function __manual_free()
	{
		$this->db_handle->close();
	}
}

?>