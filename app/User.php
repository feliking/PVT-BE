<?php

namespace Muserpol;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function economic_complements()
    {
        return $this->hasMany(Models\EconomicComplement::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Models\Role::class);
    }
    public function city()
    {
        return $this->belongsTo(Models\City::class);
    }
    public function wf_records()
    {
        return $this->hasMany(Models\WorkflowRecord::class);
    }

    public function scopeIdIs($query, $id)
    {
        return $query->where('id', $id);
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAllRolesToString(){

       $roles_list=[];
       foreach ($this->roles as $role) {
           $roles_list[]=$role->name;
       }
       return implode(",",$roles_list);

    }

    public function getModule(){
        return $this->roles()->first()->module;
    }

    public function retirement_funds()
    {
        return $this->hasMany('Muserpol\Models\RetirementFund\RetirementFund');
    }

}