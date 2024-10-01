<section id="updateUser">
    <?php echo "<script>console.log('return: " . json_encode($userUpdate) . "');</script>"; ?>
    <h2>Update User</h2>
    <form action="ControllerAdminusers/update/<?= $userUpdate['account_number'] ?>" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userUpdate["username"]); ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userUpdate["email"]); ?>" required>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</section>
