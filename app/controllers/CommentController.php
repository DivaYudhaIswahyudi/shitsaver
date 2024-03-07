<?php

class CommentController extends Controller
{
    public function submit()
    {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
            // Assuming you have a CommentModel
            $commentModel = $this->loadModel("comments");

            // Get form data
            $commentData = [
                'image_id' => $_POST['image_id'],
                'user_id' => $_POST['user_id'],
                'comment' => $_POST['comment'],
            ];

            // Call the submitComment method in your model
            $submitResult = $commentModel->submitComment($commentData);

            if ($submitResult === true) {
                // Comment submission successful, redirect back to the comments page
                header("Location: " . ROOT . "/comments?image_id=" . $_POST['image_id']);
                exit();
            } else {
                // Comment submission failed, pass error messages to the view
                $data = [
                    'page_title' => 'Comments',
                    'error' => $submitResult,
                ];
                $this->view("catalog/comments", $data);
            }
        }
    }
}
