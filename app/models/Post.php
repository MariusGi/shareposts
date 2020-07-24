<?php

declare(strict_types = 1);

class Post
{
    private $db;
    private $table = 'posts';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query("SELECT *,
                                     posts.id as postId,
                                     users.id as userId,
                                     posts.created_at as postCreated,
                                     users.created_at as userCreated
                              FROM {$this->table}
                              INNER JOIN users
                              ON posts.user_id = users.id
                              ORDER BY posts.created_at DESC
                          ");

        return $this->db->resultsSet();
    }

    public function addPost($data)
    {
        $this->db->query("INSERT INTO {$this->table} (title, user_id, body)
                              VALUES(:title, :user_id, :body)");
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function updatePost($data)
    {
        $this->db->query("UPDATE {$this->table}
                              SET title = :title,
                                  body = :body
                              WHERE id = :id");
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function getPostById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function deletePost($id)
    {
        $this->db->query("DELETE FROM {$this->table}
                              WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}