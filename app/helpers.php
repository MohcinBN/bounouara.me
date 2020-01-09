<?php 

namespace App;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

  class BlogHelper{
    function __construct()
    {
        echo 'test';
    }
    public static function test2()
    {
        return 'test helpers';
    }

    public static function text_direction(){
        
        $language = 'arabic'; //or 'english' //set the system language
        $rtl = array('arabic','hebrew','urdu'); //make a list of rtl languages
        $textdir = 'ltr';
        if (in_array($language,$rtl)) { //is this a rtl language?
            $textdir = 'rtl'; //switch the direction
        } //end if

        else {
            $textdir = 'ltr';
        }

        return $textdir;

    }

}

?>