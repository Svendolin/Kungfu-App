<?php
function highlight($content, $word) {
	// create replacement
    $replace = '<span style="background-color: #FF0;">' . $word . '</span>';
     // replace content
    $content = str_ireplace( $word, $replace, $content );
    return $content;
}
?>
