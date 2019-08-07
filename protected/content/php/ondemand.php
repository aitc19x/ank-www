<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    header_show(translation_get("ondemand"), "ondemand", array(
        "home" => "/",
        "news" => "/news",
        "culture" => "/culture",
        "ondemand" => "/ondemand",
        "tv" => "/tv",
        "about" => "/about"
    ));
?>

<body class="bg-sakura">
</body>

<?php footer_show(); ?>