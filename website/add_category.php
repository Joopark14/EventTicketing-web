<?php
    include "navigation.php"
?>
<link rel="stylesheet" href="./styles/SignUp.css">
    <section class="signup" method="post">
        <h2>Add Category</h2>
        <form action="./functions/add_category_function.php" method=post>
            <label>Add Category</label>
            <input type="text" name="category_name" placeholder="Enter category name...">
            <button type="submit" name="submit">Sign Up</button>
            <br>
        </form>
        <?php
            
        ?>
    </section>

</body>
</html>