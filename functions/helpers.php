<?php
/**
 * Custom function for showing var_dump() result decorated on browser
 */
function pvd( $var ) {
	echo "<pre style='font-size:16px; overflow-x: hidden; '>";
	var_dump( $var );
	echo "</pre>";
}

/**
 * @param $filename
 *
 * @return void
 */
function get_image( $filename ) {
	echo get_template_directory_uri() . '/resources/img/' . $filename;
}

/**
 * @param $file
 * @param $is_fromlibrary
 *
 * @return void
 */
function inline_svg( $file, $is_fromlibrary = null ) {
	if ( $is_fromlibrary ) {
		echo file_get_contents( $file );
	} else {
		echo file_get_contents( get_template_directory() . '/resources/img/' . $file );
	}
}


/**
 * @param string $item
 */
function get_clean_phone( $item ) {
	if ( empty( $item ) ) {
		return false;
	}

	return preg_replace( "/[^0-9]/", "", $item );
}

function regex_text_to_span( $text ) {

	if ( empty( $text ) ) {
		return false;
	}

	return preg_replace( '/\[(.*?)\]/', '<span>$1</span>', $text );

}

if (!function_exists("checker_value")) {
	/* Checker value
	** Example how to use by array --> checker_value($var, 'image', true);
	** Example how to use default --> checker_value($var, 'text');
	** Example how to use if need return something --> checker_value($var, 'text', false, 'return-some-value');
	*/
	function checker_value($value, $keyName, $isArr = false, $returnVal = false)
	{
		if ($isArr) {
			//Check array on isset and not empty
			return (isset($value[$keyName]) && is_array($value[$keyName]) && !empty($value[$keyName])) ? $value[$keyName] : $returnVal;
		} else {
			//Check default value on isset and not empty
			return (isset($value[$keyName]) && !empty($value[$keyName])) ? $value[$keyName] : $returnVal;
		}
	}
}