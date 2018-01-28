<?php

class AddCommentPage extends BasePage {

    protected $commentModel;
    protected $postModel;


    public function __construct()  {
        $this->postModel = new Comment();
        $this->postModel = new Post();
    }

    protected function get()    {
        require_once './view/comment_page.php';
    }

    public function post() {
        $this->commentModel->addComment($this->postData['id'],
                                        $this->postData['body'],
                                        $this->postData['author']);

        $this->redirect('/post&id=' . $this->postData['post_id']);
    }
}
