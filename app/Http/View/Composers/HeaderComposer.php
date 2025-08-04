<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Course;
use App\Model\Admin\Gallery;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Room;
use App\Model\Admin\Service;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $services = Service::query()->where('status',1)->latest()->get();
        $categories = Category::query()->orderBy('sort_order')->get();
        $courses = Course::query()->where('status',1)->latest()->get();
        $cartItems = \Cart::getContent();
        $galleries = Gallery::query()->with('image')->latest()->get()->take(6);

        $totalPriceCart = \Cart::getTotal();

        $view->with(['config' => $config,
            'cartItems' => $cartItems,
            'totalPriceCart' => $totalPriceCart,
            'services' => $services,
            'categories' => $categories,
            'courses' => $courses,
            'galleries' => $galleries,
        ]);
    }
}
