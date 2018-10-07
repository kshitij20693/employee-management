<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Utilities\FileUploads;

class Employee extends Model
{
    public function department()
  	{
      return $this->belongsTo(Department::class,'department_id');
  	}
  	public function updateemployee(Employee $employee,$input,$request)
  	{
  		$employee->name=$input['name'];
        $employee->email=$input['email'];
        $employee->phone=$input['phone'];
        $employee->salary=$input['salary'];
        $employee->status=$input['status'];
        $employee->department_id=$input['department_id'];
        $date=date_create($input['dob']);
        $format = date_format($date,"Y-m-d");
        $employee->dob = $format;
        $employee->created_at = strtotime($format);
        if(array_key_exists('photo',$input))
        {
            $name = $this->uploadImage($request);
            $employee->photo = $name;
        }
        $employee->save();
        return true;
  	}

  	

    public function uploadImage($input)
    {
        $file = $input['photo'];
        $name=time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
        return $name;
    }

    public function scopeYoung($query)
    {
      return $query->orderBy('dob', 'DESC');
    }
}
