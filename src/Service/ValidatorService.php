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
            $pattern = '/^(?:[0-9]|0[0-9]|10)$/';
            $checkParam = preg_match($pattern, $param, $matches);
            if($checkParam == TRUE){
                return $param;
            } else {
                echo "Paramètre incorrect.";
            }
        } else {
            echo "Paramètre incorrect.";
        }
    }

    public function commentIdValidate($id)
    {
        if (isset($id)){
            return $id;
        } else {
            echo "Pas de commentaire trouvé.";
        }
    }

    public function paramIssetNotEmpty($param)
    {
        if (isset($param)){
            if (!empty($param)){
                return true;
            }
        }
        return false;
    }
}
