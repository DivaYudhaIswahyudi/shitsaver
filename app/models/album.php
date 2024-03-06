<?php

// app/models/AlbumModel.php

class AlbumModel extends Model
{
    // Define the table name
    private $table = 'albums';

    // Define the columns in the table (excluding auto-incremented columns)
    private $columns = ['title', 'description'];

    // Add a new album to the database
    public function addAlbum($data)
    {
        // Validate data if needed

        // Create an instance of the Database class
        $database = new Database();

        // Build the SQL query
        $query = "INSERT INTO $this->table (" . implode(',', $this->columns) . ") VALUES (:title, :description)";

        // Execute the query using the write method from the Database class
        return $database->write($query, $data);
    }
}
