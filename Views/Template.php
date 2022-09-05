<?php

class Template
{
	public static $page_title = "Games Galore";
	public static $bootstrap_css_link = "/vendor/twbs/bootstrap/dist/css/bootstrap.min.css";
	public static $bootstrap_js_link = "/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js";
	public static $jquery_js_link = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js";

	public static function load_external_assets(){
		$html .= "<script src=\"".self::$jquery_js_link."\" crossorigin=\"anonymous\"></script>";
		$html .= "<link href=\"".self::$bootstrap_css_link."\" rel=\"stylesheet\"  crossorigin=\"anonymous\">";
		$html .= "<script src=\"".self::$bootstrap_js_link."\" crossorigin=\"anonymous\"></script>";

		return $html;
	}

	public static function html_top(){
		$html .= "<!doctype html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>".self::$page_title ."</title>";

		$html .= self::load_external_assets();
		$html .= "</head>
  <body>";
	}

	public static function banner(){

	}

	public static function menu(){

	}

	public static function html_bottom(){

	}
}
