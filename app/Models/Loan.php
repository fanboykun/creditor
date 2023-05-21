<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'customer_id', 'amount', 'interest', 'total', 'paid', 'remaining', 'status', 'start_date', 'end_date', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class)->withTrashed();
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }

    public function scopePaid($query)
    {
        return $query->where('paid', '>', 0);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('paid', 0);
    }

    public function scopeOverdue($query)
    {
        return $query->where('end_date', '<', now());
    }

    public function scopeNotOverdue($query)
    {
        return $query->where('end_date', '>=', now());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('end_date', now()->month);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('end_date', now()->year);
    }

    public function scopeThisWeek($query)
    {
        return $query->whereBetween('end_date', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeThisDay($query)
    {
        return $query->whereDate('end_date', now());
    }

    public function scopeOverdueBetween($query, $start, $end)
    {
        return $query->whereBetween('end_date', [$start, $end]);
    }

    public function scopeNotOverdueBetween($query, $start, $end)
    {
        return $query->whereBetween('start_date', [$start, $end]);
    }

    public function scopeOverdueBetweenThisMonth($query)
    {
        return $query->whereBetween('end_date', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeNotOverdueBetweenThisMonth($query)
    {
        return $query->whereBetween('start_date', [now()->startOfMonth(), now()->endOfMonth()]);
    }

    public function scopeNotOverdueBetweenThisYear($query)
    {
        return $query->whereBetween('start_date', [now()->startOfYear(), now()->endOfYear()]);
    }

    //scope last month
    public function scopeLastMonth($query)
    {
        return $query->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()]);
    }

    //scope last week
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()]);
    }

}
