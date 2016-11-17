<?php

	function register_javascript_header($name, $file_path, $dependant_name){

		$javascript_file = new register_javascript_header;

		$javascript_file->set_variables($name, $file_path, $dependant_name);
		$javascript_file->add_to_javascript_array;

	}


	class class_register_javascript_header
	{

		var $name;
		var $file_path;
		var $dependant_name;

		function set_variables($name, $file_path, $dependant_name){

			$this->name = $name;
			$this->file_path = $file_path;
			$this->dependant_name = $dependant_name;
			
		}

		function add_to_javascript_array(){

			sort_registered_javascript();

		}

		function set_file_path(){

			
		}


		function create_add_to_array(){

			
		}

		function sort_registered_javascript(){

			
		}

	}



?>