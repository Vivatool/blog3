<?php

    class Comment extends BaseModel {
        public function __construct() {
            parent::__construct();
        }

        public function getCommentByPostId($id) {
            $stmt = $this->conn->prepare('SELECT c.id, c.author, c.body FROM comments as c WHERE c.post_id = ?');
            $stmt->execute([$id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getComment($id) {
            $stmt = $this->conn->prepare('SELECT c.id, c.author, c.body, c.post_id FROM comments as c WHERE c.id = ?');
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function countComment($id) {
            $stmt = $this->conn->prepare('SELECT COUNT(c.post_id) FROM comments as c WHERE c.post_id = ?;');
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getLastComments() {
            $stmt = $this->conn->prepare('SELECT c.body, c.author FROM comments as c ORDER BY c.id DESC LIMIT 5');
            $stmt->execute([]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addComment($id, $body, $author) {
            $stmt = $this->conn->prepare('INSERT INTO comments (id, body, author) VALUES (?, ?, ?)');
            $stmt->execute([$body, $author, $id]);

            return $this->conn->lastInsertId();
        }

        public function updateComment($id, $body, $author) {
            $stmt = $this->conn->prepare('UPDATE comments SET body = ?, author = ? WHERE id = ?');
            $stmt->execute([$body, $author, $id]);
        }

        public function deleteComment($id) {
            $stmt = $this->conn->prepare('DELETE FROM comments WHERE id = ?');
            $stmt->execute([$id]);
        }

        public function getLastCommentOnIndex() {
            $stmt = $this->conn->prepare('SELECT c.body, c.author FROM comments as c ORDER BY c.id DESC LIMIT 1');
            $stmt->execute([]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
