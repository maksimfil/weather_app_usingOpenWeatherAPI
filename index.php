<?php
include 'LocationInfo.php';
$error = '';
if (empty($_POST['city'])) {
    $error = "You should enter name of city!";

} else {
    $city = new LocationInfo($_POST['city']);
    $weather = $city->getData();
    $var = 'search';
    setcookie('nums', counter_func());
    setcookie($var .= $_COOKIE['nums'], $_POST['city']);
    if ($weather['cod'] != 200) {
        $error = "You should enter correct name of city";
    }
}
function counter_func()
{
    if (isset($_COOKIE['nums'])) {
        $_COOKIE['nums']++;

    } else {
        $_COOKIE['nums'] = 1;
    }
    return $_COOKIE['nums'];
}

?>


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
<h1 class=" mb-3 text-center mt-5">Weather App using OpenWeatherAPI</h1>


<form method="post">
    <div class="m-auto w-25 mb-3 text-center">
        <label for="city" class="form-label">Enter your city name</label>
        <input class="form-control" name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>">
        <button type="submit" class="btn btn-primary mt-3 m-auto">Submit</button>
        <button type="button" class="btn btn-primary mt-3 m-auto"><a style="color: white ;text-decoration: none"
                                                                     href="user_search.php">Check search story</a>
        </button>
    </div>
    <div id="weather">
        <?php

        if ($error) {
            echo '<div class="alert alert-danger m-auto w-25 text-center" role="alert">
            ' . $error . '
</div>';

        } else {

            echo '<div class="alert alert-success m-auto w-25 text-center " role="alert">
            <b>Entered city:</b>' . " " . $weather['name'] . '<br>
            <b>Country:</b>' . " " . $weather['sys']['country'] . '<br>
            <b>Weather conditions:</b>' . " " . $weather['weather'][0]['description'] . '<br>
            <b>Temperature:</b>' . " " . $weather['main']['temp'] . '&#8451' . '<br>
            <b>Humidity:</b>' . " " . $weather['main']['humidity'] . '%' . '<br>
            <b>Atmosphere pressure: </b>' . " " . $weather['main']['pressure'] . 'hPa' . '<br>
            <b>Wind speed:</b>' . " " . $weather['wind']['speed'] . " " . 'meter/sec' . '<br>
</div>';

        }

        ?>
    </div>

</form>
</body>
</html>
