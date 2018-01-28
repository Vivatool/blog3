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
        <div class="col-md-10">
            <a href="/" style="text-align: left"><h1>Hello<?php if (isset($this->session['username'])) {
                        echo ", " . $this->session['username']; ?>!
                    <?php } else {?>
                        <?php echo ", unknown raccoon!<br>" ;?>
                    <?php } ?></h1></a><hr>
          <h2>You are reading '<?php echo $post['title']; ?>'</h2>
        </div>
          <div class="col-md-10">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-3">
                  <?php echo $post['title']; ?>
                </h1>
                <p class="lead">
                  <?php echo $post['body']; ?>
                </p>
                <p class="lead">
                  author: <?php echo $post['username']; ?>
                </p>

                  <a href="/index.php?r=/updatePost&id=<?php echo $post['id']; ?>" class="btn btn-default">Update Post</a>
              </div>
            </div>
              <div class="alert alert-dark" role="alert" style="margin-right: 60%; margin-left: 10%">
                  <a href="/index.php?r=/addCommentPage" class="btn btn-primary">add Comment</a>
              <?php if (!empty($comments)) { ?> comments count: <?php echo $countComments['COUNT(c.post_id)']; ?>
              </div>

                  <h3 style="margin-right: 10%; margin-left: 10%">Comments:</h3>
              <?php } else {?>
              <h3>Be first!!!  </h3>
              <?php } ?>
              <?php foreach ($comments as $comment) { ?>
                  <div class="alert alert-secondary" role="alert" style="margin-right: 10%; margin-left: 10%">
                      <h4 class="alert-heading"><?php echo $comment['author']; ?></h4> : <?php echo $comment['body']; ?>
                      <div style="text-align: right">

                          <form method="POST" action="/index.php?r=/deleteComment&id=<?php echo $comment['id']; ?>&pid=<?php echo $post['id']; ?>">
                              <input type="submit" value="Destroy this comment!" class="btn btn-default">
                          </form>
                          <p  style="text-align: left"> <a href="/index.php?r=/updateComment&id=<?php echo $comment['id']; ?>" class="btn btn-default">Update Comment</a> </p><br>
                      </div>
                  </div>

              <?php } ?>
          </div>

      </div>
    </div>
  </body>
</html>
