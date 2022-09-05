<?php

class Controller extends Query
{

	public function CreateView($viewName){
		require_once("../Views/{$viewName}.php");
	}

}
