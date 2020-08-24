<?php
function SplitStr($str,$len) {
    $string = $str;

    $string = strip_tags($string);
    if (strlen($string) > $len) {

        // truncate string
        $stringCut = substr($string, 0, $len);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= "...";
    }
    return $string;
}