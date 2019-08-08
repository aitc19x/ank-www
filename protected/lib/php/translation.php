<?php

if (!isset($_COOKIE["lang"])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang) {
        case "zh":
            setcookie("lang", "zh", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
        case "ja":
            setcookie("lang", "ja", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
        default:
            setcookie("lang", "en", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
    }
    return;
}

$lang = $_COOKIE['lang'];

$translation_japanese = array(
    "lang_code" => "ja",
    "homepage" => "ホームページ",
    "club_name" => "江西師範大学附属中米国際高校日本文化研究部",
    "switch_lang" => "言語選択",
    "follow_us" => "フォローする：",
    "copyright" => "Copyright AMSJXNU Nippon Bunka Kenkyu Bu All rights reserved.",
    "home" => "ホーム",
    "news" => "ニュース",
    "culture" => "文化",
    "ondemand" => "オンデマンド",
    "about" => "について",
    "view" => "見る",
    "back" => "戻す",
    "top" => "おすすめ",
    "explore" => "ANKを探索する",
    "meta_description" => "日中交流を促進している日本文化研究部",
    "tv" => "テレビ",
    "live" => "ライブ",
    "notice" => "お知らせ",
    "ok" => "はい",
    "tv_notice" => "これらのチャンネルの著作権がありませんが、学習・研究以外で使用することは禁止です。",
    "error_occurred" => "エラーが発生しました。",
    "live_error_msg" => "インタネット接続・ライブ計画をご確認ください。<br>ページを再読み込みするとやり直してきます。",
    "message" => "メッセージ",
    "send" => "送る",
    "sync" => "同期する",
    "bio" => "中国と日本を結ぶ。"
);

$translation_chinese = array(
    "lang_code" => "zh",
    "homepage" => "主页",
    "club_name" => "江西师大附中中美班日本文化研究社",
    "switch_lang" => "语言选择",
    "follow_us" => "关注我们：",
    "copyright" => "版权归江西师大附中中美班日本文化研究社所有",
    "home" => "主页",
    "news" => "新闻",
    "culture" => "文化",
    "ondemand" => "点播",
    "about" => "关于",
    "view" => "查看",
    "back" => "返回",
    "top" => "置顶",
    "explore" => "深入了解 ANK",
    "meta_description" => "一个推动中日交流的日本文化研究社团",
    "tv" => "电视",
    "live" => "直播",
    "notice" => "请注意",
    "ok" => "好",
    "tv_notice" => "这些频道的版权归版权方所有，仅供个人学习研究使用。",
    "error_occurred" => "发生了错误。",
    "live_error_msg" => "请检查您的因特网连接和直播安排。<br>您可以通过刷新该页面进行重试。",
    "message" => "消息",
    "send" => "发送",
    "sync" => "同步",
    "bio" => "连接中国和日本。"
);

$translation_english = array(
    "lang_code" => "en",
    "homepage" => "Homepage",
    "club_name" => "AMSJXNU Nippon Kenkyu",
    "switch_lang" => "Switch language",
    "follow_us" => "Follow us: ",
    "copyright" => "Copyright AMSJXNU Japanese Culture Research Club All rights reserved.",
    "home" => "Home",
    "news" => "News",
    "culture" => "Culture",
    "ondemand" => "On Demand",
    "about" => "About",
    "view" => "View",
    "back" => "Back",
    "top" => "Featured",
    "explore" => "Explore ANK",
    "meta_description" => "An Japanese club prolonging communication between China and Japan",
    "tv" => "TV",
    "live" => "Live",
    "notice" => "Notice",
    "ok" => "OK",
    "tv_notice" => "We have no copyright on these channels, please use these resources only for studying or researching.",
    "error_occurred" => "An error has ocurred.",
    "live_error_msg" => "Please check your network connection and the schedule of the live.<br>You can retry by refreshing this page.",
    "message" => "Message",
    "send" => "Send",
    "sync" => "Synchronize",
    "bio" => "Connect China and Japan."
);

function translation_get(string $id) {
    global $lang, $translation_japanese, $translation_chinese, $translation_english;
    switch ($lang) {
        case "ja":
            return $translation_japanese[$id];
        case "zh":
            return $translation_chinese[$id];
        case "en":
            return $translation_english[$id];
    }
}