<?php

    function form_error($label_feild){
        global $error;
        if(!empty($error[$label_feild]))
            return "<p class='error'>{$error[$label_feild]}</p>";
    }

    function set_value($label_feild){
        global $$label_feild;
        if(empty($error[$label_feild]))
            return  $$label_feild;
    }



?>