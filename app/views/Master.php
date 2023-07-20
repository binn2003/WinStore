<!DOCTYPE html>
<html>

<head>
    <title>Winstore - Admin</title>
    <base href="http://localhost/ass-php2/" target="_parent">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="public/images/winstore-favicon.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Custom -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/login-admin.css">
</head>

<body>
    <div class="container">
        <?php require_once "./app/views/pages/" . $data['Page'] . ".php" ?>
    </div>

    <script src="public/js/jquery.validate.js"></script>
    <script src="public/js/main.js"></script>
    <script src="public/js/validation.js"></script>
</body>

</html>