<?php

namespace App\Model\Admin;

use Auth;
use App\Model\BaseModel;
use App\Model\Common\User;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use DB;
use App\Model\Common\Notification;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class BannerPage extends Model
{
    protected $table = 'banner_pages';
    protected $dates = ['created_at', 'updated_at'];

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }


    public static function getDataForEdit($id)
    {
        $post = self::where('id', $id)
            ->with([
                'image'
            ])
            ->firstOrFail();

        return $post;
    }

    public static function getDataForShow($id)
    {
        return self::where('id', $id)
            ->with([
                'image'
            ])
            ->firstOrFail();
    }
}
