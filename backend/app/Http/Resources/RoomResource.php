<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'     => $this->room_id,
            'name'   => $this->name,
            'price'  => (int) $this->price,
            'image'  => asset('img/' . $this->image),
            'status' => $this->status,
        ];
    }
}
