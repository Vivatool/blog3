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
                        <?php echo ", unknown raccoon!<br>" ;?>
                    <?php } ?></h1></a><hr>
        </div>
        <?php foreach ($post as $index => $title) { ?>
            <div class="col-md-10">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <a href="/index.php?r=/post&id=<?php echo $index; ?>">
                          <h1 class="display-3">
                          <?php echo $title['title']; ?>
                          </h1>
                    </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
