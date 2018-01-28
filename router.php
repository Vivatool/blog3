<?php

class Router {
  const ROUTE_KEY = 'r';

  private $getArray;
  private $postArray;
  private $actionArray = [];
  private $session;

    public function __construct($getArray, $postArray, &$session, $server) {
        $this->getArray = $getArray;
        $this->postArray = $postArray;
        $this->session =&$session;
        $this->server = $server;

    }

  public function attach($actionName, $action) {
    $this->actionArray[$actionName] = $action;
  }

  public function serve() {
    switch ($this->getArray[self::ROUTE_KEY]) {
      case '/':
        $this->actionArray['indexPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/post':
        $this->actionArray['postPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/addPost':
        $this->actionArray['addPostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/deletePost':
        $this->actionArray['deletePostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getTitles':
          $this->actionArray['getTitles']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/getEvenPosts':
          $this->actionArray['getEvenPosts']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/getLastComments':
          $this->actionArray['getLastComments']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/updatePost':
          $this->actionArray['updatePostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/lastCommentOnIndex':
          $this->actionArray['lastCommentOnIndex']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/deleteComment':
          $this->actionArray['getDeleteComment']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/sortPostByAuthor':
          $this->actionArray['sortPostByAuthor']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/sortPostByTime':
          $this->actionArray['sortPostByTime']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/sortPostByTitle':
          $this->actionArray['sortPostByTitle']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/register':
          $this->actionArray['registerPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/login':
          $this->actionArray['loginPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/logout':
          $this->actionArray['logoutPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/updateComment':
          $this->actionArray['updateCommentPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;
      case '/addCommentPage':
          $this->actionArray['addCommentPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
          break;

        default:
        header('location: /index.php?r=/');
        break;
    }
  }

  public function dump() {
    var_dump($this);
  }

}
