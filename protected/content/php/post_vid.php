<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/post.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/video.php");
    $flag = false;
    if (isset($_GET["page"])) $url = $type . "/page/" . $_GET["page"];
    else $url = $type;
    $meta = post_meta_get($type, $id);
    if ($meta == null) {
        $id = "top-" . $id;
        $meta = post_meta_get($type, $id);
    }
    if ($meta == null) $flag = true;
    if ($meta["title-" . translation_get("lang_code")] == "" && !$flag) $flag = true;
    if (!$flag) $title_prefix = post_meta_get($type, $id)["title-" . translation_get("lang_code")] . " - "; else $title_prefix = "";
    header_show($title_prefix . translation_get($type), $type, array(
        "home" => "/",
        "news" => "/news",
        "culture" => "/culture",
        "ondemand" => "/ondemand",
        "live" => "/live",
        "tv" => "/tv",
        "about" => "/about"
    ));
?>

<body class="bg-sakura">
    <?php
        $m_top = (markdown_read("global", "top") == "The post does not exist.") ? 70 : 90;
        echo(dynamic_element_handle("post-header", array(
            "mark_start" => (substr($id, 0, 3) != "top" ? "" : "<mark>"),
            "mark_end" => (substr($id, 0, 3) != "top" ? "" : "</mark>"),
            "back" => translation_get("back"),
            "type" => (substr($id, 0, 3) != "top" ? "" : translation_get("top") . " ") . translation_get($type),
            "title" => $meta["title-" . translation_get("lang_code")],
            "url" => $url,
            "m_top" => $m_top
        )));
    ?>
    <div class="col-md-8 mx-auto">
        <?php
            if ($flag) echo("This video does not exist.");
            if (isset($meta["note-" . translation_get("lang_code")]) && !$flag) {
                if ($meta["note-" . translation_get("lang_code")] != "") $note_available = true;
                else $note_available = false;
            } else $note_available = true;
            if ((isset($meta["note-en"]) || isset($meta["note-ja"]) || isset($meta["note-zh"])) && $note_available && !$flag) {
                echo("<div class='alert alert-primary' role='alert'>");
                if (isset($meta["note-" . translation_get("lang_code")])) echo($meta["note-" . translation_get("lang_code")]);
                else {
                    if (isset($meta["note-en"])) echo($meta["note-en"]);
                    else {
                        if (isset($meta["note-ja"])) echo($meta["note-ja"]);
                        else {
                            if (isset($meta["note-zh"])) echo($meta["note-zh"]);
                        }
                    }
                }
                echo("</div>");
            }
            if ($type == "ondemand" && !$flag) {
                switch (translation_get("lang_code")) {
                    case "zh":
                        echo(dynamic_element_handle("vid-zh", array(
                            "vid_url" => bilibili_get($meta["embed-bilibili"]["aid"], $meta["embed-bilibili"]["cid"])
                        )));
                        break;
                    default:
                        echo(dynamic_element_handle("vid-glob", array(
                            "vid_url" => $meta["embed-youtube"]
                        )));
                        break;
                }
            }
            else if ($type == "tv" && !$flag) {
                if (isset($meta["embed-youtube"])) {
                    echo(dynamic_element_handle("vid-glob", array(
                        "vid_url" => $meta["embed-youtube"]
                    )));
                } else {
                    echo(dynamic_element_handle("vid-tv", array(
                        "vid_url" => $meta["url"]
                    )));
                }
            }
        ?>
    </div>
</body>

<?php footer_show() ?>