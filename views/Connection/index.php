
<section id="connection">
    <style><?php include '/Content/css/connection.css'; ?></style>
    <h2 class="title">Login Page</h2>
    <div className="login">
    <form action="ControllerConnection/login" method="post">
        <div>
            <label className="labellog" for="login">Username:</label>
            <input className="inputlog" type="text" id="login" name="login" required>
        </div>
        <div>
            <label className="labellog" for="password">Password:</label>
            <input className="inputlog" type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    </div>
</section>
