<?php

class Demo
{

    public function __construct()
    {
    }

    /**
     *
     * @param int $var1
     * @param int $var2
     *
     * @return int
     */
    public function add($var1, $var2)
    {
        return $var1 + $var2;
    }

    public function sub($var1, $var2)
    {
        return $var1 - $var2;
    }

    public function mul($var1, $var2)
    {
        return $var1 * $var2;
    }

    public function div($var1, $var2)
    {
        if ($var2 === 0) {
            throw new UnexpectedValueException('Divided by Zero');
        }
        return $var1 / $var2;
    }
}
