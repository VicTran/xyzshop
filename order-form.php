<!DOCTYPE html>
<html>
    <head>
        <title>XYZ WEAR</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="resources/css/bootstrap-material-design.min.css" rel="stylesheet"/>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="resources/css/icon.css" rel="stylesheet"/>
        <link href="resources/css/ripples.min.css" rel="stylesheet"/>
        <link href="resources/css/roboto.css" rel="stylesheet"/>
        <link href="resources/css/sidebar.css" rel="stylesheet"/>
        <link href="resources/css/_custom.css" rel="stylesheet"/>


        <script src="resources/js/jquery-1.10.2.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <!--<script src="resources/js/jquery.dropdown.js"></script>
        <script src="resources/js/jquery.nouislider.min.js"></script>-->
        <script src="resources/js/material.min.js"></script>
        <script src="resources/js/ripples.min.js"></script>
        <script>
            $.material.init();
        </script>
    </head>
    <body>

        <?php
        include_once './services/db_user.php';
        include_once './services/consume_curl.php';
        include_once './shared_html/_header.php';
        ?>

        <div class="container">
            <form action="order.php" method="post" class="form-group">
                <table class="table table-responsive table-bordered ">
                    <tr>
                        <td>Input name (*)</td>
                        <td><input type="text" required="" name="name" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Input phone (*)</td>
                        <td><input type="text" required="" name="phone" class="form-control"/></td>
                    </tr>
                    <tr>
                        <td>Input address (*)</td>
                        <td><input type="text" required="" name="address" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td>Input email </td>
                        <td><input type="text" name="email" class="form-control" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" id="general-button" class="btn btn-success"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
