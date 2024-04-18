<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Resources\RoleResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserResource extends JsonResource
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

        return [
           
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password'=>$this->password,
           
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'property' => PropertyResource::collection($this->whenLoaded('properties')),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
