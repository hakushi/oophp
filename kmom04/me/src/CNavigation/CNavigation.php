<?php
// Create navigation constructor class
class CNavigation
{
    public static function generateMenu($menu, $class)
    {
        
        $items = $menu['items'];
        $html = "<nav class=$class>\n";
        foreach ($items as $key => $item) {
            $selected = (substr(basename($_SERVER["REQUEST_URI"]), 0, strpos(basename($_SERVER["REQUEST_URI"]), '.')) == $key) ? 'selected' : null;
            $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
}
