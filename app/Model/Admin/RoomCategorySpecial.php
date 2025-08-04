<?php

namespace App\Model\Admin;

use App\Model\BaseModel;

class RoomCategorySpecial extends BaseModel
{
    protected $table = 'room_category_special';
    protected $fillable = ['room_id', 'category_special_id'];

}
