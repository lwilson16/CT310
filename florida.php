<?php

use Model\florida;


class Controller_Florida extends Controller
{

	

	public function action_login(){
		
		$username = Input::post('username');

		$password = Input::post('password');

		if($username == 'ct310' && md5($password) == '48f2f942692b08ec9de1ef9ada5230a3'){
		
			Session::set('username', $username);
			
			Session::set('userid', 12345);

			Response::redirect("Florida/welcome");

		}
		else if($username === 'kenny' && $password === 'kenny'){
			Session::set('username', $username);
			
			Session::set('userid', 123456);
			
			Response::redirect("Florida/adminPage.php");
			
			
		}
		else if($username === 'lwilson1' && md5($password) === '5716915db7869136e2b65a433cc152b9'){
			
			Session::set('username', $username);
			
			Session::set('userid', 1234567);
			
			Response::redirect("Florida/welcome");
			
		}
		else{
            Response::redirect('Florida/loginError');
		}
	
	}
	
    public function action_loginError(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/loginError');
        $arrayComments = Florida::getComments();
		
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
        
		$aid = $attractionID;

		$content->set_safe('aid', $aid);
	
		$layout->set_safe("attractions", $attractions);

		$content->set_safe("attractions", $attractions);

		$POST=Input::post("comments");
        
	 
		if(isset($POST)){
			Florida::inputComments($POST);
			
		}	
       
		$arrayComments = Florida::getComments();
		
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
        
        	$layout->content = Response::forge($content);

			return $layout;
	}
		
}
?>

