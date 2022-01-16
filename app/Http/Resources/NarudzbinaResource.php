<?php

namespace App\Http\Resources;

use App\Models\Beauty;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NarudzbinaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap='narudzbina';

    public function toArray($request)
    {
        return [
            'broj'=>$this->resource->broj,
            'cena' => $this->resource->cena,
            'userID' => new UserResource(User::find($this->resource->userID)),
            'brojTelefona' => $this->resource->brojTelefona,
            'adresa' => $this->resource->adresa,
            'proizvodID' => new BeautyResource(Beauty::find($this->resource->proizvodID))
        ];
    }
}
