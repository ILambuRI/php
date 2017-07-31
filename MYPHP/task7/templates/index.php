<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>%TITLE%</title>
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
                <a class="navbar-brand" href="index.php">%TITLE%</a>
            </div>
            <?php
            if ($error)
            {
                ?>
                <div class='alert alert-warning col-md-4 col-md-offset-3' role='alert'>
                    %INFO%
                </div>
                <?php
            }
            ?>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-3">
                %SEND_SUCCESS%
				<form class="form-horizontal" method="post" action="">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type='text'class="form-control" id="inputSuccess1" aria-describedby="helpBlock2" value='%NAME%' name='name'>
                            <span id="helpBlock2" class="help-block">%NAME_HELP%</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-10">
							<select class="form-control" id="inputSuccess1" aria-describedby="helpBlock2" name="subj">
								<option value="%SUBJ%">%SUBJ%</option>
								<option value="Thanks you.">Thanks you.</option>
								<option value="Thank you very much.">Thank you very much.</option>
								<option value="Thank you very very much.">Thank you very very much.</option>
								<option value="Thank you super very much.">Thank you super very much.</option>
							</select>
                            <span id="helpBlock2" class="help-block">%SUBJ_HELP%</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputSuccess1" aria-describedby="helpBlock2" value='%EMAIL%' name='email'>
                            <span id="helpBlock2" class="help-block">%EMAIL_HELP%</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="3" name='msg' >%MSG%</textarea>
                            <span id="helpBlock2" class="help-block">%MSG_HELP%</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Send Email</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>    
  </body>
</html>