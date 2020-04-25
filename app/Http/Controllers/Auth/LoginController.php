<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\API\HelperFunctionsController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)

    {

        $input = $request->all();


        $this->validate($request, [

            'iug_id' => 'required',
            'password' => 'required',

        ]);
        $remember_me = $request->has('remember');


        $fieldType = filter_var($request->input('iug_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'iug_id';

        if (auth()->attempt([$fieldType => $input['iug_id'], 'password' => $input['password']] , $remember_me)) {

            return redirect()->route('home');

        } else {

            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');

        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|void
     */
    public function redirectToProvider($provider)
    {
        if ($provider == 'facebook' || $provider == 'google')
        {
            return Socialite::driver($provider)->redirect();
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\RedirectResponse|void
     */
    public function handleProviderCallback($provider)
    {
        try
        {
            $user_social = Socialite::driver($provider)->user();

            $findUser = User::where('email' , '=' , $user_social->getEmail())->first();

            if ($findUser)
            {
                Auth::login($findUser);
                return redirect()->route('home');
            }
            else {
                $user = new User();
                $user->name            = $user_social->getName();
                $user->social_platform = $provider;
                $user->social_id       = $user_social->getId();
                $user->email           = $user_social->getEmail();
                $user->password        = '';
                $user->save();

                Auth::login($user);
                return redirect()->route('confirm_student_data.index');
            }
        }
        catch (\Exception $exception)
        {
            return $this->redirectToProvider($provider);
        }
    }
}
