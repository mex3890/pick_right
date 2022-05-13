<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required|min:2|max:50',
        'description' => 'required|min:2|max:300',
        'stat_id' => 'required',
        'category_id' => 'required|exists:categories,id'
    ];

    public static $feedback = [
        'required' => 'The :attribute is mandatory',
        'min' => 'The minimum number of characters is 2',
        'name.max' => 'The maximum number of characters is 50',
        'description.max' => 'The maximum number of characters is 300',
        'category_id.exists' => 'The category is mandatory'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function teams(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function stat(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Stat::class);
    }
}
