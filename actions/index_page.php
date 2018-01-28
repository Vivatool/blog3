<?php

  class IndexPage extends BasePage {
    private $postModel;
    private $LastCommentOnIndex;
    private $countPostsByAuthor;


    public function __construct() {
      $this->postModel = new Post();
      $this->LastCommentOnIndex = new Comment();
      $this->countPostsByAuthor = new Post();
    }

      protected function get() {
          if (isset($this->getData['page'])) {
              $currentPage = $this->getData['page'];
          } else {
              $currentPage = 1;
          }

          $lastComment = $this->LastCommentOnIndex->GetLastCommentOnIndex();

          $posts = $this->postModel->getPosts($currentPage);
          $pageNumber = $this->postModel->pageNumber();

          // $countPost = $this->countPostsByAuthor->countPosts($user_id);

          //  var_dump($countPost);
          require_once './view/index.php';
      }
  }
