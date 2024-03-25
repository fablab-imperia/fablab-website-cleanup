<?php

class Blog
{
	public int $id;
	public string $title;
	public string $description;
	public int $reation_timestamp;
	public string $full_text;


	function __construct($db_row)
	{
		$this->id = $db_row["id"];
		$this->title = $db_row["title"];
		$this->description = $db_row["description"];
		$this->creation_timestamp = intval($db_row["creation_timestamp"]);
		$this->published = boolval($db_row["published"]);
		$this->full_text = $db_row["full_text"];
	}

	// function get_datetime(): \DateTime
	// {
	// 	$d = new \DateTime();
	// 	$d->setTimestamp(
	// 		intval($this->event_timestamp)
	// 	);
	// 	return $d;
	// }


	function render_as_card(bool $lazy_load_images=false)
	{

		if (is_file($this->gen_image_path_low()))
		{
			$lazy_text = $lazy_load_images? " loading=\"lazy\"":"";
			$grid_picture_html = '
			<div class="row">
				<div class="col-12 order-md-1 order-12 col-md-6">
                <p>' . htmlentities($this->description) .'</p>
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
				<p>' . htmlentities($this->description) .'</p>
				</div>
			</div>';
		}
		
		printf("
		<div class=\"card card-opaque\">
			<header>
			<h1>%s</h1>
            <time>%s</time>
				%s
                
			</header>
			<a href=\"%s\" class=\"btn btn-primary\">
			Leggi
			</a>
		</div>
		",
		htmlentities($this->title),
        date("j/n/Y, H:i", $this->creation_timestamp),
		$grid_picture_html,

		$this->generate_url()
		);
	}

	function generate_url():string
	{
		return "/blog/details.php?id=" . $this->id;
	}

	function gen_image_path():string
	{
		return __DIR__ . "/../blog/media/" . $this->id .".jpg";
	}
	function gen_image_path_low():string
	{
		return __DIR__ . "/../blog/media/" . $this->id ."_low.jpg";
	}
	function gen_image_url():string
	{
		return "/blog/media/" . $this->id .".jpg";
	}
	function gen_image_url_low():string
	{
		return "/blog/media/" . $this->id ."_low.jpg";
	}
}


?>