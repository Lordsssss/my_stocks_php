
<section id="connection">
    <style><?php include 'Content/css/connection.css'; ?></style>
    <link rel="stylesheet" href="./Content/css/connection.css">
    <h2 class="title">Login Page</h2>
    <div class="login">
    <form action="ControllerConnection/login" method="post">
        <div>
            <label class="labellog" for="login">Username:</label>
            <input class="inputlog" type="text" id="login" name="login" required>
        </div>
        <div>
            <label class="labellog" for="password">Password:</label>
            <input class="inputlog" type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    </div>
</section>
