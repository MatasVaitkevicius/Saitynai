<?php

namespace App\TestMaterial;

use http\Exception\InvalidArgumentException;


class Math {
    public function fibonacci($n) {
        if (is_int($n) && $n >= 0) {
            return round(pow((sqrt(5) + 1) / 2, $n) / sqrt(5));
        } else {
            throw new
            InvalidArgumentException('You should pass non-negative integer');
        }
    }

    public function factorial($n) {
        if (is_int($n) && $n >= 0) {
            $factorial = 1;
            for ($i = 2; $i <= $n; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        } else {
            throw new
            InvalidArgumentException('You should pass non-negative integer');
        }
    }
}
