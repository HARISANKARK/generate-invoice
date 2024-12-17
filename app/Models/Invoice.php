<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'iv_id';

    public function scopeFilter(Builder $query,array $filters) : Builder
    {
        $from = $filters['from'] ?? date('Y-m-d');
        $to = $filters['to'] ?? date('Y-m-d');

        return $query->when(
            $filters['customer_id'] ?? false,
            function ($query, $value) {
                return $query->where('invoices.customer_id','=', $value);
            }
        )->when(
            $from && $to,
            function ($query) use ($from, $to) {
                $query->whereBetween('invoices.date', [$from, $to]);
            }
        );
    }

}
