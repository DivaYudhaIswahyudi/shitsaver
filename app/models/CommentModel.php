<?php

class CommentModel
{
    public function submitComment($data)
    {
        // Check if required data is provided
        if (empty($data['image_id']) || empty($data['user_id']) || empty($data['comment'])) {
            return "Image ID, user ID, and comment are required.";
        }

        try {
            // Sanitize and prepare data
            $commentData = [
                'image_id' => esc($data['image_id']),
                'user_id' => esc($data['user_id']),
                'comment' => esc($data['comment']),
                'date' => date("Y-m-d H:i:s"),
            ];

            // Initialize Database instance
            $DB = new Database();

            // Prepare and execute the query
            $query = "INSERT INTO comments (image_id, user_id, comment, date) VALUES (:image_id, :user_id, :comment, :date)";
            $DB->write($query, $commentData);

            // Check for errors
            $errorInfo = $DB->getErrorInfo();

            if ($errorInfo[0] !== '00000') {
                // An error occurred during the write operation
                return "Comment submission failed: " . $errorInfo[2];
            }

            // Successfully inserted
            return true;
        } catch (Exception $e) {
            // Log or print the exception for debugging
            error_log("Comment submission failed: " . $e->getMessage());
            return "Comment submission failed: " . $e->getMessage();
        }
    }
}
