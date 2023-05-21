<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'card_number', 'name', 'address', 'phone', 'birth_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function installments()
    {
        return $this->hasManyThrough(Installment::class, Loan::class);
    }

    // scope for this month
    public function scopeThisMonth($query)
    {
        return $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    // scope for last month
    public function scopeLastMonth($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
    }

    // scope for this week
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    // scope for last week
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

    // scope for this year
    public function scopeThisYear($query)
    {
        return $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
    }

    // scope for last year
    public function scopeLastYear($query)
    {
        return $query->whereBetween('created_at', [now()->subYear()->startOfYear(), now()->subYear()->endOfYear()]);
    }

    // scope for today
    public function scopeToday($query)
    {
        return $query->where('created_at', now());
    }

}
