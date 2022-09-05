<?php

//To invoke a function when the route assigns a get URL

class Route
{
	public static function set($route, $function){
			if($_GET['url'] == $route){
					$function->__invoke();
			}
	}
}
