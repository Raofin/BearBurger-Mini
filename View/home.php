<?php
    require 'header.php';

    if (!isset($_SESSION['username'])) {
        header("location: login.php");
        die();
    }
?>
    <h1 style="text-align: center;">Order Your Favourite Foods!</h1>

    <div style="text-align: center; width:45rem; margin:0 auto;">
        <div style="max-width:20rem; border:1px solid black; margin-bottom:20px; padding:10px; float:left ">
            <h3>Crispy Chicken Burger</h3>
            <p>This crispy chicken burger with honey mustard sauce makes for a crunchy goodness</p>
            <h4>Price: 690 tk</h4>
            <a href=""><button type="button">Buy</button></a>
        </div>

        <div style="max-width:20rem; border:1px solid black;margin-bottom:20px; padding:10px; float:right">
            <h3>Mexican Grilled Chicken</h3>
            <p>Prepared with spicy mexican seasoning marinated grilled chicken leg</p>
            <h4>Price: 420 tk</h4>
            <a href=""><button type="button">Buy</button></a>
        </div>
    </div>

    <div style="text-align: center; width:45rem; margin:0 auto;">
        <div style="max-width: 20rem; border: 1px solid black;margin-bottom:20px; padding: 10px; float:left ">
            <h3>Beef Tenderloin Steak</h3>
            <p>Prepared with fettucine tossed in spicy tomato butter sauce with sauteed salmon, prawn & squid</p>
            <h4>Price: 980 tk</h4>
            <a href=""><button type="button">Buy</button></a>
        </div>

        <div style="max-width: 20rem; border: 1px solid black;margin-bottom:20px;padding: 10px;float:right">
            <h3>Grilled Chicken Salad</h3>
            <p>Served with sauteed vegetables, pepper sauce & a choice of fried rice or mashed potato</p>
            <h4>Price: 500 tk</h4>
            <a href=""><button type="button">Buy</button></a>
        </div>
    </div>
<?php
    include 'footer.php';
?>