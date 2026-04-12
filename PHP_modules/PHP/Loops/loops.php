<?php
    for ($i = 1; $i <= 5; $i++) {
        echo "Number: $i <br>";
    }
?>

<?php
    $i = 1;

    while ($i <= 5) {
        echo "Number: $i <br>";
        $i++;
    }
?>


<?php
    $i = 1;

    do {
        echo "Number: $i <br>";
        $i++;
    } while ($i <= 5);
?>

<?php
    for ($i = 1; $i <= 10; $i++) {
        if ($i == 5) break;
        echo $i;
    }
?>

<?php
    for ($i = 1; $i <= 5; $i++) {
        if ($i == 3) continue;
        echo $i;
    }
?>