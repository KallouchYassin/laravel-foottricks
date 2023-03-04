<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Database;
use Kreait\Firebase\Exception\FirebaseException;

use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $auth;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var Database
     */
    protected $database;

    public function __construct(FirebaseAuth $auth, Database $database)
    {
        $this->middleware('guest');
        $this->database = $database;
        $this->auth = $auth;

    }


    public function showRegistrationForm()
    {
        $leagues = $this->database->getReference('leagues')->getValue();

        return view('auth.register', compact('leagues'));
    }

    function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'teamname' => ['required', 'string', 'max:255'],
            'league' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
        ]);
    }


    protected function register(Request $request)
    {

        try {
            $uuid = Str::random(8);
            $this->validator($request->all())->validate();
            $first = $request->input('firstname');
           $last = $request->input('lastname');
            $userProperties = [
                'email' => $request->input('email'),
                'emailVerified' => false,
                'password' => $request->input('password'),
                'displayName' => $first . ' ' . $last,
                'disabled' => false,
            ];
            $createdUser = $this->auth->createUser($userProperties);
            $user = $this->auth->getUserByEmail($request->input('email'));
            $postdata = [
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'team_name' => $request->input('teamname'),
                'teamId' => $uuid,
                'imageUri' => "https://firebasestorage.googleapis.com/v0/b/foottricks-5a2f5.appspot.com/o/profile.png?alt=media&token=51f4ddbd-c439-4f10-b754-551d6b6b10ab",
                'role' => "coach",
                'uuid' => $user->uid,
            ];
            $postdata2 = [
                'team_name' => $request->input('teamname'),
                'league' => $request->input('league'),
                'uuid' => $uuid,
                'team_coach' => $user['email'],
                'team_imageUri' => '0',
                'team_goals' => '0',
                'team_points' => '0',
                'team_match_played' => '0',
                'team_draws' => '0',
                'team_wins' => '0',
                'team_losses' => '0',
                'team_goals_against' => '0',
                'team_goals_for' => '0',
                'team_goals_differential' => '0',

            ];

            $postref2 = $this->database->getReference("teams/$uuid")->set($postdata2);

            $postref = $this->database->getReference("users/$user->uid")->set($postdata);

         return redirect()->route('login');
       } catch (FirebaseException $e) {
            Session::flash('error', $e->getMessage());
            return back()->withInput();
        }
    }
}
