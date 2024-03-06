<?php

class Upload_file
{
    public function upload($POST, $FILES)
    {
        $_SESSION['error'] = "";

        $allowed[] = 'image/jpeg';
        $allowed[] = 'video/mp4';

        //upload the file
        if ($FILES['file']['name'] != "" && $FILES['file']['error'] == 0) {
            if (in_array($FILES['file']['type'], $allowed)) {
                // Proceed with the upload logic
                $folder = "uploads/";

                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $destination = $folder . $FILES['file']['name'];

                move_uploaded_file($FILES['file']['tmp_name'], $destination);

                $arr['title'] = esc($POST['title']);
                $arr['date'] = date("Y-m-d H:i:s");
                $arr['user_url'] = isset($_SESSION['user_url']) ? $_SESSION['user_url'] : 1;
                $arr['image'] = $destination;
                $arr['views'] = 0;
                $arr['url_address'] = get_random_string_max(60);

                $DB = new Database();
                $query = "INSERT INTO images (title, user_url, date, image, views, url_address) VALUES (:title, :user_url, :date, :image, :views, :url_address)";
                $DB->write($query, $arr);

                header("Location: " . ROOT . "photos");
                die;
            } else {
                $_SESSION['error'] = "Only Jpegs and MP4s are allowed!";
            }
        }

        if ($_SESSION['error'] != "") {
            // Handle error, redirect or display a message
            // For example: header("Location: " . ROOT . "error_page");
            // Or display the error message to the user
        }
    }
}

?>
