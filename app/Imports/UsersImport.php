<?php

// app/Imports/UsersImport.php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;

class UsersImport implements ToArray
{
    public function array(array $array)
    {
        return $array;
    }
}
