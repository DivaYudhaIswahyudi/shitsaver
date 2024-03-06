<?php

// app/controllers/Album.php
use App\Models\AlbumModel;

class Album extends Controller
{
    public function index()
    {
        $data['page_title'] = "Album";
        $this->view("catalog/album", $data);
    }

    public function add()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and validate form data
            $id = $_POST['id'] ?? '';
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';

            // Additional validation can be added here

            // Create an instance of the AlbumModel
            $albumModel = new AlbumModel();

            // Prepare data to be passed to the model
            $albumData = [
                'title' => $title,
                'description' => $description,
            ];

            // Call the addAlbum method in AlbumModel
            if ($albumModel->addAlbum($albumData)) {
                // Album added successfully, redirect or perform other actions
                // For example, you can redirect to the album listing page
                header("Location: " . ROOT . "album/list");
                exit();
            } else {
                // Failed to add album, handle the error
                // You can display an error message or redirect to the form page with an error flag
                $data['error'] = "Failed to add the album.";
                $this->view("catalog/album", $data);
            }
        } else {
            // If the form is not submitted, redirect to the index page
            header("Location: " . ROOT . "album/index");
            exit();
        }
    }
}
