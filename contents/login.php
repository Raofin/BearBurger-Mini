<?php include 'header.php'; ?>
    <center>
        <h1>Welcome to BearBurger!</h1><br>
        <h3>User Login</h3>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">Email</td>
                    <td align="left"><input type="text" id="email" name="email"></td>
                </tr>
                <tr>
                    <td align="right">Password</td>
                    <td align="left"><input type="password" id="password" name="password"></td>
                </tr>
            </table>
            <input type="checkbox" id="remember" name="remember" value="remember">
            <label for="remember">Remember</label>
            <br><br>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') login($_POST['email'], $_POST['password']) ?>
            <input type="submit" value="Login">
            <br><br><br>
            <div>
                <span style="float:left;">New here? <a href="register.php">Register</a></span>
                <span style="float:right;"><a href="recover.php">Forgot Password</a></span>
            </div>
        </form>
    </center>

<?php include 'footer.php' ?>