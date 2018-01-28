<?php

class GetDeleteComment extends BasePage {
    private $comments;

    public function __construct() {
        $this->comments = new comment();
    }

    protected function post() {
        $this->comments->deleteComment($_GET['id']);
        $this->redirect('/post&id=' . $_GET['pid']);
    }
}