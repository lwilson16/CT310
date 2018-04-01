<?php

namespace Model;

class Florida extends \Orm\Model
{

	public function __construct($id = null)
	{
	}
	
	public static function getAttraction(){
        $result = \DB::select('*')->from('attractions')->as_assoc()->execute();
		return $result;
	}

	public static function getAttractionName(){
		$result = \DB::select('attractionName')->from('attractions')->as_assoc()->execute();
		return $result;
	}
	
	public static function getAttractionDesc(){
		$result = \DB::select('description')->from('attractions')->as_assoc()->execute();
		return $result;
	}
	
	public static function getAttractionPic(){
		$result = \DB::select('picture')->from('attractions')->as_assoc()->execute();
		return $result;
	}
	
	public static function getAttractionID(){
		$result = \DB::select('attractionID')->from('attractions')->as_assoc()->execute();
		return $result;
	}

	public static function getComments($attractionID){
		$result = \DB::select('*')->from('comments')->where('attractionID', $attractionID)->as_assoc()->execute();
		return $result;
	}

	public static function inputComments($comment, $attractionID){
		$query = \DB::insert('comments');
		$query->set(array(
			'comment' => $comment,
			'attractionID' => $attractionID,
		)) -> execute();
	}

	public static function getUsers(){
		$users = \DB::select('*')->from('users')->as_assoc()->execute();
		return $users;
	}

}

?>
