<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sql Maker +</title>
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
                <a class="navbar-brand" href="index.php">Sql Maker +</a>
            </div>
            <?php
            if ($error)
            {
                ?>
                <div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>
                    <?=$error?>
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
                <h4>In field '<?=$i_field1?>' record '<?=$i_val1?>'.</h4> 
                <h4>In field '<?=$i_field2?>' record '<?=$i_val2?>'.</h4>
                <h4>Result: <?=$i_res?></h4>
            </div>
            <div class="col-md-4">
                <h2>Update:</h2>
                <?php
                if (is_array($set_args))
                {
                ?>  
                <h4>Field '<?=key($set_args)?>' record '<?=$set_args[key($set_args)]; next($set_args);?>'.</h4> 
                <h4>Field '<?=key($set_args)?>' record '<?=$set_args[key($set_args)]?>'.</h4>
                <h4>Where field '<?=$u_field?>' has a record '<?=$u_val?>'.</h4>
                <h4>Result: <?=$u_res?></h4>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4">
                <h2>Delete:</h2>
                <h4>Where field '<?=$d_field?>' has a record '<?=$d_val?>'.</h4>
                <h4>Result: <?=$d_res?></h4>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <h1>Fake SQL:</h1>
            <h4><?=$fake_sql?></h4>
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
                for ($i = 0, $cnt = count($s_res); $i < $cnt; $i+=2)
                {
                    $val1 = $i;
                    $val2 = $val1 + 1;
                    ?>
                    <tr>
                        <td><?=$s_res[$val1][POLE1]?></td>
                        <td><?=$s_res[$val2][POLE2]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <h1>Select distinct:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <tr>
                    <th><?=POLE1?></th>
                </tr>
                <?php
                foreach ($s_dis as $val)
                {
                    ?>
                    <tr>
                        <td><?=$val?></td>
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
                <h4>In field '<?=$i_field1_pg?>' record '<?=$i_val1_pg?>'.</h4> 
                <h4>In field '<?=$i_field2_pg?>' record '<?=$i_val2_pg?>'.</h4>
                <h4>Result: <?=$i_res_pg?></h4>
            </div>
            <div class="col-md-4">
                <h2>Update:</h2>
                <?php
                if (is_array($set_args_pg))
                {
                ?>  
                <h4>Field '<?=key($set_args_pg)?>' record '<?=$set_args_pg[key($set_args_pg)]; next($set_args_pg);?>'.</h4> 
                <h4>Field '<?=key($set_args_pg)?>' record '<?=$set_args_pg[key($set_args_pg)]?>'.</h4>
                <h4>Where field '<?=$u_field_pg?>' has a record '<?=$u_val_pg?>'.</h4>
                <h4>Result: <?=$u_res_pg?></h4>
                <?php
                }
                ?>
            </div>
            <div class="col-md-4">
                <h2>Delete:</h2>
                <h4>Where field '<?=$d_field_pg?>' has a record '<?=$d_val_pg?>'.</h4>
                <h4>Result: <?=$d_res_pg?></h4>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <h1>Fake SQL:</h1>
            <h4><?=$fake_sql_p?></h4>
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
                for ($i = 0, $cnt = count($s_res_pg); $i < $cnt; $i+=2)
                {
                    $val1 = $i;
                    $val2 = $val1 + 1;
                    ?>
                    <tr>
                        <td><?=$s_res_pg[$val1][POLE1]?></td>
                        <td><?=$s_res_pg[$val2][POLE2]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <h1>Select distinct:</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <tr>
                    <th><?=POLE2?></th>
                </tr>
                <?php
                foreach ($s_dis_p as $val)
                {
                    ?>
                    <tr>
                        <td><?=$val?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
  </body>
</html>
