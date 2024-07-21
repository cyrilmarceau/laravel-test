<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseRessource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'muscle_groups' => MuscleGroupRessource::collection($this->whenLoaded('muscleGroups')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
      
    }
}
