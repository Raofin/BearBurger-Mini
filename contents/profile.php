<?php include 'header.php'; ?>
    <center>
        <h1>User Profile</h1>
        <form style="max-width: 25rem" method="post" novalidate>
            <table>
                <tr>
                    <td align="right"><b>User ID:</b></td>
                    <td align="left"><?php echo $_SESSION['id'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Username:</b></td>
                    <td align="left"><?php echo $_SESSION['username'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Email:</b></td>
                    <td align="left"><?php echo $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Password:</b></td>
                    <td align="left"><?php echo $_SESSION['password'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Phone Number:</b></td>
                    <td align="left"><?php echo $_SESSION['phone'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Gender:</b></td>
                    <td align="left"><?php echo $_SESSION['gender'] ?></td>
                </tr>
                <tr>
                    <td align="right"><b>Joined:</b></td>
                    <td align="left"><?php echo $_SESSION['joined'] ?></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Modify Details">
        </form>
    </center>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("location: modify.php");
    die();
} ?>

<?php include 'footer.php' ?>