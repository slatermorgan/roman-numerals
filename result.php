<?php

require_once "Helper/RomanNumeralConverter.php";
require_once "Helper/InputValidator.php";
use RomanNumeral\Helper\RomanNumeralConverter;
use RomanNumeral\Helper\InputValidator;

$inputValidator = new InputValidator($_POST["int"]);
$result = '';
$errorMessage = '';

if ($inputValidator->isValid()) {
    $romanNumeralConverter = new RomanNumeralConverter($_POST["int"]);
    $result = $romanNumeralConverter->getRomanNumeral();
} else {
    $errorMessage = $inputValidator->getMessage();
}



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
                        <?php echo $result; ?>
                    </strong>
                </span>
                <span class="text-danger">
                    <?php echo $errorMessage; ?>
                </span>
            </div>
            <a href="/" class="btn btn-primary">Try Another</a>
        </div>
    </body>
</html>