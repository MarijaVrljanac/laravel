<?php

namespace App\Http\Resources;

use App\Models\Kategorija;
use Illuminate\Http\Resources\Json\JsonResource;

class BeautyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap='beauty';

    public function toArray($request)
    {
        return [
            'naziv' => $this->resource->naziv,
            'sifra' => $this->resource->sifra,
            'kolicina' => $this->resource->kolicina,
            'velicina' => $this->resource->velicina,
            'kategorijaID' => new KategorijaResource(Kategorija::find($this->resource->kategorijaID))
        ];
    }
}
