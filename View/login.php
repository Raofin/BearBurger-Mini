<?php
    require 'header.php';
    if (isset($_SESSION['username'])) {
        header("location: home.php");
        die();
    }
?>
    <center>
        <h1>Welcome to BearBurger!</h1><br>
        <h3>User Login</h3>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">Email</td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="email" id="email" name="email"
                               value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"
                               required>
                    </td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td align="left">
                        <label for="password"></label>
                        <input type="password" id="password" name="password"
                               value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"
                               required>
                    </td>
                </tr>
            </table>
            <br>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                login();
            } ?>
            <input type="submit" value="Login">
            <br><br><br>
            <div>
                <span style="float:left;">New here? <a href="register.php">Register</a></span>
                <span style="float:right;"><a href="recover.php">Forgot Password</a></span>
            </div>
        </form>
    </center>

<?php include 'footer.php' ?>