<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberInfo extends Model
{ 
    
    protected $fillable = ['baby_image'];

    public static function getBabyinfo(){
     $babyinfo = DB::table('member_infos')->select("baby_id","hospital_name","mother_name","mother_contact","father_name","father_contact","email","datetimepicker","twins","baby_no","baby_weight","gender","address","baby_image")->orderBy('id', 'asc')->get()->toArray();
     return $babyinfo;
    }
}
