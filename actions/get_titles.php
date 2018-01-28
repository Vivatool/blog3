<?php

class GetTitles extends BasePage {
    private $postModel;
    public function __construct() {
        $this->postModel = new Post();
    }
    protected function get() {
        $post = $this->postModel->getTitles();
        if (isset($post)) {
            require_once './view/titles.php';
        } else {
            $this->notFound();
        }
    }
}