<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    protected $table = 'user_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'gender',
        'photo',
        'address',
    ];

    /**
     * Get the admin that owns the setting.
     */
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
