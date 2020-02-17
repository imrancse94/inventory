<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    protected $fillable = [
        "id", "name","cname","cemail","address1","address2","city","state","country","postcode","phone","logo",
        "timezone","registration_no","tax_no","no_of_employees","cmmi_level","yearly_revenue","hourly_rate","daily_rate","fax"
    ];

    public static function add_company($data){



        $company = new Company();
        $company->name = (!empty($data["name"]))?$data["name"]:'';
        $company->cname = (!empty($data["cname"]))?$data["cname"]:'';
        $company->cemail = (!empty($data["cemail"]))?$data["cemail"]:'';
        $company->address1 = (!empty($data["address1"]))?$data["address1"]:'';
        $company->address2 = (!empty($data["address2"]))?$data["address2"]:'';
        $company->postcode = (!empty($data["postcode"]))?$data["postcode"]:'';
        $company->phone = (!empty($data["phone"]))?$data["phone"]:'';
        $company->email = (!empty($data["email"]))?$data["email"]:'';
        $company->fax = (!empty($data["fax"]))?$data["cname"]:'';
        $company->city = (!empty($data["city"]))?$data["city"]:'';
        $company->state = (!empty($data["state"]))?$data["state"]:'';
        $company->country = (!empty($data["country"]))?$data["country"]:'';
        $company->logo = (!empty($data["logo"]))?$data["logo"]:'';
        $company->registration_no = (!empty($data["registration_no"]))?$data["registration_no"]:'';
        $company->timezone = (!empty($data["timezone"]))?$data["timezone"]:0;
        $company->timezone_value = (!empty($data["timezone_value"]))?$data["timezone_value"]:'';
        $company->tax_no = (!empty($data["tax_no"]))?$data["tax_no"]:'';
        $company->no_of_employees = (!empty($data["no_of_employees"]))?$data["no_of_employees"]:0;
        $company->cmmi_level = (!empty($data["cmmi_level"]))?$data["cmmi_level"]:0;
        $company->yearly_revenue = (!empty($data["yearly_revenue"]))?$data["yearly_revenue"]:0;
        $company->hourly_rate = (!empty($data["hourly_rate"]))?$data["hourly_rate"]:0;
        $company->daily_rate = (!empty($data["daily_rate"]))?$data["daily_rate"]:0;
        $company->status = (!empty($data["status"]))?$data["status"]:1;
        $company->added_by = Auth::id();
        $company->save();
        return $company;
    }

    public static function update_entry($data,$id){
        $company = Company::find($id);
        $company->name = (!empty($data["name"]))?$data["name"]:'';
        $company->cname = (!empty($data["cname"]))?$data["cname"]: $company->cname;
        $company->cemail = (!empty($data["cemail"]))?$data["cemail"]:$company->cemail;
        $company->address1 = (!empty($data["address1"]))?$data["address1"]:$company->address1;
        $company->address2 = (!empty($data["address2"]))?$data["address2"]:$company->address2;
        $company->postcode = (!empty($data["postcode"]))?$data["postcode"]:$company->postcode;
        $company->phone = (!empty($data["phone"]))?$data["phone"]:$company->phone;
        $company->email = (!empty($data["email"]))?$data["email"]:$company->email;
        $company->fax = (!empty($data["fax"]))?$data["cname"]:$company->fax;
        $company->city = (!empty($data["city"]))?$data["city"]:$company->city;
        $company->state = (!empty($data["state"]))?$data["state"]:$company->state;
        $company->country = (!empty($data["country"]))?$data["country"]:$company->country;
        $company->logo = (!empty($data["logo"]))?$data["logo"]:$company->logo;
        $company->registration_no = (!empty($data["registration_no"]))?$data["registration_no"]:$company->registration_no;
        $company->timezone = (!empty($data["timezone"]))?$data["timezone"]:$company->timezone;
        $company->timezone_value = (!empty($data["timezone_value"]))?$data["timezone_value"]:$company->timezone_value;
        $company->tax_no = (!empty($data["tax_no"]))?$data["tax_no"]:$company->tax_no;
        $company->no_of_employees = (!empty($data["no_of_employees"]))?$data["no_of_employees"]:$company->no_of_employees;
        $company->cmmi_level = (!empty($data["cmmi_level"]))?$data["cmmi_level"]:$company->cmmi_level;
        $company->yearly_revenue = (!empty($data["yearly_revenue"]))?$data["yearly_revenue"]:$company->yearly_revenue;
        $company->hourly_rate = (!empty($data["hourly_rate"]))?$data["hourly_rate"]:$company->hourly_rate;
        $company->daily_rate = (!empty($data["daily_rate"]))?$data["daily_rate"]:$company->daily_rate;
        $company->status = (!empty($data["status"]))?$data["status"]:$company->status;
        $company->added_by = Auth::id();
        $company->save();
        return $company;

    }

}
