<?php 
    require_once("functions_classes.php");
    /* Global Variables:
 
        $HEADER_JAVASCRIPT
 
    */
 
    /*
        -Get and register chunks from the chunks folder
    */
 
    /*
        -Get and register header javascript and css specific folders
        -Function expects (name,path[use variable $jsPath to reference js folder] / file name,name of dependant on, false if not a local file)
    */
    function function_register_javascript_header(){
 
        enqueue_scripts(
            'jquery',
            'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
            '',
            'false'
        );
 
        enqueue_scripts(
            'name',
            'global.js',
            'jquery',
            ''
        );
 
        enqueue_scripts(
            'name3',
            'darivative.js',
            'name',
            ''
        );
 
        enqueue_scripts(
            'name4',
            'gooooo.js',
            'name',
            ''
        );
 
        enqueue_scripts(
            'name5',
            'globagule.js',
            'name3',
            ''
        );
 
    }
    enqueue_functions('function_register_javascript_header', '', '', '');
    enqueue_functions('function_test_dep', '', 'function_register_javascript_header', '');
    enqueue_functions('function_test_dep_2', '', 'doesnt_work_not_dependant_on_anything', '');
    enqueue_functions('function_test_dep_3', '', 'function_test_dep', '');
    enqueue_functions('function_test_dep_4', '', 'function_register_javascript_header', '');

    function_register_javascript_header();




 
     
 
 
 
    /*
        Executes functions from array
        This should be the last function.
    */
    // function_register_javascript_header();

    //call based on global variable
    //execute_functions('FUN_QUEUE');
    //execute_scripts('FUN_QUEUE');
 
 
    // print_r($GLOBALS['HEADER_JAVASCRIPT']);
 
     
 
?>