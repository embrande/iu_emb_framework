<?php 
    require_once("functions_classes.php");
    echo $template_name;
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
 
        register_javascript_header(
            'jquery',
            'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
            'javascript',
            'false'
        );
 
        register_javascript_header(
            'name',
            'global.js',
            'jquery',
            ''
        );
 
        register_javascript_header(
            'name3',
            'darivative.js',
            'jquery_test',
            ''
        );
 
        register_javascript_header(
            'name4',
            'gooooo.js',
            'jquery_test',
            ''
        );
 
        register_javascript_header(
            'name5',
            'globagule.js',
            'name3',
            ''
        );
 
    }
    enqueue_functions('function_register_javascript_header', '', '', '');
 
     
 
 
 
    /*
        Executes functions from array
        This should be the last function.
    */
    // function_register_javascript_header();

    //call based on global variable
    execute_functions('FUN_QUEUE');
 
 
    // print_r($GLOBALS['HEADER_JAVASCRIPT']);
 
     
 
?>