<?php 

Class User
{
	
	public function login($POST)
	{

		$_SESSION['error'] = "";
  
		if($_SESSION['error'] == "")
		{

 			$arr['email'] = esc($POST['email']);
 			$arr['password'] = esc($POST['password']);
			
			$DB = new Database();
			$query = "select * from users where email = :email && password = :password limit 1";
			$data = $DB->read($query,$arr);

			if(is_array($data)){

				$data = $data[0];
				 
				$_SESSION['user_url'] = $data->url_address;
				$_SESSION['user_email'] = $data->email;
				header("Location: ". ROOT . "photos");
				die;
 				
			}
  			
		}

	}

	public function signup($POST)
{
    $_SESSION['error'] = "";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if username, email, and password are provided
        if (empty($POST['username']) || empty($POST['email']) || empty($POST['password'])) {
            $_SESSION['error'] = "Username, email, and password are required.";
            return;
        }

        $arr = [
            'username' => esc($POST['username']),
            'email' => esc($POST['email']),
            'password' => esc($POST['password']),
            'url_address' => get_random_string_max(60),
            'date' => date("Y-m-d H:i:s"),
        ];

        $DB = new Database();
        $query = "INSERT INTO users (username, email, password, url_address, date) VALUES (:username, :email, :password, :url_address, :date)";
    }
	
	try {
		$DB->write($query, $arr);
		header("Location: " . ROOT . "login");
		die;
	} catch (Exception $e) {
		$_SESSION['error'] = "Registration failed: " . $e->getMessage();
		// Log or print the exception for debugging
		echo $e->getMessage();
	}
	
}


public function get_single_user($url_address)
{
    $DB = new Database(); // Instantiate the Database object

    $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
    $arr['url'] = $url_address;
    $data = $DB->read($query, $arr);

    return (!empty($data)) ? $data[0] : null;
}


	public function is_looged_in()
	{
 		
		if(isset($_SESSION['user_url']) && isset($_SESSION['user_email'])){
			return true;
		}
 
 		return false;
	}


}