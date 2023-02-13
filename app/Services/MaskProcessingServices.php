<?php

namespace App\Services;

class MaskProcessingServices
{
    protected $conformity = [
        'N' => "[0-9]",
        'A' => "[A-Z]",
        'a' => "[a-z]",
        'X' => "[0-9A-Z]",
        'Z' => "[-_@]",
    ];

    /**
     * @param  string  $str
     * @return string
     */
    public function toFormatMask(string $str): string
    {
        $mask = '';

        foreach (str_split($str) as $item){
            foreach ($this->conformity as $key => $value){
                if (preg_match("^" . $value . "^", $item)){
                    $mask .= $key;
                    break;
                }
            }
        }

        return $mask;
    }

    /**
     * @param  string  $mask
     * @param  string  $str
     * @return bool
     */
    public function checkMask(string $mask, string $str): bool
    {
        $mask = str_split($mask);

        $str = str_split($str);

        if (count($mask) !== count($str)){
            return false;
        }

        foreach ($str as $key=> $value){
            if (!array_key_exists($mask[$key], $this->conformity)){
                return false;
            }

            if (!preg_match("^" . $this->conformity[$mask[$key]] . "^", $value)){
                return false;
            }
        }

        return true;
    }

}
