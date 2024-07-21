<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MuscleGroupsRessource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($muscleGroup) {
                return [
                    'id' => $muscleGroup->id,
                    'name' => $muscleGroup->name,
                    'slug' => $muscleGroup->slug,
                    'description' => $muscleGroup->description,
                    'created_at' => $muscleGroup->created_at,
                    'updated_at' => $muscleGroup->updated_at,
                ];
            }),
        ];
    }
}
