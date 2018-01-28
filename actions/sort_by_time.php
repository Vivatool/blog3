<?php
class SortPostByTime extends BasePage
{
    private $postModel;
    private $LastCommentOnIndex;

    public function __construct(){
        $this->postModel = new Post();
        $this->LastCommentOnIndex = new Comment();
    }
    protected function get() {
        $posts = $this->postModel->sortPostByTime();
        $lastComment = $this->LastCommentOnIndex->GetLastCommentOnIndex();
        require_once './view/index.php';
    }
}