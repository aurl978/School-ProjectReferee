<?php

class Numbers
{

    /**
     * @param array ...$numbers
     * @return int|mixed
     */
    public function Sum(...$numbers)
    {
        $acc = 0;
        foreach ($numbers as $n):
            $acc += $n;
        endforeach;
        return $acc;
    }

    /**
     * @param $number
     * @return bool
     */
    public function IsPrimary($number)
    {
        $bool = false;
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {
                $bool = true;
            }
        }
        return $bool == true ? true : false;
    }

}