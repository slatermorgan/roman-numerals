<?php

require_once "Helper/RomanNumeralConverter.php";
use RomanNumeral\Helper\RomanNumeralConverter;

?>

<html>
    <body>
        Welcome <?php echo RomanNumeralConverter::getRomanNumeral($_POST["int"]); ?><br>
    </body>
</html>