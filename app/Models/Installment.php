<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'loan_id', 'amount'];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function loan() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    public function scopeToday($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('created_at', now());
    }

    //make this week scope
    public function scopeThisWeek($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    //make this month scope
    public function scopeThisMonth($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    //make this year scope
    public function scopeThisYear($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()]);
    }

    //scope last month
    public function scopeLastMonth($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
    }

    //scope last week
    public function scopeLastWeek($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

}
