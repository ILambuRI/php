<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML Helper</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  
    <nav class="navbar navbar-default col-md-10 col-md-offset-1">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HTML Helper</a>
            </div>
            <div>
                <?php
                    if ($info)
                    {
                        ?>
                            <div class='alert alert-success col-md-4 col-md-offset-1' role='alert'><?=$info?></div>
                        <?php
                    }
                ?>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-3">
                <h1>Select:</h1>
                <?=$select?>
            </div>
            <div class="col-md-3">
                <h1>ol:</h1>
                <?=$ol?>
            </div>
            <div class="col-md-3">
                <h1>ul:</h1>
                <?=$ul?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <h1>dl-dt-dd:</h1>
                <?=$dl?>
            </div>
            <div class="col-md-6">
                <h1>radiobuttons-group:</h1>
                <?=$radio?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-2 col-md-offset-5">
                <h1>Table:</h1>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <?=$table?>
            </div>
        </div>
    </div>
  </body>
</html>