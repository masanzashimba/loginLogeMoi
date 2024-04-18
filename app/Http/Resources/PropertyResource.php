<?php

namespace App\Http\Resources;

use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Laratrust\Traits\HasRolesAndPermissions;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Laratrust\Traits\LaratrustUser;


class PropertyResource extends JsonResource
{
    use HasApiTokens, HasFactory, Notifiable,HasRolesAndPermissions;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        // $flatArray = collect($nestedArray)->flatten()->toArray();
        // $users = User::whereIn('id', $flatArray)->get();
 
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
           
            'titre' => $this->title,
            'description'=> $this->description,
            'surface'=> $this->surface,
            'rooms'=> $this->rooms,
             'bedrooms'=> $this->bedrooms,
            'floor'=> $this->floor,
             'price'=> $this->price,
            'city'=> $this->city,
            'address'=> $this->address,
            'postal_code'=> $this->postal_code,
            'sold'=> $this->sold,
            'deleted_at'=> $this->deleted_at,
            'type'=> $this->type,
            'options' => OptionResource::collection($this->whenLoaded('options')),
            'Pictures' => PictureResource::collection($this->whenLoaded('pictures')),
            // 'options' => OptionResource::collection($this->resource->options),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_roles' => $this->user->roles->pluck('name'), 

        ];
            // 'id' =>$this->resource->id,
            // 'title' => $this->resource->title,
            // 'options' => OptionResource::collection($this->resource->options)

    

    }
}
