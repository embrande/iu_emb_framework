<?php

	/*
		Global variables used in classes
	*/
	$GLOBALS['FUN_QUEUE'] = [];
	$GLOBALS['HEADER_JAVASCRIPT'] = [];

	/*
		delete
	*/
	$eric_test = [];

	$eric_test[] = array("name" => "jquery", )
	/*
		here
	*/


	function register_javascript_header($name, $file_path, $dependant_name, $local){

		$javascript_file = new class_register_javascript_header;

		$javascript_file->set_variables($name, $file_path, $dependant_name, $local);

	}

	class shared_register_class {



		public function set_file_path($global_var){

			//get the file path, and based off of a php value set it to the js folder and concatinate it to what the array the user sent
			$gb = $GLOBALS[$global_var];


			if($this->local == 'true'){
				return $gb . $this->file_path;
			}else{
				return $this->file_path;
			}

		}

		public function sort_registered_and_compare($global_var, $array_name, $dependant_on, $value_of_passed ){

			//sort array and compare to global array to see if it's already in it by name.
			//then, based on dependencies, place it into variable. If none, place at end.

			$gb = $GLOBALS[$global_var];

			//place global array into a local variable
			$global_array = $gb;

			//see if dependant name is already inside of the array
			if( isset($dependant_on) && (!empty($dependant_on)) ){

				//if a dependent is listed

				echo $dependant_on . " " . $global_var . "\r\n";


				$printing_value = self::in_array_r($dependant_on, $global_var);
				print_r( $printing_value );
				/*
				if(!self::in_array_r($dependant_on, $global_var)) {
			     	echo "true";
				}else{
					echo "false";
				}
				*/


			}else{

				//does not have a dependent

			}


			/*
			if(isset($global_array) && (!empty($global_array)) ){

				//if the global variable is both set and does not equal no value
				print_r( $global_array );

			}else{

				//if the global variable is either not set or empty
				echo 'for fears';

			}
			*/

			
		}


		public function in_array_r($needle, $haystack) {
			
			$gb = $GLOBALS[$haystack];
			$global_array = $gb;

			global $eric_test;
			
			foreach($eric_test as $element){
				if(in_array($needle, $element)){
					return $element;
				}else{
					return "false";
				}
			}
			
		}

	}

	//register javascript for the header
	class class_register_javascript_header extends shared_register_class 
	{

		var $name;
		var $file_path;
		var $dependant_name;
		var $header_javascript_array;

		function __construct(){

		}

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

			$this->file_path = parent::set_file_path('JAVASCRIPT_FILE_PATH');

			self::sort_registered_and_compare_child();
			
		}

		public function sort_registered_and_compare_child(){

			parent::sort_registered_and_compare('HEADER_JAVASCRIPT', $this->name, $this->dependant_name, $this->file_path);

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