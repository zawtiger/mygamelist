<?php

//Headers and footers and such.

class Template
{
	public static $page_title = "My Game List";
	public static $bootstrap_css_link = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css";
	public static $bootstrap_js_link = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js";
	public static $jquery_js_link = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js";

	public static function load_external_assets(){
		$html .= "<script src=\"".self::$jquery_js_link."\" crossorigin=\"anonymous\"></script>";
		$html .= "<link href=\"".self::$bootstrap_css_link."\" rel=\"stylesheet\" crossorigin=\"anonymous\">";
		$html .= "<script src=\"".self::$bootstrap_js_link."\" crossorigin=\"anonymous\"></script>";

		return $html;
	}

	public static function html_top(){
		$html .= "<!doctype html>
		<html lang=\"en\">
	  	<head>
		    <meta charset=\"utf-8\">
		    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
		    <title>".self::$page_title."</title>";

				$html .= self::load_external_assets();
			$html .= "</head>
  	<body>";

		return $html;
	}

	public static function banner(){

		$html .= "<div class=\"border shadow p-3\"><h2>". self::$page_title ."</h2></div>";
		return $html;
	}

	public static function menu(){
		return $html;
	}

	public static function html_bottom(){

		$html .= "</body></html>";
		return $html;
	}
}
