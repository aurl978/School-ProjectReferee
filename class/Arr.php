<?php

class Arr
{

    /**
     * @param array $var
     */
    public function readArray($var = [])
    {
        if (isset($var) and !empty($var)) {
            echo "<pre><code>";
            print_r($var);
            echo "</pre></code>";
        }
    }

    public function isInArr($needle, $hstack)
    {
        $needle = is_array($needle) ? $needle : [$needle];
        foreach ($needle as $n):
            return in_array($needle, $hstack) ? true : false;
        endforeach;
        return false;
    }

    public function orderAsc($tab = [])
    {
        $len = count($tab);
        for ($i = 1; $i < $len; $i++) {
            for ($j = $len - 1; $j >= $i; $j--) {
                if ($tab[$j + 1] > $tab[$j]) {
                    $temp = $tab[$j + 1];
                    $tab[$j + 1] = $tab[$j];
                    $tab[$j] = $temp;
                }
            }
        }
        return $tab;
    }

}
