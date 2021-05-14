<?php

require_once "Helper/RomanNumeralConverter.php";
use RomanNumeral\Helper\RomanNumeralConverter;

$romanNumeralConverter = new RomanNumeralConverter($_POST["int"]);

?>

<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<html>
    <body>
        <div class="jumbotron">
            <h1 class="display-4">Roman Numeral Converter</h1>
            <p class="lead">Convert an integer between 1 - 100000 to a roman numeral</p>
            <div class="form-group">
                <span>
                    Result:
                    <strong>
                        <?php echo $romanNumeralConverter->getRomanNumeral(); ?>
                    </strong>
                </span>
                <small id="emailHelp" class="d-none">We'll never share your email with anyone else.</small>
            </div>
            <a href="/" class="btn btn-primary">Try Another</a>
        </div>
    </body>
</html>