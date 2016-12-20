1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
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
    execute_functions();
 
 
    // print_r($GLOBALS['HEADER_JAVASCRIPT']);
 
     
 
?>