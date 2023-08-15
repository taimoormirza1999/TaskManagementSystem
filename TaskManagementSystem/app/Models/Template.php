<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_date',
    ];
    use HasFactory;
    public function projects()
    {
        return $this->hasMany(Project::class, 'template_id');
    }
}
