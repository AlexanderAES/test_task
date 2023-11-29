<?php

class Message
{
    private $db;
    private $title;
    private $author;
    private $shortContent;
    private $fullContent;

    public function __construct(Database $db, $title = null, $author = null, $shortContent = null, $fullContent = null)
    {
        $this->db = $db;
        $this->title = $title;
        $this->author = $author;
        $this->shortContent = $shortContent;
        $this->fullContent = $fullContent;
    }

    public function save()
    {
        try {
            $conn = $this->db->connect();
            $query = "INSERT INTO messages (title, author, short_content, full_content) VALUES (:title, :author, :short_content, :full_content)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':short_content', $this->shortContent);
            $stmt->bindParam(':full_content', $this->fullContent);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Ошибка сохранения сообщения: ' . $e->getMessage();
            return false;
        }
    }

    // Метод для редактирования сообщения
    public function update($id, $newTitle, $newAuthor, $newShortContent, $newFullContent)
    {
        try {
            $conn = $this->db->connect();
            $query = "UPDATE messages SET title = :title, author = :author, short_content = :short_content, full_content = :full_content WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $newTitle);
            $stmt->bindParam(':author', $newAuthor);
            $stmt->bindParam(':short_content', $newShortContent);
            $stmt->bindParam(':full_content', $newFullContent);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Ошибка при обновлении сообщения: ' . $e->getMessage();
            return false;
        }
    }

    public function readAll()
    {
        try {
            $conn = $this->db->connect();
            $query = "SELECT * FROM messages";
            $stmt = $conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Ошибка при чтении всех сообщений: ' . $e->getMessage();
            return [];
        }
    }

    public function getMessageById($id)
    {
        try {
            $conn = $this->db->connect();
            $query = "SELECT * FROM messages WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Ошибка при получении сообщения: ' . $e->getMessage();
            return [];
        }
    }


}