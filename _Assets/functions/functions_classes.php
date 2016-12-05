<?php

	/*
		Global variables used in classes
	*/
	$GLOBALS['FUN_QUEUE'] = [];


	function register_javascript_header($name, $file_path, $dependant_name, $local){

		$javascript_file = new class_register_javascript_header;

		$javascript_file->set_variables($name, $file_path, $dependant_name, $local);

	}

	//register javascript for the header
	class class_register_javascript_header
	{

		var $name;
		var $file_path;
		var $dependant_name;
		var $header_javascript_array;

		public function set_variables($name, $file_path, $dependant_name, $local){

			if( ($local == 'false') || ($this == '') ){
				$this->local = $local;
			}else{
				$this->local = 'true';
			}

			$this->name = $name;
			$this->file_path = $file_path;
			$this->dependant_name = $dependant_name;
			$this->header_javascript_array = '';

			$this->set_file_path();
			//sort_registered_javascript();
			
		}

		function add_to_javascript_array(){

		}

		public function set_file_path(){

			//get the file path, and based off of a php value set it to the js folder and concatinate it to what the array the user sent
			global $JAVASCRIPT_FILE_PATH;

			if($this->local == 'true'){
				$this->file_path = $JAVASCRIPT_FILE_PATH . $this->file_path;
			}else{
				$this->file_path = $this->file_path;
			}

		}


		function create_add_to_array(){

			
			
		}

		function sort_registered_javascript_and_compare(){

			//sort array and compare to global array to see if it's already in it by name.
			//then, based on dependencies, place it into variable. If none, place at end.

			global $FUN_QUEUE;

			//place global array into a local variable
			$this->header_javascript_array = $HEADER_JAVASCRIPT;

			if(isset($GLOBALS['FUN_QUEUE']) && ($GLOBALS['FUN_QUEUE'] !== '')){

				//If there are already values inside of the Global variable.
				$utility_functions = $GLOBALS['FUN_QUEUE']; 

			}else{

				echo 'here';

				//if there isn't, place at the end of the array
				$GLOBALS['FUN_QUEUE'][] = ['script_name' => $script_name, 'script_path' => $script_path]; 

			}

			
		}

	}


	

	//enqueues functions
	function enqueue_functions($name, $dependant_name){

		//adds functions to queue 

	}
	//executes functions
	function execute_functions(){

		//loop through array set in enqueue funcitons and execute them;

	}



?>