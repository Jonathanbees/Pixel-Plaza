<?php

namespace App\Utils;

class FormattingUtils
{
    public static function convertMarkdownToHtml(string $markdown): string
    {
        $html = htmlspecialchars($markdown, ENT_QUOTES, 'UTF-8');

        $html = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $html); // Bold
        $html = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $html); // Italic
        $html = preg_replace('/\# (.*?)\n/', '<h1>$1</h1>', $html); // H1
        $html = preg_replace('/\#\# (.*?)\n/', '<h2>$1</h2>', $html); // H2
        $html = preg_replace('/\#\#\# (.*?)\n/', '<h3>$1</h3>', $html); // H3
        $html = preg_replace('/\n/', '<br>', $html); // Line breaks

        return $html;
    }
}
