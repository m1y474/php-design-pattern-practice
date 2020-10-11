<?php

require_once './NewsDirector.class.php';
require_once './RssNewsBuilder.class.php';

$builder = new RssNewsBuilder();
$url = 'http://www.php.net/news.rss';

$director = new NewsDirector($builder, $url);
foreach ($director->getNews() as $article) {
    printf(
        '<li>[%s] <a href="%s">%s</a></li>',
        $article->getDate(),
        $article->getUrl(),
        htmlspecialchars($article->getTitle(), ENT_QUOTES, mb_internal_encoding())
    );
}
