<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $student;

    public function newStudent()
    {

    }

    public static function getAllStudent()
    {
        return[
            0=>[
                'id'    =>1,
                'name'  =>'Shabuddin',
                'email' =>'shabuddin@gmail.com',
                'mobile'=>'01915465855',
                'image' =>'',
            ],
            1=>[
                'id'    =>2,
                'name'  =>'Jehid',
                'email' =>'jehid@gmail.com',
                'mobile'=>'01815465855',
                'image' =>'',
            ],
        ];
    }
}
