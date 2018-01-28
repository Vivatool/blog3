<?php

  class Post extends BaseModel {
    private $postsOnPage;

      public function __construct() {
          parent::__construct();
          $this->postsOnPage = 10;
      }


      public function validate($title, $body, $author) {
      $errors = [];

      if (strlen($title) < 5) {
        $errors[] = 'Title string is too short!';
      }

      if (empty($body)) {
        $errors[] = 'Body should not be empty!';
      }

      if ($author == 'admin') {
        $errors[] = 'Admin should not create posts!';
      }

      return $errors;
    }

      public function pageNumber() {
          $res = $this->conn->query('SELECT count(id) as count FROM blog');
          $totalNumber = $res->fetch(PDO::FETCH_ASSOC)['count'];

          return ceil($totalNumber / $this->postsOnPage);
      }

      public function getPostsWithCommentsCount() {
          $res = $this->conn->query('SELECT p.id, p.user_id, p.title, p.body, COUNT(c.id) as comments_count FROM blog as p LEFT JOIN comments as c ON p.id = c.post_id GROUP BY p.id');

          return $res->fetchAll(PDO::FETCH_ASSOC);
      }

      public function getPosts($pageNumber) {
          $offsetValue = ($pageNumber - 1) * $this->postsOnPage;

          $stmt = $this->conn->prepare('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id LIMIT :lim OFFSET :offs');
          $stmt->bindParam(':lim', $this->postsOnPage, PDO::PARAM_INT);
          $stmt->bindParam(':offs', $offsetValue, PDO::PARAM_INT);
          $stmt->execute();

          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

    public function getPost($id) {
      $stmt = $this->conn->prepare('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id WHERE b.id = ?');
      $stmt->execute([$id]);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePost($id, $title, $body, $user_id) {
        $stmt = $this->conn->prepare('UPDATE blog SET title = ?, body = ?, user_id = ? WHERE id = ?');
        $stmt->execute([$title, $body, $user_id, $id]);

    }

    public function countPosts($user_id) {
        $stmt = $this->conn->prepare('SELECT COUNT(id) FROM blog WHERE user_id = ?');
        $stmt->execute([$user_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function sortPostByAuthor() {
        $stmt = $this->conn->prepare('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id ORDER BY user_id');
        $stmt->execute([]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sortPostByTime() {
        $stmt = $this->conn->prepare('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id ORDER BY id');
        $stmt->execute([]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sortPostByTitle() {
        $stmt = $this->conn->prepare('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id ORDER BY title');
        $stmt->execute([]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost($title, $body, $user_id) {
      $stmt = $this->conn->prepare('INSERT INTO blog (title, body, user_id) VALUES (?, ?, ?)');
      $stmt->execute([$title, $body, $user_id]);

      return $this->conn->lastInsertId();
    }

      public function getEvenPosts() {
          $res = $this->conn->query('SELECT b.id, b.title, b.body, u.username FROM blog as b JOIN users as u ON b.user_id = u.id WHERE u.id % 2 = 0');
          return $res->fetchAll(PDO::FETCH_ASSOC);
      }


      public function deletePost($id) {
      $stmt = $this->conn->prepare('DELETE FROM blog WHERE id = ?');
      $stmt->execute([$id]);
    }

      public function getTitles() {
          $res = $this->conn->query('SELECT title FROM blog');
          return $res->fetchAll(PDO::FETCH_ASSOC);
      }
  }
