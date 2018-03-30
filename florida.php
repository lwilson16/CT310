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

	public static function getComments(){
		$result = \DB::select('comment')->from('comments')->as_assoc()->execute();
		return $result;
	}

	public static function inputComments($POST){
		$query = \DB::insert('comments');
		$query->set(array(
			'comment' => $POST,
		)) -> execute();
	}
	

}

?>
