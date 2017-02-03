<?php namespace Modules\User\Entities;

use Cartalyst\Sentinel\Users\EloquentUser as EloquentUser;
use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Auth\Authenticatable;


class User extends EloquentUser {
	use Authenticatable, CanResetPassword;

    protected $table = 'users';
    /**
     * The Step moddule name
     * @var string
     */
    protected static $stepModel = 'Modules\Tasks\Entities\Step';
    protected static $taskModel = 'Modules\Tasks\Entities\Task';
    protected static $alertModel = 'Modules\Tasks\Entities\Alert';
    protected static $agreement = 'Modules\Agreements\Entities\Agreement';
    protected static $notificationModel = 'Modules\Notifications\Entities\Notification';

    protected static $placeModel = 'Modules\Contabilidad\Entities\Place';

    protected $fillable = [
		'email',
        'username',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'position',
		'image',
		'plaza_matriz_id',
		'fecha_nacimiento',
		'telefono',
		'extension',
		'fecha_ingreso',
		'jefe_directo'
    ];
    /**
     * Get User Full Name
     * @return string
     */
    public function getFullNameAttribute(){
        return sprintf(
            '%s %s',
            $this->attributes['first_name'],
            $this->attributes['last_name']
        );
    }


    /**
     * Many users can have many tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks(){
        return $this->belongsToMany(static::$taskModel);
    }

    public function alerts(){
        return $this->belongsToMany(static::$alertModel);
    }

    /**
     * The note relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notes(){
        return $this->belongsToMany('Modules\Tasks\Entities\Note');

    }

    public function steps(){
        return $this->belongsToMany(static::$stepModel);
    }

    /**
     * Many users can have many notifications
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notifications(){
        return $this->belongsToMany(static::$notificationModel);
    }
    /**
     * Many users can have many agreements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agreements(){
        return $this->belongsToMany(static::$agreement);
    }

    /**
     * Many users can have many plazas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plazas(){
        return $this->belongsToMany(static::$placeModel, 'contabilidad_place_user', 'user_id', 'tb_plazas_clave');
    }

    /**
     * One user can have one matriz place
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plazaMatriz(){
        return Place::find($this->plaza_matriz_id);
    }





}