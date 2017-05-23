<?php
 
    /*
        Global variables used in classes
    */
    $GLOBALS['FUN_QUEUE'] = [];
    $GLOBALS['HEADER_JAVASCRIPT'] = [];
 
 
 
    function register_javascript_header($name, $file_path, $dependant_name, $local){
 
        $javascript_file = new class_register_javascript_header;
 
        $javascript_file->set_variables($name, $file_path, $dependant_name, $local);
 
    }
 
    class shared_register_class {
 
 
 
        public function set_file_path($global_var){
 
            //get the file path, and based off of a php value set it to the js folder and concatinate it to what the array the user sent
            $gb = $GLOBALS[$global_var];
            $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
            echo "<br />" . $root . "<br />";
 
            if($this->local == 'true'){
                return "https://" . $_SERVER["HOME"] . $gb . $this->file_path;
            }else{
                return $this->file_path;
            }
 
        }
 
        public function sort_registered_and_compare($global_var, $array_name, $dependant_on, $value_of_passed, $local_file ){
 
    
 
            //place global array into a local variable
            $global_array = $GLOBALS[$global_var];
 
            //see if dependant name is already inside of the array
            if( isset($dependant_on) && (!empty($dependant_on)) ){
                foreach ($global_array as $gb) {
                   
                    if($gb['name'] == $dependant_on){

                        // the dependant name is a name of a "name" in the array
                        $key = array_search($gb, $global_array) + 1;
                        $insert_array = array("name" => $array_name, "location" => $value_of_passed, "dependant_on" => $dependant_on, "local_file" => $local_file);

                        $this->array_insert( $global_array, $key, $insert_array );
                        $GLOBALS[$global_var] = $global_array;

                    }else{
                    }

                }

                 
            }else{

                //does not have a dependent value
                if( count($GLOBALS[$global_var]) == 0 ){
                    // nothing in global array
                    $GLOBALS[$global_var][0] = array("name" => $array_name, "location" => $value_of_passed, "dependant_on" => $dependant_on, "local_file" => $local_file);
                }else{
                    // loop through the variable - make sure the array name isn't already in the global array
                    foreach ($global_array as $gb) {
                        if($gb['name'] !== $array_name){
                            $GLOBALS[$global_var][] = array("name" => $array_name, "location" => $value_of_passed, "dependant_on" => $dependant_on, "local_file" => $local_file);
                        }
                    }
                }
            }  

        }

        /*
            $array is the array to be modified
            $offset is the position where we want to insert our object. It needs to be positive and within the limits given by the dimension of the array. If it is less than 0, the object will be inserted as the first element; if it is over the maximum dimension, the object will be inserted as the final element.
            $object is the object to be inserted.
            $replace is an optional parameter that indicates if the array element is going to be replaced. Default is false.
        */
        function array_insert(&$array, $offset, $object, $replace=false){
            
            if(is_array($array)){
                if($replace ){
                    if($offset<0) $offset = 0;
                    else if($offset > count($array)-1) $offset = count($array)-1;
                    $a1 = array_slice($array, 0, $offset);
                    $a2 = array_slice($array, $offset+1);
                    array_push($a1, $object);
                    $array = array_merge($a1, $a2);
                }else{            
                    if($offset == 0){
                        array_unshift($array, $object);
                    }else if($offset >= count($array)){
                        array_push($array, $object);
                    }else{                
                        $a1 = array_slice($array, 0, $offset);
                        $a2 = array_slice($array, $offset);
                        array_push($a1, $object);
                        $array = array_merge($a1, $a2);
                    }
                }
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
 
            //passed values: 
            //THE INDEX of where the dependant is at. If it is a 0, then the dependant either doesn't work or it at the first position.
             
            $gb = $GLOBALS[$array];
            $global_array = $gb;
 
 
            if( empty($global_array) ){
                $GLOBALS[$array][] = $inserted_array;
            }else{
 
 
                 
                $GLOBALS[$array][] = $inserted_array;
 
                /*
 
 
                    Below is code that is trying to place the passed array into the global variable AFTER its dependant on. 
                    I was having trouble using the array_slice. I couldn't get the array to cut after the passed index value which is where the dependant name is. 
                    This way the developer can place script on any page without having to worry if the script will be after its dependant. Also, so the developer
                    doesn't have to make sure on the functions page that it's in the correct order.
 
 
                */
 
                // if($index == 0){$index = 1;}else{$index=$index;}
 
                // // $res = array_slice($global_array, 0, $index, true);
                // $res = array_splice($global_array, $index, 0, true);
 
                // print_r($GLOBALS[$array]);
 
                // $GLOBALS[$array] = $res;
 
            }
 
        }
 
    }



     
 
    //enqueues functions
    function enqueue_scripts($name, $file_path, $dependant_name, $local){
 
        $file_set = new enqueue_scripts_class;
 
        $file_set->set_variables($name, $file_path, $dependant_name, $local);
 
    }
 
    //register javascript for the header
    class enqueue_scripts_class extends shared_register_class 
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
    function enqueue_functions($name, $file_path, $dependant_name, $local){
 
        $function_set = new enqueue_functions_class;
 
        $function_set->set_variables($name, $file_path, $dependant_name, $local);
 
    }
 
    class enqueue_functions_class extends shared_register_class
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
 
            self::sort_registered_and_compare_child();
             
 
        }
 
 
        public function sort_registered_and_compare_child(){
            parent::sort_registered_and_compare('FUN_QUEUE', $this->name, $this->dependant_name, $this->file_path, $this->local);
        }
 
    }
 
 
 
    //executes functions
    function execute_functions($variable){
 
        $local_var = $GLOBALS[$variable];


        //loop through array set in enqueue funcitons and execute them;
        foreach( $local_var as $item){

            $function_name = $item['name'];

            $function_name();

        }
 
    }


    function execute_scripts($variable){

        $local_var = $GLOBALS[$variable];


        foreach ( $local_var as $item ){

            echo '<script type="text/javascript" src="' . $item['location'] . '"></script>';
            echo "\n";

        }


    }
 




    function template_define(){


        

    }









    class pull_apart_file_for_call 
    {


        //pull apart name, add to 'defined_passed variable' and pull that


    }
 

    class header_call extends pull_apart_file_for_call
    {
        
    } 
 

    class navigation_call extends pull_apart_file_for_call
    {
        
    } 
 

    class footer_call extends pull_apart_file_for_call
    {
        
    } 

    function display_template(){

        echo $GLOBALS['template'];

    }
?>