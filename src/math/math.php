<?php
/**
 *
 */

error_reporting(-1);
var_dump(0.1 + 0.2);        // float(0.3)
var_dump(0.3 - 0.3);
var_dump(0.1 + 0.2 - 0.3);

//$a = 0;
//try{
//    var_dump(1/$a);
//}catch (Throwable $e){
//
//}

class MathOperation
{
    protected $n = 10;

    // Try to get the Division by Zero error object and display as Exception
    public function doArithmeticOperation()
    {
        try {
            $value = $this->n % 0;
        } catch (DivisionByZeroError $e) {
            echo $e->getMessage();
        }
    }
}

$mathOperationObj = new MathOperation();
echo $mathOperationObj->doArithmeticOperation();