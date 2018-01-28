<?php

class LastComments extends BasePage {
    private $lastComments;

    public function __construct() {
        $this->lastComments = new Comment();
    }
    protected function get() {
        $comments = $this->lastComments->getLastComments();
        if (isset($comments)) {
            require_once './view/last_comment.php';
        } else {
            $this->notFound();
        }
    }

}