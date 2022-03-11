<?php include 'header.php'; ?>
    <center>
        <h1>Account Recovery</h1><br>
        <h3>Recover your BearBurger account</h3>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">Email</td>
                    <td align="left"><input type="text" id="email" name="email"></td>
                </tr>
            </table>
            <br>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') recover($_POST['email']) ?>
            <input type="submit" value="Recover">
            <br><br><br>
            <div>
                <span style="float:left;">Back to <a href="register.php">Login</a></span>
                <span style="float:right;"><a href="login.php">Create a New Account</a></span>
            </div>
        </form>
    </center>

<?php include 'footer.php' ?>