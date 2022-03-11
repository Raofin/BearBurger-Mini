<?php include 'header.php'; ?>
    <center>
        <h1>Modify User Details</h1>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right">User ID:</td>
                    <td align="left"><?php echo $_SESSION['id'] ?></td>
                </tr>
                <tr>
                    <td align="right">Username:</td>
                    <td align="left">
                        <label for="username"></label>
                        <input type="text" id="username" name="username"
                               value="<?php echo $_SESSION['username'] ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">Email:</td>
                    <td align="left">
                        <label for="email"></label>
                        <input type="text" id="email" name="email"
                               value="<?php echo $_SESSION['email'] ?>"
                    </td>
                </tr>
                <tr>
                    <td align="right">Password:</td>
                    <td align="left">
                        <label for="password"></label>
                        <input type="password" id="password" name="password"
                               value="<?php echo $_SESSION['password'] ?>"
                    </td>
                </tr>
                <tr>
                    <td align="right">Phone Number:</td>
                    <td align="left">
                        <label for="phone"></label>
                        <input type="text" id="phone" name="phone"
                               value="<?php echo $_SESSION['phone'] ?>"
                    </td>
                </tr>
                <tr>
                    <td align="right">Gender:</td>
                    <td align="left"><?php echo $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                    <td align="right">Joined:</td>
                    <td align="left"><?php echo $_SESSION['joined'] ?></td>
                </tr>
            </table>
            <br>
            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                    update($_SESSION['email'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['phone']) ?>
            <input type="submit" value="Update">
        </form>
    </center>

<?php include 'footer.php' ?>