<?php

  session_start();

  require_once './model/base_model.php';
  require_once './model/post.php';
  require_once './model/comment.php';
  require_once './model/user.php';
  require_once './router.php';
  require_once './actions/base_page.php';
  require_once './actions/index_page.php';
  require_once './actions/post_page.php';
  require_once './actions/add_post_page.php';
  require_once './actions/get_even_posts.php';
  require_once './actions/delete_page.php';
  require_once './actions/get_titles.php';
  require_once './actions/last_comments.php';
  require_once './actions/update_post_page.php';
  require_once './actions/delete_comment.php';
  require_once './actions/update_comment.php';
  require_once './actions/add_comment.php';



  require_once './actions/sort_by_author.php';
  require_once './actions/sort_by_time.php';
  require_once './actions/sort_by_title.php';

  require_once './actions/register_user_page.php';
  require_once './actions/login_user_page.php';
  require_once './actions/logout_user_page.php';





  $router = new Router($_GET, $_POST,  $_SESSION, $_SERVER);

  $router->attach('indexPage', new IndexPage());
  $router->attach('postPage', new PostPage());
  $router->attach('addPostPage', new AddPostPage());
  $router->attach('deletePostPage', new DeletePostPage());
  $router->attach('updatePostPage', new UpdatePostPage());
  $router->attach('getEvenPosts', new GetEvenPosts());
  $router->attach('getTitles', new GetTitles());
  $router->attach('getLastComments', new LastComments());
  $router->attach('updateCommentPage', new UpdateCommentPage());
  $router->attach('addCommentPage', new AddCommentPage());

  $router->attach('sortPostByAuthor', new SortPostByAuthor());
  $router->attach('sortPostByTime', new SortPostByTime());
  $router->attach('sortPostByTitle', new SortPostByTitle());
  $router->attach('getDeleteComment', new GetDeleteComment());

  $router->attach('registerPage', new RegisterUserPage());
  $router->attach('loginPage', new LoginUserPage());
  $router->attach('logoutPage', new LogoutUserPage());

  $router->serve();
