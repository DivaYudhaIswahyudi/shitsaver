<?php

class ImageController extends Controller
{
    public function __construct()
    {
        $this->imageModel = $this->model('ImageModel');
        $this->commentModel = $this->model('CommentModel');
    }

    public function show($imageId)
    {
        $image = $this->imageModel->getImageById($imageId);

        if (!$image) {
            // Handle case when image is not found
            return;
        }

        $data['image'] = $image;
        $data['description'] = $this->imageModel->getDescription($imageId);
        $data['random_images'] = $this->imageModel->getRandomImages(5);

        // Fetch comments for the image
        $data['comments'] = $this->commentModel->getCommentsByImageId($imageId);

        $this->view("catalog/header", $data);
        $this->view("catalog/image_details", $data);
        $this->view("catalog/footer", $data);
    }
}
