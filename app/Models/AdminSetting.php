<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;

    protected $table = 'admin_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'phone',
        'gender',
        'photo',
        'address',
    ];

    /**
     * Get the admin that owns the setting.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
