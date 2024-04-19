<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupByRangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            '0to5000' => $this->resource->zeroToFiveThousands,
            '5000to10000' => $this->resource->fiveToTenThousands,
            '10000to100000' => $this->resource->tenToHundredThousands,
            '100000toup' => $this->resource->overHundredThousands,
        ];
    }
}
