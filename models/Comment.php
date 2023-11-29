<?php

class Comment
{
    private $db;
    public $messageId;
    public $author;
    public $content;

    public function __construct(Database $db, $messageId = null, $author = null, $content = null)
    {
        $this->db = $db;
        $this->messageId = $messageId;
        $this->author = $author;
        $this->content = $content;
    }


    public function getAllCommentsByMessageId($id)
    {
        try {
            $conn = $this->db->connect();
            $query = "SELECT * FROM comments WHERE message_id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Ошибка при получении всех комментариев к сообщению с id: ' . $id . $e->getMessage();
            return [];
        }
    }

    public function save()
    {
        try {
            $conn = $this->db->connect();
            $query = "INSERT INTO comments ( message_id, author, text) VALUES (:id, :author, :content)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $this->messageId);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':content', $this->content);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Ошибка сохранения сообщения: ' . $e->getMessage();
            return false;
        }
    }


}