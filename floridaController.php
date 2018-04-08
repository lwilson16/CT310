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
			}
		}	
	
			if($status)	{
				Response::redirect("Florida/welcome.php");
			}
			else{
			Response::redirect('Florida/loginError');
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
  
	
	
	public function action_attraction($attractionID){
        
		$layout = View::forge('Florida/layout');

        $content = View::forge('Florida/attraction');
 
        $Florida = new florida();
       
        $attractions = Florida::getAttraction();

		$attractionName = Florida::getAttractionName($attractionID);

		$content->set_safe('attractionID', $attractionID);
	
		$layout->set_safe("attractions", $attractions);

		$content->set_safe("attractions", $attractions);

		$layout->set_safe("guest","guest");

		$content->set_safe("guest", "guest");	

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
	 
	  $attractions = Florida::getAttraction();
        
      $layout->set_safe("attractions", $attractions);
	
      $layout->content = Response::forge($content);
		
	  return $layout; 
	
	}

	public function action_addAttractionDB(){

		$config = array(
    		'path' => 'assets/img/',
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

		Upload::process($config);

		if(Upload::is_Valid()){
			Upload::save();
			$imgName = Upload::get_files()[0]['saved_as'];
			$path = 'assets/img/'. $imgName;
			//print_r(Upload::get_files());
		//	print_r(Upload::get_files()[0]['saved_as']);
		//	print($imgName);
			Florida::addAttraction($attractionName, $description, $path);
			Response::redirect("Florida/addAttraction");

		}
		//Response::redirect("Florida/addAttraction");


	}

	public function action_addItem($attractionID, $username){
        
		$Florida = new florida();

		$attractionName= Florida::getAttractionName($attractionID);

		Florida::addItem($attractionID, $username, ($attractionName[0]['attractionName']));

	   	Response::redirect('Florida/cart/'.$username);

	}
	//$attractionID, $itemOID,$username
	public function action_deleteItem($itemID,$username){

		$Florida = new florida();

		Florida::deleteItem($itemID);

	   	Response::redirect('Florida/cart/'.$username);


	}
	public function action_cart($username){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/cart');

        $Florida = new florida();
        
        $attractions = Florida::getAttraction();

		$cart = Florida::getItems($username);

		$content->set_safe("cart", $cart);

		$content->set_safe("attractions", $attractions);

		$layout->set_safe("attractions", $attractions);


		$layout->content = Response::forge($content);

		return $layout;
	
	}

	public function post_cart($username)
	{
		$name = Input::post('name');

		$email = Input::post('email');

		$Florida = new florida();

		$cart = florida::getItems($username);

		$custMsg = "Hello " . $name . "! Thank you for ordering the following brochures: \n";

		$adminMsg = $name . " has ordered: \n";

		$orders = "";

		$endMsg = "Please come again!";

		$kenny = "nguyenkd@rams.colostate.edu";

		$lettia = "lwilson1@rams.colostate.edu";

		foreach($cart as $item){
			$orders .= $item['attractionName'] . "\n";

		}
		

		mail($email, "Florida Brochures [Ordered]", $custMsg . $orders . $endMsg );

		mail($kenny, "Florida Brochures [Ordered]", $adminMsg . $orders );

	//	mail($lettia, "Florida Brochures [Ordered]", $custMsg . $orders );

		florida::deleteCart($username);

		Response::redirect('Florida/cart/'.$username);

	}

	public function action_forgotPW(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/forgotPW');

		$Florida = new florida();

		$attractions = Florida::getAttraction();

		$layout->set_safe("attractions", $attractions);
        
		$layout->content = Response::forge($content);

		return $layout;
	
	}

	public function post_forgotPW()
	{
		$name = Input::post('name');

		$email = Input::post('email');

		$Florida = new florida();

		$token = Florida::getToken($email);

		mail($email, "Reset Password From Florida", "token is: " . ($token[0]['token']));

		Response::redirect('Florida/forgotPW');

	}

	public function action_resetPW(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/resetPW');

		$Florida = new florida();

		$attractions = Florida::getAttraction();

		$layout->set_safe("attractions", $attractions);
        
		$layout->content = Response::forge($content);

		return $layout;
	
	}
	
	public function post_resetPW()
	{
		$newPW = Input::post('newPW');

		$email = Input::post('email');

		$Florida = new florida();

		Florida::resetPW($email, md5($newPW));
		
		Response::redirect('Florida/welcome');

	}
	
	public function post_resetPWPage()
	{
		$tokenEntered = Input::post('token');

		$email = Input::post('email');

		$Florida = new florida();

		$token = Florida::getToken($email);

		if ( $tokenEntered === $token[0]['token']){
		
			Response::redirect('Florida/resetPW');

		}else{

			Response::redirect('Florida/wrongToken');
		}
	}
	
	
	
	public function action_wrongToken(){
        
        $layout = View::forge('Florida/layout');

        $content = View::forge('Florida/wrongToken');

		$Florida = new florida();

		$attractions = Florida::getAttraction();

		$token = Input::post('token');

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

