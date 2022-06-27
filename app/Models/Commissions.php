<?php

namespace App\Models;

use App\Models\User;
use App\Models\MarketingLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'marketing_level_id', 'amount', 'created_at', 'updated_at'];

    /**
     * User has many commissions relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Marketing Level has one commission relationship
     */
    public function marketingLevel()
    {
        return $this->belongsTo(marketingLevel::class);
    }
}
