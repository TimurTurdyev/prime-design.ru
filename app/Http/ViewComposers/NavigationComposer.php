<?php

namespace App\Http\ViewComposers;

use App\Model\Menu;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        $menus = Menu::isStatus()
            ->ofSort(['parent_id' => 'asc', 'sort_order' => 'asc'])
            ->get();

        return $view->with('menus', $this->buildTree($menus));
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $items->where('parent_id', null);
    }
}