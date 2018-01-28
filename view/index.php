<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-10" style="text-align: center">
            <!--links to actions with posts -->
          <a href="/" style="text-align: left"><h1>Hello<?php if (isset($this->session['username'])) {
                  echo ", " . $this->session['username']; ?>!
               <?php } else {?>
                  <?php echo ", unknown raccoon!<br>" ;?>
               <?php } ?></h1></a><hr>


            <?php if ($this->isLoggedIn()) { ?>
                <form method="POST" action="/index.php?r=/logout">
                    <input type="submit" class="btn btn-danger" name="logout" value="Logout!"><br>
                </form>
                <a href="/?r=/addPost">Add new post</a><br>
                <a href="/?r=/getTitles">See all titles</a><br>
                <a href="/?r=/getEvenPosts">Get even posts</a><br>
                <a href="/?r=/getLastComments">Last Comments</a><br>
            <?php } else { ?>
                <a href="/?r=/register">Register</a><br>
                <a href="/?r=/login">Login</a><br>
            <?php } ?>
            <hr>

            <!-- start show last Comment on Index page-->
            <div>
                <h1 class="display-5" style="text-align: right">
                    <p>Last Comment: </p>
                   <p style="text-align: right">"<?php  echo $lastComment['body']; ?>"  <br> Author: <?php  echo $lastComment['author']; ?> </p>
                 </h1>
            </div>
                <!-- end show last Comment on Index page-->

            <!-- start show Sum of posts by author on Index page-->
            <div>
                 <table border="1" width="30%" cellpadding="5">
                      <tr>
                           <th>Author</th>
                           <th>Sum of posts</th>
                      </tr>
                      <tr>
                           <td> </td>
                           <td>   </td>
                      </tr>
                </table>
           </div>
            <!-- end show Sum of posts by author on Index page-->

                <!--select type of sorting-->
            <?php if ($this->isLoggedIn()) { ?>
            <p>Sorting: </p>
            <a href="/?r=/sortPostByAuthor">
                <button type="button" class="btn btn-secondary">By author's name</button>
            </a>
            <a href="/?r=/sortPostByTime">
                <button type="button" class="btn btn-secondary">By adding posts</button>
            </a>
            <a href="/?r=/sortPostByTitle ">
                <button type="button" class="btn btn-secondary">By title of the post</button>
            </a>
            <?php } else { ?>
                <p style="text-align: left">Register to see the rest</p>
            <?php } ?>
            <hr>

<!--                <form action="insert.php" method="post" style="text-align: right">-->
<!--                <select class="custom-select" name="sorting">-->
<!--                    <option selected>Open this select menu</option>-->
<!--                    <option value="1">By author's name</option>-->
<!--                    <option value="2">By adding posts</option>-->
<!--                    <option value="3">By title of the post</option>-->
<!--                </select>-->
<!--                </form>-->

                <!--end select type of sorting-->

            </div>
            <br>

                <!--start publication of posts-->
        </div>
        <?php foreach ($posts as $post) { ?>
          <div class="col-md-10"  >
            <div class="jumbotron jumbotron-fluid" >
              <div class="container"  >
                <a href="/index.php?r=/post&id=<?php echo $post['id'] ?>">
                  <h1 class="display-3">
                    <?php echo $post['title']; ?>
                  </h1>
                </a>
                <p class="lead">
                  <?php echo $post['body']; ?>
                </p>
                <p class="lead">
                  author: <?php echo $post['username']; ?>
                  <form method="POST" action="/index.php?r=/deletePost">
                    <input type="hidden" value="<?php echo $post['id'] ?>" name="id">
                    <input type="submit" value="Destroy!" class="btn btn-default">
                  </form>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>

          <!--end publication of posts-->

          <!--start pagination-->
          <nav style="text-align: center">
              <ul class="pagination" >
                  <li class="page-item <?php if ($currentPage == 1) { echo 'active'; } ?>">
                      <a class="page-link" href="/index.php?r=/&page=1">First page</a>
                  </li>
                  <?php
                  $start = ($currentPage < 4) ? 1 : $currentPage - 3;
                  $stop = ($currentPage > $pageNumber - 3) ? $pageNumber : $currentPage + 3;

                  for($i = $start; $i <= $stop; $i++) { ?>
                      <li class="page-item <?php if ($i == $currentPage) { echo 'active'; } ?>">
                          <a class="page-link" href="/index.php?r=/&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                      </li>
                  <?php }?>
                  <li class="page-item <?php if ($currentPage == $pageNumber) { echo 'active'; } ?>">
                      <a class="page-link" href="/index.php?r=/&page=<?php echo $pageNumber; ?>">Last page</a>
                  </li>
              </ul>
          </nav>
          <!--end pagination-->
      </div>
    </div>
  </body>
</html>
