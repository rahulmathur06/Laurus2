<?php namespace Modules\Permissions\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ModuleMenu extends Model {

    protected $table = 'module_menus';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['module_id', 'nombre'];
    
    public $timestamps = false;


    public function permissions(){
        return $this->hasMany('Modules\Permissions\Entities\ModulePermission','menu_id');
    }
    
    public function module(){
        return $this->belongsTo('Modules\Permissions\Entities\Modules');
    }

}