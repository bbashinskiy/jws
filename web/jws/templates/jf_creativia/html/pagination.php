<?php defined('_JEXEC') or die;

function pagination_list_render($list)
{
    // Initialize variables
    $lang = JFactory::getLanguage();

    $html = "<ul class=\"pagination\">";

    //$html .= $list['start']['data'];
    $html .= "<li class=\"pagination-prev\">" . $list['previous']['data'] . "</li>";

    foreach ($list['pages'] as $page) {

        $html .= "<li>" . $page['data'] . "</li>";

    }

    $html .= "<li class=\"pagination-next\">" .  $list['next']['data'] . "</li>";
    //$html .= $list['end']['data'];
    // $html .= '&#171;';

    $html .= "</ul>";
    return $html;
}

function pagination_item_active(&$item)
{
    return "<a class=\"pagenav\" href=\"" . $item->link . "\" title=\"" . $item->text . "\">" . $item->text . "</a>";
}

function pagination_item_inactive(&$item)
{
    return "<span class=\"pagenav\">" . $item->text . "</span>";
}

?>