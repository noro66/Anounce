<?php
namespace App\Services;

use Carbon\Carbon;

class TimeCalcService
{
    public function comparate($createdAt)
    {
        return Carbon::now()->diffInHours($createdAt);
    }
}
