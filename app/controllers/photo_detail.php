<?php

require_once __DIR__ . '/../models/ImageClassModel.php';

class Photo_detail extends Controller
{
    public function index($url_address = '')
    {
        $data['page_title'] = "Photo Details";

        $load_class = $this->loadModel("load_images");

        $data['image'] = $load_class->get_single_image($url_address);
        $data['random_images'] = $load_class->get_images();

        $image_class = $this->loadModel("image_class");

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
            $imageId = $data['image']->id;

            // Update the likes in the database
            $imageModel = new ImageClassModel();
            $imageModel->updateLikes($imageId);

            // Refresh the page to reflect the updated like count
            header("Location: " . ROOT . "photo_detail/index/" . $url_address);
            exit();
        }

        // Check if the 'description' property exists in $data['image']
        $data['description'] = isset($data['image']->description) ? $data['image']->description : '';

        if (is_array($data['random_images'])) {
            foreach ($data['random_images'] as $key => $row) {
                $data['random_images'][$key]->image = $image_class->get_thumbnail($row->image);
            }
        }

        $this->view("catalog/Photo_detail", $data);    
    }
}
