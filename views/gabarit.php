<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="resources/css/style.css" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="#" class="lang-switch" data-locale="fr">Français</a> |
                <a href="#" class="lang-switch" data-locale="en">English</a> |
                <a href="#" class="lang-switch" data-locale="ru">Русский</a>

                <a href=""><h1 id="titreBlog"><span data-i18n="BlogueProf">Le Blogue du prof</span> v0.9.0.1</h1></a>
                <p>Version MVC en PHP orienté-objet avec tests.</p>
                <a href="Apropos">
                    <h4>À propos</h4>
                </a>
                <a href="tests.php">
                    <h3>TESTS</h3>
                </a>
            </header>
            <div id="contenu">
                <?= $contenu ?>   <!-- Élément spécifique -->
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script src="Contenu/js/autocompleteType.js"></script>
        <script src="Contenu/jquery.i18n/src/CLDRPluralRuleParser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
        <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
        <script src="Contenu/i18n/main-jquery_i18n.js"></script>
    </body>
</html>



