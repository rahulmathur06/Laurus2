<?php namespace Modules\Permissions\Entities;

use Illuminate\Database\Eloquent\Model;

class ModulePermission extends Model {

	//

    protected $table = 'modules_permissions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['module_id', 'display_name', 'menu_id', 'permission'];

    public $timestamps = false;
    
    public function module(){
        return $this->belongsTo('Modules\Permissions\Entities\Module');
    }
    
    public function menu(){
        return $this->belongsTo('Modules\Permissions\Entities\ModuleMenu');
    }

}
