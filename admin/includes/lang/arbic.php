<?php
function lang($phrase){
    static $lang = array(

        'message'=>'مرحبا',
        'admin'=>'المدير'
    );
    return$lang[$phrase];
}
?>