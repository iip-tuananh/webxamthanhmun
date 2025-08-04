<?php

namespace App\Http\View\Composers;

use App\Model\Admin\About;
use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Consultant;
use App\Model\Admin\Partner;
use App\Model\Admin\Policy;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Store;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $serviceCategories = PostCategory::query()->with('childs')
            ->where('type', PostCategory::TYPE_SERVICE)
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get()->take(2);
        $postCategories = PostCategory::query()->with('childs')
            ->where('type', PostCategory::TYPE_POST)
            ->where('parent_id', 0)
            ->orderBy('sort_order')->get()->take(2);

        $about = About::query()->find(1);

        $view->with(['config' => $config, 'serviceCategories' => $serviceCategories, 'postCategories' => $postCategories, 'about' => $about]);
    }
}
