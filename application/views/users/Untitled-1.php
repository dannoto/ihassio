<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>

<body>
    <?php

    function isAccessedViaIframe()
    {
        return isset($_SERVER['HTTP_X_FRAME_OPTIONS']);
    }

    if (isAccessedViaIframe()) {

        $count = 0;

        foreach ($this->main_model->getLibrary() as $l) {

            $count++;
            echo '<iframe src="' . $l->library_url . ' " width="300" height="500"></iframe>';
            // echo $count;

            if ($count == 33 || $count == 66 || $count == 99 || $count == 133) {
                echo "DELAYYYYYYYYYYYYYYYYYYY ".$count;
                sleep(3000);
            }
        }

        // A página está sendo acessada via iframe
        echo "Esta página está sendo acessada via iframe.";
    } else {
        // A página não está sendo acessada via iframe
        echo "Esta página não está sendo acessada via iframe.";
    }

    ?>

</body>

</html>