<?php

namespace App\Http\Requests\Rooms;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class RoomStoreRequest extends BaseRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|unique:rooms,name',
            'area' => 'required',
            'status' => 'required|in:1,2',
            'view' => 'required',
            'price' => 'required',
            'bedrooms' => 'required',
            'description' => 'nullable',
            'maximum_occupancy' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:10000',
            'galleries' => 'required|array|min:1|max:20',
            'galleries.*.image' => 'required|file|mimes:png,jpg,jpeg|max:10000',
        ];

        return $rules;
    }

}
