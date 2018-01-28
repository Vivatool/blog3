<!doctype html>
<html lang="en">
<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <a href="/" style="text-align: left"><h1>Hello<?php if (isset($this->session['username'])) {
                        echo ", " . $this->session['username']; ?>!
                    <?php } else {?>
                        <?php echo "Anon <br>" ;?>
                    <?php } ?></h1></a><hr>
        </div>
        <?php foreach ($comments as $comment) { ?>
            <div class="col-md-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">

                            <h1 class="display-5">
                                <p style="text-align: center">"<?php  echo $comment['body']; ?>"</p><br>
                                <p style="text-align: right"> Author: <?php  echo $comment['author']; ?></p>
                            </h1>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
