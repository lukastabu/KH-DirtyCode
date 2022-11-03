<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This class is example of dirty code
 */
class User extends Model
{

    private $p;

    public function getAddressString() {
        $address  = [
            $this->p->city,
            $this->p->street,
            $this->p->house,
            $this->p->apartment,
        ];

        return implode(" ", $address);
    }

    public function getFullName() {
        return $this->p->second_name . ' ' . $this->p->first_name;
    }



}