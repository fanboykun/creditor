<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    public $defaultInterest = 3;
    protected $fillable = ['user_id', 'customer_id', 'amount', 'interest', 'total', 'paid', 'remaining', 'status', 'start_date', 'end_date', 'note'];
    protected $casts = [
        'status' => 'boolean'
    ];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function installments() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Installment::class);
    }

    public function scopeActive($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('status', true);
    }

    public function scopeInactive($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('status', false);
    }

    public function scopePaid($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('paid', '>', 0);
    }

    public function scopeUnpaid($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('paid', 0);
    }

    public function scopeOverdue($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('end_date', '<', now());
    }

    public function scopeNotOverdue($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('end_date', '>=', now());
    }

    public function scopeThisMonth($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereMonth('end_date', now()->month);
    }

    public function scopeThisYear($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereYear('end_date', now()->year);
    }

    public function scopeThisWeek($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('end_date', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeThisDay($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereDate('end_date', now());
    }

    public function scopeOverdueBetween($query, $start, $end) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('end_date', [$start, $end]);
    }

    public function scopeNotOverdueBetween($query, $start, $end) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('start_date', [$start, $end]);
    }

    public function scopeOverdueBetweenThisMonth($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('end_date', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeNotOverdueBetweenThisMonth($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('start_date', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeNotOverdueBetweenThisYear($query) : \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereBetween('start_date', [now()->startOfYear(), now()->endOfYear()]);
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
