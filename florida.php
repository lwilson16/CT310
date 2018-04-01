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
		
		$arrayComments = Florida::getComments();
		
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
	
    
  
	
   
	public function action_comment(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/comment');
        
        $layout->content = Response::forge($content);
        
        $POST=Input::post("comments");
        $cvar="";
        
        if(isset($POST)){
            $cvar = $POST;
        }
        else{
            $cvar="";
        }
        $content->set_safe("cvar", $cvar);
        
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
        
        $layout->content = Response::forge($content);

        $Florida = new florida();
        
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
        
        $layout->content = Response::forge($content);
        

		return $layout;
	
	}
	public function action_addAttraction(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/addAttraction');
        
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

