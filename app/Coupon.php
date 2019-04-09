<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    public static function findByCode(string $code)
    {
        return self::where('code', $code)->firstOrFail();
    }

    public function discount(int $total)
    {
        if ($this->type === 'fixed') {
            return $this->value;
        } elseif ($this->type === 'percent') {
            return ($this->percent_off / 100) * $total;
        } else {
            return 0;
        }
    }
}
