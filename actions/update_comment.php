<?php


class UpdateCommentPage extends BasePage
{
    protected $commentModel;
    protected $postModel;

    public function __construct() {
        $this->commentModel = new Comment();
        $this->postModel = new Post();
    }

    public function get() {
        $comment = $this->commentModel->getComment($this->getData['id']);
        $post = $this->postModel->getPost($comment['post_id']);
        require_once './view/update_comment.php';
    }

    public function post() {
        $this->commentModel->updateComment($this->postData['id'],
            $this->postData['body'],
            $this->postData['author']);
        $this->redirect('/post&id=' . $this->postData['post_id']);
    }
}
