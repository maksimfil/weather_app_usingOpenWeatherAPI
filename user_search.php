<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-image: url('weather.jpg');
                background-size: cover">
<h1 class=" mb-3 text-center mt-5">Search History</h1>
<div class="alert alert-primary m-auto w-25 text-center " role="alert">
    <?php
        for ($i=1;$i<=$_COOKIE['nums'];$i++){
            echo $_COOKIE['search'.$i].'<br>';
    }
?>
    <button type="button" class="btn btn-primary mt-3 m-auto"><a style="color: white ;text-decoration: none" href="index.php">Back to the search</a></button>

</div>';
</body>
</html>
