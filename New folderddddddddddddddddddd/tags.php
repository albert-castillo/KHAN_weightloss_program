<?php
// Function to ensure HTML text is only encoded once
function html_convert($text) {
    if ( htmlspecialchars_decode($text) == $text ) {
        return htmlspecialchars($text);
    } else {
        return $text;
    }
}

?>