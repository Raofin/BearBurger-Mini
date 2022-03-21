<?php
    require 'header.php';
    if (isset($_SESSION['username'])) {
        header("location: home.php");
        die();
    }
?>
    <center>
        <h1>Account Recovery</h1><br>
        <h3>Recover your BearBurger account</h3>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">Email</td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="text" id="email" name="email"
                               value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"
                               required>
                    </td>
                </tr>
            </table>
            <br>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') recover() ?>
            <input type="submit" value="Recover">
            <br><br><br>
            <div>
                <span style="float:left;">Back to <a href="login.php">Login</a></span>
                <span style="float:right;"><a href="register.php">Create a New Account</a></span>
            </div>
        </form>
    </center>

<?php include 'footer.php' ?>