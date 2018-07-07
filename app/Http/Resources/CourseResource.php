<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'workload'      => $this->workload,
            'teacher'       => $this->teacher,
            'description'   => $this->description,
            // 'created_at'    => (string) $this->created_at,
            // 'updated_at'    => (string) $this->updated_at,
            // 'deleted_at'    => (string) $this->deleted_at,
        ];
    }

    public function with($request)
    {
        return [
            'version'    => '0.0.1',
            'author_url' => 'https://github.com/Railton98',
        ];
    }
}
