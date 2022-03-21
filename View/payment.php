<?php
    require 'header.php';
    verifyLoggedIn();
?>

<div>
    <center>
        <h2>Payment</h2>

        <form style="max-width: 25rem" name="f" action="" method="POST" novalidate>
            <table>
                <tr>
                    <td align="right">Name</td>
                    <td align="left">
                        <label for="name"></label>
                        <input type="text" id="name" name="name"
                               value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Credit Card Number</td>
                    <td align="left">
                        <label for="cardNumber"></label>
                        <input type="text" id="cardNumber" name="cardNumber"
                               value="<?php echo isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Expiration Date</td>
                    <td align="left">
                        <label for="expDate"></label>
                        <input type="date" id="expDate" name="expDate"
                               value="<?php echo isset($_POST['expDate']) ? $_POST['expDate'] : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Code CVV</td>
                    <td align="left">
                        <label for="codeCVV"></label>
                        <input type="password" id="codeCVV" name="codeCVV"
                               value="<?php echo isset($_POST['codeCVV']) ? $_POST['codeCVV'] : '' ?>" required>
                </tr>
            </table>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $success = true;
                    foreach ($_POST as $item) {
                        if ($item === "") {
                            echo '<h3 style="color:tomato;">Please fill out all the fields properly.</h3>';
                            $success = false;
                            break;
                        }
                    }
                    if ($success) header('location: paymentSuccessful.php');
                }
            ?>
            <br>
            <input type="submit" value="Confirm Payment">
        </form>
    </center>
</div>
<?php include 'footer.php'; ?>
