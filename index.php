<?php
include 'func.inc.php';
if (isset($_GET['redirect']) && !empty($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
    resolve_code($redirect);
    die();
}

//print_r($_GET);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>AHT13-URL shortner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="_/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="_/css/styles.css" rel="stylesheet" media="screen">
        <link href="_/css/font.css" rel="stylesheet" media="screen">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <section class="main-content">
            <div class="container">
                <h1 class="text-center welcome-text">Africa Hack Trip 2013</h1>
                <h3 class="text-center">URL Shortener</h3>
                <div class="textbox">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-9">
                                <input type="text" name="url" id="url"  class="form-control" placeholder="Enter Your URL here" onkeydown="if (event.keyCode == 13 || event.which == 13) {
                                            go($('#url').val());
                                        }" />     
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-success btn-lg" type="button" onclick="go($('#url').val());">Shorten</button>
                            </div>
                        </div>
                        <div id="message">
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="_/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_/js/bootstrap.min.js"></script>
        <script src="_/js/scripts.js"></script>
        <script>
                                    $(document).ready(function() {
                                        $('#url').focus();
                                    });

                                    function go(url) {
                                        //alert(url);
                                        $.post('url.php', {url: url}, function(data) {
                                            if (data == 'error_no_url') {
                                                $('#message').html('<p>No URL Supplied</p>');
                                            } else if (data == 'error_invalid_url') {
                                                $('#message').html('<p>Invalid URL Supplied</p>');
                                            } else if (data == 'error_shortened_url') {
                                                $('#message').html('<p>URL ALready shortened</p>');
                                            } else {
                                                $('#url').val(data);
                                                $('#url').select();
                                                $('#message').html('<p>URL Successfully Shortened</p>')
                                            }
                                        });
                                    }
        </script>
    </body>
</html>