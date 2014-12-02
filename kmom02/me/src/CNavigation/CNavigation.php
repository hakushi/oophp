<?php
// Create navigation constructor class
class CNavigation
{
    public static function generateMenu($menu, $class)
    {
        if (isset($menu['callback'])) {
            $items = call_user_func($menu['callback'], $menu['items']);
        }
        $html = "<nav class=$class>\n";
        foreach ($items as $key => $item) {
            $selected = (basename($_SERVER["REQUEST_URI"], ".php") == $key) ? 'selected' : null;
            $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
}
