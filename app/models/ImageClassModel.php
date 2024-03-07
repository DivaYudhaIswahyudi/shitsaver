<?php

class ImageClassModel
{
    public function updateLikes($imageId)
    {
        $DB = new Database();

        // Increment the likes count for the specified image ID
        $query = "UPDATE images SET likes = likes + 1 WHERE id = :id";
        $arr['id'] = $imageId;

        return $DB->write($query, $arr);
    }
}
