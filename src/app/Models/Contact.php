<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getGenderAttribute($value)
    {
        $genders = [
            1 => '男性',
            2 => '女性',
            3 => 'その他'
        ];
        return $genders[$value];
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('first_name', 'like', '%' .$keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('tell', 'like', '%' . $keyword . '%')
                    ->orWhere('address', 'like', '%' . $keyword . '%')
                    ->orWhere('building', 'like', '%' . $keyword . '%');
        };
        return $query;
    }
}
