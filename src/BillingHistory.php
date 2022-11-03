<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingHistory extends Model
{
    public function getBillingStatistics() {
        return BillingHistory::where('user_id', $this->id)
            ->groupBy('created_at')
            ->get();
    }

    public function getPaymentsStatistics() {
        return Payments::where('user_id', $this->id)
            ->groupBy('created_at')
            ->get();
    }

}