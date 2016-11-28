<?php

	function register_javascript_header($name, $file_path, $dependant_name){

		$javascript_file = new register_javascript_header;

		$javascript_file->set_variables($name, $file_path, $dependant_name);

	}

	//register javascript for the header
	class class_register_javascript_header
	{

		var $name;
		var $file_path;
		var $dependant_name;
		var $header_javascript_array;

		function set_variables($name, $file_path, $dependant_name){

			$this->name = $name;
			$this->file_path = $file_path;
			$this->dependant_name = $dependant_name;
			$this->header_javascript_array = $header_javascript_array;

			set_file_path();
			sort_registered_javascript();
			
		}

		function add_to_javascript_array(){

		}

		function set_file_path(){

			//get the file path, and based off of a php value set it to the js folder and concatinate it to what the array the user sent

		}


		function create_add_to_array(){

			
			
		}

		function sort_registered_javascript_and_compare(){

			//sort array and compare to global array to see if it's already in it by name.
			//then, based on dependencies, place it into variable. If none, place at end.

			global $HEADER_JAVASCRIPT;

			//place global array into a local variable
			$this->header_javascript_array = $HEADER_JAVASCRIPT;
			
		}

	}


	//enqueues functions
	function enqueue_functions($name, $dependant_name){

		if(isset($GLOBALS['UTILITY_FUNCTIONS'])){
			$UTILITY_FUNCTIONS = $GLOBALS['UTILITY_FUNCTIONS']; 
		}

		if($dependant_name){
			echo "eric";
		}

	}
	//executes functions
	function execute_functions(){

		//loop through array set in enqueue funcitons and execute them;

	}



?>