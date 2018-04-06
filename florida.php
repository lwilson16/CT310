<?php

use Model\florida;


class Controller_Florida extends Controller
{

	

	public function action_login(){

		$username = Input::post('username');
			
		$password = Input::post('password');

		$Florida = new florida();

		$users = Florida::getUsers();
		

		foreach( $users as $user){ 
			if($user['password'] === md5($password)){
		
				Session::set('username', $user['username']);

				Response::redirect("Florida/welcome.php");

			}	
			else{
    	       Response::redirect('Florida/loginError');
			}
		
		}
	}
    public function action_loginError(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/loginError');
		
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
  
	
  	
	public function action_adminPage(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/adminPage');
		
		$arrayComments = Florida::getComments();
		
        $layout->content = Response::forge($content);

		return $layout;
	
	}

	
	
	public function action_attraction($attractionID){
        
		$layout = View::forge('Florida/layout');

        $content = View::forge('Florida/attraction');
 
        $Florida = new florida();
       
        $attractions = Florida::getAttraction();

		$content->set_safe('attractionID', $attractionID);
	
		$layout->set_safe("attractions", $attractions);

		$content->set_safe("attractions", $attractions);

		$content->set_safe("attractions", $attractions);

		$layout->set_safe("guest","guest");

		$content->set_safe("guest", "guest");	

		$comment=Input::post("comments");
        

		if(isset($comment)){
			Florida::inputComments($comment,$attractionID);
			
		}	
       
		$arrayComments = Florida::getComments($attractionID);
		
        $content->set_safe("arrayComments", $arrayComments);

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
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/addAttraction');
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}

	public function action_addItem($attractionID, $username){
        
       	$Florida = new florida();

		Florida::addItem($attractionID, $username);

	   	Response::redirect('Florida/cart/'.$username);

	}
	
	public function action_deleteItem($attractionID,$itemID,$username){

		$Florida = new florida();

		Florida::deleteItem($itemID);

	   	Response::redirect('Florida/cart/'.$username);


	}
	public function action_cart($username){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/cart');

        $Florida = new florida();
        
        $attractions = Florida::getAttraction();

		$cart = Florida::getCart($username);

		$name = Input::post('name');

		$email = Input::post('email');

		$content->set_safe("cart", $cart);

		$content->set_safe("attractions", $attractions);

		$layout->set_safe("attractions", $attractions);


		$layout->content = Response::forge($content);

		return $layout;
	
	}


	public function action_logout()
	{
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

