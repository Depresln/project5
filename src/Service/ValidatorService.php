<?php
namespace App\Service;

/**
 * Class ValidatorService
 * @package App\Service
 */
class ValidatorService
{
    /**
     * @param $param
     * @return mixed
     */
    public function bindParamValidate($param)
    {
        if (isset($param)) {
            if (is_int($param)) {
                return $param;
            } else {
                echo 'Paramètre incorrect';
            }
        } else {
            echo "Paramètre incorrect.";
        }
    }
}
