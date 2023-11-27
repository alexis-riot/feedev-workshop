<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Question extends Model
{
    protected $fillable = [
        'title', 'description',
    ];

    public function feedbacks(): HasManyThrough
    {
        return $this->hasManyThrough(FeedbackQuestion::class, Feedback::class)
            ->withPivot('value');
    }
}
