<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel', 
        'is_done',
        'project_id'
    ];

    protected $casts = [
        'is_done' => 'boolean'
    ];
    public function creator():BelongsTo{
        return $this->belongsTo(User::class ,'creator_id');
    }
    public function projects(): BelongsTo
    {
        return $this->belongsTo(project::class);
    }
}
