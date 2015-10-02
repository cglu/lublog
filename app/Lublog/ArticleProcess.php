<?php
namespace lublog\Lublog;

class ArticleProcess
{

    const PAGE_BREAK_CONVERT = '<div class="page-break-anchor">&nbsp;</div>';

    public static function getSummary($body)
    {
        return explode(self::PAGE_BREAK_CONVERT, $body)[0];
    }
}

?>