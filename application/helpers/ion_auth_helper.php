<?php

/** 
 * Mendapatkan informasi user
*/
function get_user()
{
	$CI =& get_instance();
	
	$user = $CI->ion_auth->user()->row();		

	return $user;	
}

//--------------------------------------------------------------

/** 
 * Mendapatkan informasi id user login
*/
function get_user_id()
{
	$get_user = get_user();
	return $get_user->id;
}

//--------------------------------------------------------------

/** 
 * Mendapatkan informasi user fullname
*/

function get_fullname()
{
	$get_user = get_user();	
	$get_first_name = $get_user->first_name;

	return $get_first_name;
}