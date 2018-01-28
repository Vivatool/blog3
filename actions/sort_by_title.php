<?php

class SortPostByTitle extends BasePage
{
    private $postModel;

    private $LastCommentOnIndex;

    function __construct() {
        $this->postModel = new Post();
        $this->LastCommentOnIndex = new Comment();
    }

    public function get() {
        $posts = $this->postModel->sortPostByTitle();
        $lastComment = $this->LastCommentOnIndex->GetLastCommentOnIndex();
        require_once './view/index.php';
    }
}