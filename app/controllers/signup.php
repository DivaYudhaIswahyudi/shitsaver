<?php

class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Signup";

        // Check if the form is submitted
        if (isset($_POST['email'])) {
            // Assuming you have a User model
            $userModel = $this->loadModel("user");

            // Get form data
            $userData = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'username' => $_POST['username'], // Add the new username field
            ];

            // Perform server-side validation if needed
            // ...

            // Call the signup method in your model
            $signupResult = $userModel->signup($userData);

            if ($signupResult === true) {
                // Registration successful, redirect or display success message
                // Example redirect:
                header("Location: /login");
                exit();
            } else {
                // Registration failed, pass error messages to the view
                $data['error'] = $signupResult;
            }
        }

        $this->view("catalog/signup", $data);
    }
}
