<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function boot() {
        parent::boot();
        static::deleting(function ($model) {
            $model->categories()->detach();
        });
    }

    public function categories (): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
