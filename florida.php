<?php
use Model\florida;
class Controller_Florida extends Controller
{
	
	public function action_login(){
		
	$username = Input::post('username');
	
	$password = Input::post('password');
	
	$Florida = new florida();
	
	$users = Florida::getUsers();

	$status = false;
		

	foreach( $users as $user){
		if($user['password'] === md5($password)){

			Session::set('username', $user['username']);

			$status = true;
			if($user['admin'] == 1){
				Session::set('admin', 1);
			}
			//Response::redirect("Florida/welcome.php");
			}	
		else{
		
    	       		//Response::redirect('Florida/loginError');
		}
		
	}
	
	if($status)
	{
		Response::redirect("Florida/welcome.php");
	}
	else
	{
		Response::redirect('Florida/loginError');

	}

	}
    public function action_loginError(){
        
        $layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/loginError');

	$layout->content = Response::forge($content);

	$Florida = new florida();
        
	$attractions = Florida::getAttraction();
        
        $layout->set_safe("attractions", $attractions);
	
	$layout->content = Response::forge($content);
	
	return $layout;
	
	}
	
	public function action_welcome(){
        
        $layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/welcome');
        
        $layout->content = Response::forge($content);
	
   	$Florida = new florida();
        
	$attractions = Florida::getAttraction();
        
        $layout->set_safe("attractions", $attractions);
	
        $layout->content = Response::forge($content);

	return $layout;
	
	}
	
      public function action_aboutus(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/aboutus');
	   
		$layout->content = Response::forge($content);
		$Florida = new florida();
        
		$attractions = Florida::getAttraction();
        
        $layout->set_safe("attractions", $attractions);
	       
        $layout->content = Response::forge($content);
		return $layout;
	
    }	
	
	public function action_attraction($attractionID){
        
	$layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/attraction');
        
        $layout->content = Response::forge($content);
	
	$Florida = new florida();

	$attractionName = Florida::getAttractionName($attractionID);
        
        $attractions = Florida::getAttraction();
	
	$content->set_safe('attractionID', $attractionID);
	
	$layout->set_safe("attractions", $attractions);
	
	$content->set_safe("attractions", $attractions);
	
	$comment=Input::post("comments");
        
	if(isset($comment)){
		Florida::inputComments($comment,$attractionID);
			
		}	
       
	$arrayComments = Florida::getComments($attractionID);
		
	$content->set_safe("arrayComments", $arrayComments);

	$content->set_safe("title", $attractionName[0]['attractionName']);
        
        $layout->content = Response::forge($content);
        
		return $layout;
	
	}

	public function action_deleteComment($attractionID, $commentID){
		
	$Florida = new florida();
	
	Florida::deleteComment($commentID);
	
	Response::redirect('Florida/attraction/'.$attractionID);
	}

	public function action_updateComment($attractionID, $commentID){
	$Florida = new florida();
	
	$updatedComment = Input::post("updateComment");
	
	if(isset($updatedComment)){
	
		Florida::updateComment($commentID, $updatedComment);
		}
	
	Response::redirect('Florida/attraction/'.$attractionID);
	
	}

	public function action_addAttraction(){
		
	$Florida = new florida();
        
        $layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/addAttraction');
        
	$layout->content = Response::forge($content);
	 
	$attractions = Florida::getAttraction();
        
        $layout->set_safe("attractions", $attractions);
	
        $layout->content = Response::forge($content);

		return $layout;
	
	}

	public function action_addAttractionDB(){

	$config = array(
    		'path' => '/lwilson1/public_html/ct310/assets/img/',
    		'randomize' => true,
    		'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);
		
	$Florida = new florida();
        
        $layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/addAttraction');
        
	$layout->content = Response::forge($content);
	 
	$attractions = Florida::getAttraction();

	$attractionName = Input::post("attractionName");

	$description = Input::post("description");

	$picture = Input::post("picture");

	if(Upload::is_Valid()){
		$path = '/lwilson1/public_html/ct310/assets/img/'. Upload::get_files()[0]['name'];
		Upload::save();
		//print_r(Upload::get_files());
		Florida::addAttraction($attractionName, $description, $path);
		Response::redirect("Florida/addAttraction");

	}
	
	}


	public function action_logout(){
		
	$session = Session::instance(); 
	
	$session->destroy();
	
	$layout = View::forge('Florida/layout');
	
	$content = View::forge('Florida/welcome');
        
   	$Florida = new florida();
       
	$attractions = Florida::getAttraction();
	
	$layout->set_safe("attractions", $attractions); 	
	
	$layout->content = Response::forge($content);
		return $layout;
	}
		
}
?>

