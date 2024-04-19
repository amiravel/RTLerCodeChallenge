<?php

namespace App\Enums;

enum TransactionTypesEnums: int
{

    case web = 0;
    case mobile = 1;
    case pos = 2;


    public static function fromName(string $name): self
    {
        return match ($name){
            'web' => self::web,
            'pos' => self::pos,
            'mobile' => self::mobile,
        };
    }

}
