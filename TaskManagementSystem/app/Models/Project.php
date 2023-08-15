<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'description', 'due_date', 'template_id', 'assigned_user_id','userstatus',
    'adminchecked',];
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
    public function notes()
{
    return $this->hasMany(Note::class);
}
}
