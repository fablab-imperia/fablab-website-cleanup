<?php

class Event
{
	public int $id;
	public string $title;
	public string $description;
	public int $event_timestamp;

	public ?string $repeats;
	public string $where_address;
	public ?string $where_map_url;
	public bool $published;
	public bool $open_day;

	public string $full_text;


	function __construct($db_row)
	{
		$this->id = $db_row["id"];
		$this->title = $db_row["title"];
		$this->description = $db_row["description"];
		$this->event_timestamp = intval($db_row["event_timestamp"]);

		$this->repeats = $db_row["repeats"];
		if ($this->repeats === "")
		{
			$this->repeats = null;
		}
		$this->where_address = $db_row["where_address"];
		$this->where_map_url = $db_row["where_map_url"];
		if ($this->where_map_url === "")
		{
			$this->where_map_url = null;
		}

		$this->published = boolval($db_row["published"]);
		$this->open_day = boolval($db_row["open_day"]);
		$this->full_text = $db_row["full_text"];
	}

	function get_datetime(): \DateTime
	{
		$d = new \DateTime();
		$d->setTimestamp(
			intval($this->event_timestamp)
		);
		return $d;
	}

	function render_open_day_badge(): string
	{
		if ($this->open_day)
		{
			return '<span class="bold"> <i class="fa fa-fw fa-user-plus"></i>  Open day</span>';
		}
		else
		{
			return '<span class="bold"> <i class="fa fa-fw fa-users"></i> Riservato ai soci</span>';;
		}
	}

	function render_metadata(): string
	{
		if ($this->repeats)
		{
			$repeats_string = "<li> <span class=\"bold\"> <i class=\"fa fa-fw fa-repeat\"></i> Poi si ripete:&nbsp;</span>" . $this->repeats . "</li>";
		}
		return sprintf("<ul>
			<li> <span class=\"bold\"><i class=\"fa fa-fw fa-calendar\"></i> Quando:</span> %s</li>
			%s
			<li> <span class=\"bold\"> <i class=\"fa fa-fw fa-map-marker\"></i> Dove:</span> %s</li>
			<li>%s</li>
			</ul>",
			date("j/n/Y, H:i", $this->event_timestamp),
			$repeats_string,
			$this->where_address,
			$this->render_open_day_badge(),
		);
	}


	function render_as_card(bool $lazy_load_images=false)
	{
		if (is_file($this->gen_image_path_low()))
		{
			$lazy_text = $lazy_load_images? " loading=\"lazy\"":"";
			$grid_picture_html = '
			<div class="row">
				<div class="col-12 order-md-1 order-12 col-md-6">
				' . $this->render_metadata() .'
				</div>
				<div class="col-12 order-md-12 order-1 col-md-6">
				<img ' . $lazy_text . ' class="img-fluid wide rounded" src="'.$this->gen_image_url_low().'">
				</div>
			</div>';
		}
		else
		{
			$grid_picture_html = '<div class="row">
				<div class="col-12">
				' . $this->render_metadata() .'
				</div>
			</div>';
		}
		
		printf("
		<div class=\"card card-opaque\">
			<header>
			<h1>%s</h1>
			<p>%s</p>
				%s
			</header>
			<a href=\"%s\" class=\"btn btn-primary\">
			Scopri il programma
			</a>
		</div>
		",
		htmlentities($this->title),
		htmlentities($this->description),
		$grid_picture_html,
		$this->generate_url()
		);
	}

	function generate_url():string
	{
		return "/eventi/details.php?id=" . $this->id;
	}

	function gen_image_path():string
	{
		return __DIR__ . "/../eventi/media/" . $this->id .".jpg";
	}
	function gen_image_path_low():string
	{
		return __DIR__ . "/../eventi/media/" . $this->id ."_low.jpg";
	}
	function gen_image_url():string
	{
		return "/eventi/media/" . $this->id .".jpg";
	}
	function gen_image_url_low():string
	{
		return "/eventi/media/" . $this->id ."_low.jpg";
	}
}


?>