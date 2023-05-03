<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the comments for the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(
                'id',
                'user_id',
                'department_id',
                'department_user.updated_at',
            )
            ->latest('department_user.updated_at')
            ->take(1);
    }
}
