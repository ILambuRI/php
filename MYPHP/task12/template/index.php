<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO</title>
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
                <a class="navbar-brand" href="index.php">PDO</a>
            </div>
            <?php
            if ($error || $pdo_error)
            {
                ?>
                <div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>
                    <?=$error?><br>
                    <?=$pdo_error?>
                </div>
                <?php
            }
            ?>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <h1>MySQL:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4">
                <h2>Insert:</h2>
                <h4>In field <strong>'<?=$i_field1?>'</strong> record <strong>'<?=$i_params[':key']?>'</strong>.</h4> 
                <h4>In field <strong>'<?=$i_field2?>'</strong> record <strong>'<?=$i_params[':data']?>'</strong>.</h4>
                <h4>Result: <?=$i_res?></h4>
            </div>
            <div class="col-md-4">
                <h2>Update:</h2>
                <h4>Field <strong>'<?=POLE1?>'</strong> record <strong>'<?=$u_params[':field1']?>'</strong>.</h4> 
                <h4>Field <strong>'<?=POLE2?>'</strong> record <strong>'<?=$u_params[':field2']?>'</strong>.</h4>
                <h4>Where field <strong>'<?=$u_field?>'</strong> has a record <strong>'<?=$u_val?>'</strong>.</h4>
                <h4>Result: <?=$u_res?></h4>
            </div>
            <div class="col-md-4">
                <h2>Delete:</h2>
                <h4>Where field <strong>'<?=$d_field?>'</strong> has a record <strong>'<?=$d_params[':val']?>'</strong>.</h4>
                <h4>Result: <?=$d_res?></h4>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <h1>Select all records:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <tr>
                    <th><?=POLE1?></th>
                    <th><?=POLE2?></th>
                </tr>
                <?php
                foreach ($pdo_res as $value)
                {
                    ?>
                    <tr>
                        <td><?=$value[POLE1]?></td>
                        <td><?=$value[POLE2]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <h1>PostgreSQL:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4">
                <h2>Insert:</h2>
                <h4>In field <strong>'<?=$i_field1_p?>'</strong> record <strong>'<?=$i_params_p[':key']?>'</strong>.</h4> 
                <h4>In field <strong>'<?=$i_field2_p?>'</strong> record <strong>'<?=$i_params_p[':data']?>'</strong>.</h4>
                <h4>Result: <?=$i_res_p?></h4>
            </div>
            <div class="col-md-4">
                <h2>Update:</h2>
                <h4>Field <strong>'<?=POLE1?>'</strong> record <strong>'<?=$u_params_p[':field1']?>'</strong>.</h4> 
                <h4>Field <strong>'<?=POLE2?>'</strong> record <strong>'<?=$u_params_p[':field2']?>'</strong>.</h4>
                <h4>Where field <strong>'<?=$u_field_p?>'</strong> has a record <strong>'<?=$u_val_p?>'</strong>.</h4>
                <h4>Result: <?=$u_res_p?></h4>
            </div>
            <div class="col-md-4">
                <h2>Delete:</h2>
                <h4>Where field <strong>'<?=$d_field_p?>'</strong> has a record <strong>'<?=$d_params_p[':val']?>'</strong>.</h4>
                <h4>Result: <?=$d_res_p?></h4>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <h1>Select all records:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <tr>
                    <th><?=POLE1?></th>
                    <th><?=POLE2?></th>
                </tr>
                <?php
                foreach ($pdo_res_p as $value)
                {
                    ?>
                    <tr>
                        <td><?=$value[POLE1]?></td>
                        <td><?=$value[POLE2]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
  </body>
</html>
