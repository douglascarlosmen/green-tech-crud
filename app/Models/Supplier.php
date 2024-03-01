<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'zipcode',
        'street',
        'address_number',
        'address_comp',
        'district',
        'city',
        'state'
    ];

    function getContactInfoForIndex()
    {
        return $this->phone . ' | ' . $this->email;
    }

    function getFormattedAddressForIndex()
    {
        return $this->street . ' n°' . $this->address_number . ' ' . $this->address_comp . ', ' .
            $this->district . ' - ' . $this->city . ' - ' . $this->state . ', ' . $this->zipcode;
    }
}
