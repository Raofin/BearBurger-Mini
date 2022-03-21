<?php
    function search()
    {
        $foods = readJson('foods.json');
        $found = false;

        echo '<center>';
        foreach ($foods as $item) {
            if (strpos(strtolower($item['title']), strtolower($_POST['search'])) !== false) {
                $found = true;
                echo '            
                <div style="max-width:20rem; border:1px solid black; margin-bottom:30px; padding:10px;">
                    <h3>' . $item['title'] . '</h3>
                    <p>' . $item['description'] . '</p>
                    <h4>Price: ' . $item['price'] . 'tk</h4>
                    <a href="../View/payment.php"><button type="button">Buy</button></a>
                </div>';
            }
        }
        if (!$found) echo '<h3 style="color:tomato;">Sorry ' . $_SESSION['username'] . '! ' . $_POST['search'] . ' is not available.</h3>';
        echo '</center>';
    }