<?php

class Controller_Florida extends Controller
{
	public function action_login(){
		
		$username = Input::post('username');

		$password = Input::post('password');

		if($username == 'ct310' && md5($password) == '48f2f942692b08ec9de1ef9ada5230a3'){	
			Session::set('username', $username);
			
			Session::set('userid', 12345);

			Response::redirect("Florida/welcome");

			return $layout;
		}
		else if($username === 'tjkinsey' && md5($password) === '5f4dcc3b5aa765d61d8327deb882cf99'){
			Session::set('username', $username);
			
			Session::set('userid', 123456);
			
			Response::redirect("Florida/welcome");
			
			
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
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}
	
	public function action_welcome(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/welcome');
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}
	
    public function action_universal(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/universal');
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}
	
    public function action_buschgardens(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/buschgardens');
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}
	
    public function action_kss(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/kss');
        
        $layout->content = Response::forge($content);

		return $layout;
	
	}
	
    public function action_aboutus(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/aboutus');
        
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
