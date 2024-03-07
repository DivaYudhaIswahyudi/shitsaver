<?php

class User
{
    public function login($POST)
    {
        // Clear any previous error
        $_SESSION['error'] = "";

        if (empty($_SESSION['error'])) {
            $DB = new Database();

            // Assuming 'credential' is either email or username from the form
            $credential = esc($POST['email']); // Assuming the login form only has an email field
            $password = esc($POST['password']);

            // Use a placeholder for the credential to allow flexibility
            $query = "SELECT * FROM users WHERE email = :credential AND password = :password LIMIT 1";
            $arr = ['credential' => $credential, 'password' => $password];

            $data = $DB->read($query, $arr);

            if (is_array($data)) {
                $data = $data[0];

                $_SESSION['user_url'] = $data->url_address;
                $_SESSION['user_email'] = $data->email;

                // Check if the 'username' column exists in your 'users' table
                if (isset($data->username)) {
                    $_SESSION['user_username'] = $data->username;
                }

                header("Location: " . ROOT . "photos");
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

            // Set the 'user_username' session variable after successful signup
            $_SESSION['user_username'] = $arr['username'];

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
        $DB = new Database();

        $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
        $arr['url'] = $url_address;
        $data = $DB->read($query, $arr);

        return (!empty($data)) ? $data[0] : null;
    }

    public function is_logged_in()
    {
        return isset($_SESSION['user_url']) && isset($_SESSION['user_email']) && isset($_SESSION['user_username']);
    }
}
