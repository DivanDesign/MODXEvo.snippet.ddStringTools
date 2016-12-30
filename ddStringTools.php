<?php
/**
 * ddStringTools
 * @version 1.0 (2016-12-30)
 * 
 * @desc Tools for modifying strings.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.library.ddTools >= 0.16.2.
 * 
 * @param $inputString {string} — The input string. Default: ''.
 * @param $stripTags {0|1} — Strip HTML and PHP tags from a string. Default: 0.
 * @param $stripTags_allowed {string} — Use the parameter to specify tags which should not be stripped. E. g.: '<p><div>'. Default: ''.
 * @param $specialCharsToHTMLEntities {0|1} — Convert special characters to HTML entities. Default: 0.
 * @param $URLEncode {0|1} — URL-encode according to RFC 3986. Default: 0.
 * @param $escapeForJS {0|1} — Escape special characters for JS. Default: 0.
 * 
 * @link http://code.divandesign.biz/modx/ddstringtools/1.0
 * 
 * @copyright 2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

//Include MODXEvo.library.ddTools
require_once $modx->getConfig('base_path').'assets/libs/ddTools/modx.ddtools.class.php';

if (!isset($inputString)){
	$inputString = '';
}

//Strip HTML and PHP tags from a string
if (
	isset($stripTags) &&
	$stripTags == '1'
){
	if (
		isset($stripTags_allowed) &&
		strlen(trim($stripTags_allowed)) > 0
	){
		$inputString = strip_tags($inputString, $stripTags_allowed);
	}else{
		$inputString = strip_tags($inputString);
	}
}

//Convert special characters to HTML entities
if (
	isset($specialCharsToHTMLEntities) &&
	$specialCharsToHTMLEntities == '1'
){
	$inputString = htmlspecialchars($inputString);
}

//Escape special characters for JS
if (
	isset($escapeForJS) &&
	$escapeForJS == '1'
){
	$inputString = ddTools::escapeForJS($inputString);
}

//URL-encode according to RFC 3986
if (
	isset($URLEncode) &&
	$URLEncode == '1'
){
	$inputString = rawurlencode($inputString);
}

return $inputString;
?>