<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "instructor" => $this->instructor,
            "category" => $this->category,
            "enrolled_date" => $this->created_at->format("d M Y")
        ];
    }
}
