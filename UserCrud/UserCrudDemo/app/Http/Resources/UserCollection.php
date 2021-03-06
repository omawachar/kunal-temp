<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $collects = UserResource::class;
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

    public function with($request)
    {
        $data = [
            'meta' => [
                'total' => $this->collection->count()
            ],
        ];

        $metaData =  metaData(true, $request, '20001', 'success', 200, '');
        return  merge($metaData, $data);
    }

    
}
