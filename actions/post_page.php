<?php

  class PostPage extends BasePage {
    private $postModel;
    private $commentModel;
    private $countComments;

    public function __construct() {
      $this->postModel = new Post();
      $this->commentModel = new Comment();
      $this->countComments = new Comment();
    }

    protected function get() {
      $post = $this->postModel->getPost($this->getData['id']);

      if (isset($post)) {
          $comments = $this->commentModel->getCommentByPostId($this->getData['id']);
          $countComments = $this->countComments->countComment($this->getData['id']);
        require_once './view/post.php';
      } else {
        $this->notFound();
      }
    }


  }
