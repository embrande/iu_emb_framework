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

	$eric_test[] = array("name" => "window_scroll", "location" => "/window_scroll/default.js", "dependant_on" => "sss", "local_file" => "true");
	$eric_test[] = array("name" => "jquery", "location" => "http://something.or.another", "dependant_on" => "javascript_library", "local_file" => "false");
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

		public function sort_registered_and_compare($global_var, $array_name, $dependant_on, $value_of_passed, $local_file ){

			//sort array and compare to global array to see if it's already in it by name.
			//then, based on dependencies, place it into variable. If none, place at end.

			$gb = $GLOBALS[$global_var];

			//place global array into a local variable
			$global_array = $gb;

			//see if dependant name is already inside of the array
			if( isset($dependant_on) && (!empty($dependant_on)) ){

				//if a dependent is listed
				$printing_value = self::in_array_dependentent_on_r($dependant_on, $global_var, $dependant_variable = "dependant_on");

				self::place_into_array($printing_value, $global_var, $inserted_array = array("name" => $array_name, "location" => $value_of_passed, "dependant_on" => $dependant_on, "local_file" => $local_file));
				


			}else{

				//does not have a dependent value

			}


			
		}

		/*
			Variables to be passed to use this should be the variable you're looking for; 
			the array you're looking in; and the dependant variable you're looking at (this should be an array for an associative multidimensional array.
		*/
		public function in_array_dependentent_on_r($needle, $haystack, $dependant_variable) {
			


			$gb = $GLOBALS[$haystack];
			$global_array = $gb;
			$global_array_count = count($global_array);
			$return_value = "";


			if( $global_array_count != 0){
				foreach($global_array as $key => $value){
				
					//loop through array. 
					if( $global_array[$key][$dependant_variable] == $needle){
						//Find array key dependant on and compare it to needle. If there is a match return array.
						return $key;
					}else{
						$return_value = $key;
					}
				}

				//this should only be reached if there is no match found. This will return the last value if It can't find anything.
				return $return_value;

			}else{
				return $global_array_count;
			}

		}


		public function place_into_array($index, $array, $inserted_array){
			
			$gb = $GLOBALS[$array];
			$global_array = $gb;


			print_r ( $global_array );

			if( empty($global_array) ){
				$GLOBALS[$array][] = $inserted_array;
			}else{

				if($index == 0){$index = 1;}else{$index=$index;}

				$res = array_slice($global_array, 0, $index, true);

				print_r($res);

				$GLOBALS[$array] = $res;

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

			parent::sort_registered_and_compare('HEADER_JAVASCRIPT', $this->name, $this->dependant_name, $this->file_path, $this->local);

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