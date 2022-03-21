<?php
    require 'header.php';
    require '../Controller/searchFoods.php';
    verifyLoggedIn();
?>

<center>
    <h1>Search for Your Favourite Foods</h1>
    <form action="" method="post" novalidate>
        <input type="text" name="search" placeholder="Type anything to search"
               value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>"><br><br>
        <input type="submit" value="Search">
    </form>
    <br><br>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') search(); ?>
    <br><br>
    <h3>Go Back to <a href="home.php">Home</a></h3>
</center>

<?php include 'footer.php'; ?>
