<?php

    function loadFoods()
    {
        echo '<h1 style="text-align: center;">Order Your Favourite Foods!</h1>';
        $foods = readJson('foods.json');
        $float = "float:left";
        $flag = 1;

        foreach ($foods as $item) {
            if ($flag == 1) echo '<div style="text-align: center; width:45rem; margin:0 auto;">';

            echo '            
                <div style="max-width:20rem; border:1px solid black; margin-bottom:30px; padding:10px; ' . $float . '; ">
                    <h3>' . $item['title'] . '</h3>
                    <p>' . $item['description'] . '</p>
                    <h4>Price: ' . $item['price'] . 'tk</h4>
                    <a href="../View/payment.php"><button type="button">Buy</button></a>
                </div>';

            if ($flag !== 1) {
                echo '</div>';
                $flag = 1;
                $float = "float:left";
            } else {
                $flag = 2;
                $float = "float:right";
            }
        }

        echo '<div style="clear: both"><h1>f</h1></div>';
    }