<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
	
	/**
	     * Display the form to request a password reset link.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function getEmail()
	    {
	        //return view('auth.password');
	        return view('user::auth.password');
	    }

	    /**
	     * Send a reset link to the given user.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function postEmail(Request $request)
	    {

	        $messages = [
	            'email.required' => 'El campo es requerido',
	            'email.email' => 'El formato de email es incorrecto',
	        ];
	        $this->validate($request, ['email' => 'required|email'], $messages);

	        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
	            $message->subject($this->getEmailSubject());
	        });

	        switch ($response) {
	            case Password::RESET_LINK_SENT:
	                return redirect()->back()->with('status', 'Hemos enviando un link a tu cuenta de correo electrónico para que puedas resetear el password');

	            case Password::INVALID_USER:
	                return redirect()->back()->withErrors(['email' => trans($response)]);
	        }
	    }

	    /**
	     * Get the e-mail subject line to be used for the reset link email.
	     *
	     * @return string
	     */
	    protected function getEmailSubject()
	    {
	        return property_exists($this, 'subject') ? $this->subject : 'Tu link para resetear el password';
	    }

	    /**
	     * Display the password reset view for the given token.
	     *
	     * @param  string  $token
	     * @return \Illuminate\Http\Response
	     */
	    public function getReset($token = null)
	    {
	        if (is_null($token)) {
	            throw new NotFoundHttpException;
	        }

	        return view('user::auth.reset')->with('token', $token);
	        //return view('auth.reset')->with('token', $token);
	    }

	    /**
	     * Reset the given user's password.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function postReset(Request $request)
	    {

	        $messages = [
	            'email.required' => 'El campo es requerido',
	            'email.email' => 'El formato de email es incorrecto',
	            'password.required' => 'El campo es requerido',
	            'password.confirmed' => 'Los passwords no coinciden',
	            'password.min' => 'El mínimo de caracteres permitidos son 6',
	            'password.max' => 'El máximo de caracteres permitidos son 18',
	        ];

	        $this->validate($request, [
	            'token' => 'required',
	            'email' => 'required|email',
	            'password' => 'required|confirmed|min:6|max:18',
	        ], $messages);

	        $credentials = $request->only(
	            'email', 'password', 'password_confirmation', 'token'
	        );

	        $response = Password::reset($credentials, function ($user, $password) {
	            $this->resetPassword($user, $password);
	        });

	        switch ($response) {
	            case Password::PASSWORD_RESET:
	                return redirect()->back()->with('status', 'Enhorabuena tu password ha sido reseteado con éxito, ahora ya puedes inciar sesion !!');

	                //return redirect($this->redirectPath())->with('status', 'Enhorabuena tu password ha sido reseteado con éxito');
	                //return view('user::auth.login')->with('status', 'Enhorabuena tu password ha sido reseteado con éxito');

	            default:
	                return redirect()->back()
	                    ->withInput($request->only('email'))
	                    ->withErrors(['email' => trans($response)]);
	        }
	    }

	    /**
	     * Reset the given user's password.
	     *
	     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
	     * @param  string  $password
	     * @return void
	     */
	    protected function resetPassword($user, $password)
	    {
	        $user->password = bcrypt($password);

	        $user->save();

	        //Route::get('login', 'AuthSentinelController@login');

	        //return view('user::auth.login');
	        //Auth::login($user);
	    }

	    /**
	     * Get the post register / login redirect path.
	     *
	     * @return string
	     */
	    public function redirectPath()
	    {
	        if (property_exists($this, 'redirectPath')) {
	            return $this->redirectPath;
	        }

	        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	    }

}
