<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="phone">Phone numbers:</label><br>
        <textarea id="phone" name="phone" rows="4" cols="50"></textarea>
        <input type="submit" value="Phân loại"><br>
    </form>
    <?php

    function display($numbers)
    {
    ?>
        <div>
            <?php
            // global $products;

            foreach ($numbers as $item => $number) : ?>
                <p>
                    <span>
                        <?php echo implode("", $number); ?>
                    </span>
                </p>
            <?php endforeach; ?>
        </div>
    <?php
    }

    function search(array $numbers, int $needle): bool
    {
        $totalItems = count($numbers);

        for ($i = 0; $i < $totalItems; $i++) {
            if ($numbers[$i] === $needle) {
                return TRUE;
            }
        }
        return FALSE;
    }

    function classify($number, &$viettel, &$vinaphone, &$mobiphone)
    {
        $vinaphone_num = [3, 4, 5, 7, 8, 9];
        // $mobiphone_num = [0, 1, 2, 6];
        if ($number[2] == 6):
            array_push($viettel, $number);
        elseif (search($vinaphone_num, $number[3])):
            array_push($vinaphone, $number);
        else:
            array_push($mobiphone, $number);
        endif;
    }

    ?>
    <div>

    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") :

        $phone = $_POST["phone"];
        $phone_numbers = explode(" ", $phone);
        $viettel = [];
        $vinaphone = [];
        $mobiphone = [];
        foreach ($phone_numbers as $phone_number) :
            $num  = array_map('intval', str_split($phone_number));
            classify($num, $viettel, $vinaphone, $mobiphone);
        endforeach; ?>
        <div>
            <div>
                Viettel:
                <?php
                display($viettel);
                ?>
            </div>
            <div>
                vinaphone:
                <?php
                display($vinaphone);
                ?>
            </div>
            <div>
                Mobiphone:
                <?php
                display($mobiphone);
                ?>
            </div>
        </div>
    <?php
    endif;
    ?>

</body>

</html>
