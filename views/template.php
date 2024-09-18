<!-- Display -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?= $webRoot ?>">
    <style><?php include 'Content/css/style.css'; ?></style>
    <link rel="stylesheet" href="./Content/css/style.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <title><?= $title ?></title> <!-- Specific element -->
</head>
<body>
    <nav>
        <div class="logo">
            <img src="./Content/images/Logo.png" alt="Home Logo">
            <h1>My Stocks</h1>
        </div>
        <ul>
            <li>
                <a href="<?= $webRoot ?>ControllerStocks">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                    </svg>
                    Stock
                </a>
            </li>
            <li>
                <a href="<?= $webRoot ?>ControllerUsers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                    </svg>
                    Users
                </a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
    </nav>
    <div class="menubar">
        <ul>
            <li><a href="<?= $webRoot ?>">Stock</a></li>
        </ul>
    </div>
    <div class="menubar">
        <ul>
            <li><a href="<?= $webRoot ?>">Users</a></li>
        </ul>
    </div>
    <div id="content">
        <?= $content ?> <!-- Specific element -->
    </div>
    <footer>
        <p>&copy; 2023 WorkForce. All rights reserved.</p>
    </footer>
</body>
</html>