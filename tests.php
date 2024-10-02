<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'testModelPortfolio') {
        require 'tests/models/testModelPortfolio.php';
    } else if ($_GET['test'] == 'testModelStocks') {
        require 'tests/models/testModelStocks.php';
    } else if ($_GET['test'] == 'testModelUser') {
        require 'tests/models/testModelUser.php';
    } else if ($_GET['test'] == 'testViewStocks') {
        require 'tests/views/testViewStocks.php';
    } else if ($_GET['test'] == 'testViewUser') {
        require 'tests/views/testViewUser.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
    <style>
        <?php include 'Content/css/tests.css'; ?>
    </style>
    <link rel="stylesheet" href="./Content/css/tests.css">
    <div class="test">
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=testModelPortfolio">testModelPortfolio</a>
    </li>
    <li>
        <a href="tests.php?test=testModelStocks">testModelStocks</a>
    </li>
    <li>
        <a href="tests.php?test=testModelUser">testModelUser</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=testViewStocks">testViewStocks</a>
    </li>
    <li>
        <a href="tests.php?test=testViewUser">testViewUser</a>
    </li>
</ul>
</div>
