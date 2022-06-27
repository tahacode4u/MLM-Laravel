<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingLevel extends Model
{
    use HasFactory;

    protected $fillable = ['level_name', 'percentage', 'created_at', 'updated_at'];
    /**
     * Relationship between level and user with belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship between commission and level
     */
    public function commission()
    {
        return $this->hasMany(Commissions::class);
    }
}
