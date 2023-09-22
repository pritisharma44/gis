<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceEngineerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"    =>   $this->id,
            "name"   =>   $this->name,
            "email"   =>   $this->email,
            "contact_no" =>  $this->contact_no,
            "status" =>   $this->status,
            "address" =>   $this->address,
            "user_type" =>   $this->user_type,
            "client_type" =>   $this->client_type,
            "client_type" =>   $this->client_type,
            "created_at" =>   $this->created_at,
            "updated_at" =>   $this->updated_at,
            "image"   => $this->image ? url('upload/profile-img').'/'.$this->image :  URL::asset('assets/images/profile.png'),

        ];
    }
}
