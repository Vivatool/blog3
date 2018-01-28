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
            <div class="col-md-10">
                <a href="/" style="text-align: left"><h1>Hello<?php if (isset($this->session['username'])) {
                            echo ", " . $this->session['username']; ?>!
                        <?php } else {?>
                            <?php echo ", unknown raccoon!<br>" ;?>
                        <?php } ?></h1></a><hr>
            </div>
          <form method="POST" action="/index.php?r=/register" class="form">
              <input type="text" name="username" placeholder="username"><br>
              <input type="password" name="password" placeholder="password">
              <input type="password" name="password_approve" placeholder="password_approve"><br>
              <input type="submit" value="Register!">
          </form>
        </div>

      </div>
    </div>
  </body>
</html>
