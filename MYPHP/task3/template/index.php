<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Maker</title>
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
                <a class="navbar-brand" href="index.php">File Maker</a>
            </div>
            <div>
                <?php
                if ($error)
                {
                ?>
                    <div class='alert alert-warning col-md-4 col-md-offset-3' role='alert'>
                        <?=$error?>
                    </div>
                <?php
                }
                ?>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <h2>b) String replacement:</h2>
                Line number: <?=$num?><br>
                Replacement string: <?=$str?><br>
                Save: <?=$b_str?>
            </div>
            <div class="col-md-6">
                <h2>b) Character replacement:</h2>
                Line number: <?=$num_str?><br>
                Replacement char number: <?=$num_char?><br>
                Replacement char: <?=$char?><br>
                Save: <?=$b_char?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <h2>a) Output string:</h2>
                <?=$Astring?>
            </div>
            <div class="col-md-6">
                <h2>a) Output сhar:</h2>
                <?=$Achar?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <h2>a) All text - String:</h2>
                <?=$text_str?>
            </div>
            <div class="col-md-6">
                <h2>a) All text - Char:</h2>
                <?=$text_char?>
            </div>
        </div>
    </div>
    
  </body>
</html>