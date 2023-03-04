<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Ramsey\Uuid\Uuid;
use Session;
use Kreait\Firebase\Database;

class DashboardController extends Controller
{
    /**
     * @var Database
     */
    protected $database;

    protected $auth;

    public function __construct(FirebaseAuth $auth, Database $database)
    {
        $this->middleware('auth');
        $this->database = $database;
        $this->auth = $auth;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);

            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }

            return view('backend.layouts.dashboard', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showMatches()
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);

            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matchesList = [];
            $trainingsList = [];
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }
            return view('backend.layouts.create-event-matches', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function summonPlayers(Request $request,$id)
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            if($request->has('scored')){
                $userRef = $this->database->getReference('matches/' . $id);

                $userRef->update([
                    'scored' => $request->input('scored'),
                    'conceded' => $request->input('concede'),
                    'red_cards' => $request->input('red'),
                    'yellow_cards' => $request->input('yellow'),
                    'fouls' => $request->input('fouls'),
                    'shots' => $request->input('shots'),
                    'shots_on_target' => $request->input('shots_on'),
                    'possession' => $request->input('possession'),
                    'passes' => $request->input('passes'),                ]);
            }
            else{

                $checkedDays = $request->input('players', []);

                // Output the checked days
                $listDays = [];
                foreach ($checkedDays as $day) {

                    $convocatedPlayers= $this->database->getReference("users/$day")->getValue();

                    $this->database->getReference("matches/$id/summon")->set($convocatedPlayers);

                }
            }
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }
            return view("backend.layouts.calendar", compact('user2','trainingsList','matchesList'));

        } catch (\Exception $e) {
            return $e;
        }

    }

    public function createMatches(Request $request)
    {

        // FirebaseAuth.getInstance().getCurrentUser();
        $dateTime = new DateTime($request->input('app_time'));
        $hour = $dateTime->format('H');
        $minute = $dateTime->format('i');
        $htmlDate = '2023-02-26'; // example HTML date input value
        $javaDateFormat = 'Y-m-d'; // Java date format to convert to
        $date = DateTime::createFromFormat($javaDateFormat, $htmlDate);

        $javaDate = $date->format('U'); // convert to Java timestamp format

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);

            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $users = $this->database->getReference("users")->getValue();

            $validate = Validator::make($request->all(), [
                'opponent' => 'required|min:5',
                'ch_day' => 'required',
                'begin_date' => 'required',
                'end_date' => 'required',
                'app_time' => 'required',
                'location' => 'required|min:5',
            ],
                [
                    'opponent.required' => 'Oppponent is must.',
                    'opponent.min' => 'Oppponent more than 5 characters',
                    'location.min' => 'location more than 5 characters',
                    'ch_day.required' => 'Day is must.',
                    'begin_date.required' => 'Date is must.',
                    'end_date.required' => 'Date is must.',
                    'app_time.required' => 'Time is must.',
                    'location.required' => 'Location is must.',
                ]);
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $uuid = Uuid::uuid4();
            $postdata = [
                'opponent' => $request->input('opponent'),
                'championship_day' => $request->input('ch_day'),
                'end_date' => Carbon::parse($request->input('end_date'))->toArray(),
                'appointment_time_hour' => $hour,
                'appointment_time_minute' => $minute,
                'begin_date' => Carbon::parse($request->input('begin_date'))->toArray(),
                'match_place' => $request->input('location'),
                'match_side' => $request->input('match_side'),
                'teamId' => $user2['teamId'],
                'team_name' => $user2['team_name'],
                'users' => $users,

                'uuid' => $uuid,
            ];
            $postref = $this->database->getReference("matches/$uuid")->set($postdata);

            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }

            return view('backend.layouts.create-event-matches', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showTraining()
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);

            $user2 = $this->database->getReference("users/$user->uid")->getValue();

            $matchesList = [];
            $trainingsList = [];
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }

            return view('backend.layouts.create-event-training', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showDetailMatch($id)
    {
        // FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);

            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }


            $match = $this->database->getReference("matches/$id")->getValue();

            return view('backend.layouts.match-detail', compact('user2'), compact('trainingsList', 'matchesList', 'match'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showDetailTraining($id)
    {
        try {

            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $user2 = $this->database->getReference("users/$user->uid")->getValue();

            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }

            $training = $this->database->getReference("trainings/$id")->getValue();


            return view('backend.layouts.training-detail', compact('user2'), compact('trainingsList', 'matchesList', 'training'));
        } catch (\Exception $e) {
            return $e;
        }
        dd($id);

    }

    public function createTraining(Request $request)
    {
        $uuid = Uuid::uuid4();
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);

        $user2 = $this->database->getReference("users/$user->uid")->getValue();
        $usersRef = $this->database->getReference('users');
        $snapshot = $usersRef->getSnapshot();
        $users = [];
        $currentuid = $user2['uuid'];
        foreach ($snapshot->getValue() as $userId => $userData) {
            if ($userData['uuid'] !== $currentuid) {
                $users[$userId] = $userData;
            }
        }
        $checkedDays = $request->input('days', []);

        // Output the checked days
        $listDays = [];
        foreach ($checkedDays as $day) {
            array_push($listDays, $day);
        }

        if ($request->has('horns')) {

            $dateTime = new DateTime($request->input('recc_begin_time'));
            $beginhour = $dateTime->format('H');
            $beginminute = $dateTime->format('i');
            $dateTime2 = new DateTime($request->input('recc_end_time'));
            $endhour = $dateTime2->format('H');
            $endminute = $dateTime2->format('i');

            try {

                $validate = Validator::make($request->all(), [
                    'training_name' => 'required|min:5',
                    'training_description' => 'required',
                    'recc_begin_time' => 'required',
                    'recc_end_time' => 'required',
                    'location' => 'required|min:5',
                ],
                    [
                        'training_name.required' => 'Name is must.',
                        'training_name.min' => 'Name more than 5 characters',
                        'location.min' => 'location more than 5 characters',
                        'training_description.required' => 'Description is a must.',
                        'recc_begin_time.required' => 'Begin time is a must.',
                        'recc_end_time.required' => 'End time is a must.',
                        'location.required' => 'Location is a must.',
                    ]);
                if ($validate->fails()) {
                    return back()->withErrors($validate->errors())->withInput();
                }


                $postdata = [
                    'training_name' => $request->input('training_name'),
                    'training_description' => $request->input('training_description'),
                    'recurr_time_begin_hour' => $beginhour,
                    'recurr_time_begin_minute' => $beginminute,
                    'recurr_time_end_hour' => $endhour,
                    'recurr_time_end_minute' => $endminute,
                    'listOfDays' => $listDays,
                    'match_place' => $request->input('location'),
                    'teamId' => $user2['teamId'],
                    'pending' => $users,
                    'uuid' => $uuid,
                ];
                $now = Carbon::now();
                $endOfYear = Carbon::now()->endOfYear();
// Loop through each week until the end of the year
                while ($now->lte($endOfYear)) {
                    $dayOfWeek = $now->formatLocalized('%A');
                    $dayOfWeekInt = $now->dayOfWeek;
                    $postdata = [
                        'training_name' => $request->input('training_name'),
                        'training_description' => $request->input('training_description'),
                        'recurr_time_begin_hour' => $beginhour,
                        'begin_date' => Carbon::now()->toArray(),
                        'recurr_time_begin_minute' => $beginminute,
                        'recurr_time_end_hour' => $endhour,
                        'recurr_time_end_minute' => $endminute,
                        'listOfDays' => $listDays,
                        'match_place' => $request->input('location'),
                        'teamId' => $user2['teamId'],
                        'pending' => $users,
                        'uuid' => $uuid,
                    ];

                    if (in_array($dayOfWeekInt, $listDays)) {
                        $this->database->getReference("trainings/$uuid")->set($postdata);
                    }

                    $now->addDay();
                }
                $uid = Session::get('uid');
                $user = app('firebase.auth')->getUser($uid);
                $matchesList = [];
                $trainingsList = [];
                $user2 = $this->database->getReference("users/$user->uid")->getValue();
                $matches = $this->database->getReference("matches")->getValue();
                $trainings = $this->database->getReference("trainings")->getValue();
                if (!is_null($matches)) {
                    foreach ($matches as $value) {
                        if ($value["teamId"] == $user2["teamId"]) {
                            array_push($matchesList, $value);
                        };
                    }
                }
                if (!is_null($trainings)) {
                    foreach ($trainings as $value) {
                        if ($value["teamId"] == $user2["teamId"]) {
                            array_push($trainingsList, $value);
                        };
                    }
                }


                return view('backend.layouts.create-event-training', compact('user2'), compact('trainingsList', 'matchesList'));
            } catch (\Exception $e) {
                return $e;
            }
        } else {

            $dateTime = new DateTime($request->input('app_time'));
            $hour = $dateTime->format('H');
            $minute = $dateTime->format('i');

            try {

                $validate = Validator::make($request->all(), [
                    'training_name' => 'required|min:5',
                    'training_description' => 'required',
                    'begin_date' => 'required',
                    'end_date' => 'required',
                    'app_time' => 'required',
                    'location' => 'required|min:5',
                ],
                    [
                        'training_name.required' => 'Name is must.',
                        'training_name.min' => 'Name more than 5 characters',
                        'location.min' => 'location more than 5 characters',
                        'training_description.required' => 'Description is a must.',
                        'begin_date.required' => 'Date is a must.',
                        'end_date.required' => 'Date is a must.',
                        'app_time.required' => 'Time is a must.',
                        'location.required' => 'Location is a must.',
                    ]);
                if ($validate->fails()) {
                    return back()->withErrors($validate->errors())->withInput();
                }


                $postdata = [
                    'training_name' => $request->input('training_name'),
                    'training_description' => $request->input('training_description'),
                    'end_date' => Carbon::parse($request->input('end_date'))->toArray(),
                    'appointment_time_hour' => $hour,
                    'appointment_time_minute' => $minute,
                    'begin_date' => Carbon::parse($request->input('begin_date'))->toArray(),
                    'match_place' => $request->input('location'),
                    'teamId' => $user2['teamId'],
                    'pending' => $users,
                    'uuid' => $uuid,
                ];
                $postref = $this->database->getReference("trainings/$uuid")->set($postdata);
                $uid = Session::get('uid');
                $user = app('firebase.auth')->getUser($uid);
                $matchesList = [];
                $trainingsList = [];
                $user2 = $this->database->getReference("users/$user->uid")->getValue();
                $matches = $this->database->getReference("matches")->getValue();
                $trainings = $this->database->getReference("trainings")->getValue();
                if (!is_null($matches)) {
                    foreach ($matches as $value) {
                        if ($value["teamId"] == $user2["teamId"]) {
                            array_push($matchesList, $value);
                        };
                    }
                }
                if (!is_null($trainings)) {
                    foreach ($trainings as $value) {
                        if ($value["teamId"] == $user2["teamId"]) {
                            array_push($trainingsList, $value);
                        };
                    }
                }

                return view('backend.layouts.create-event-training', compact('user2'));
            } catch (\Exception $e) {
                return $e;
            }
        }
        // FirebaseAuth.getInstance().getCurrentUser();


    }

    public function calendar()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }


            return view('backend.layouts.calendar', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showPlayers()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }
            $usersRef = $this->database->getReference('users');
            $snapshot = $usersRef->getSnapshot();
            $currentuid = $user2['uuid'];
            foreach ($snapshot->getValue() as $userId => $userData) {
                if ($userData['uuid'] !== $currentuid) {
                    $users[$userId] = $userData;
                }
            }

            return view('backend.layouts.player-stats', compact('user2'), compact('trainingsList', 'matchesList','users'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function showPlayersDetail($id)
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $userSelected = $this->database->getReference("users/$id")->getValue();

            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }
            $months=['jan','feb','mar'];
            $revenues=['1','2'];

            return view('backend.layouts.player-detail', compact('user2'), compact('revenues','months','trainingsList', 'matchesList','userSelected'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function chat()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }


            return view('backend.layouts.chat', compact('user2'), compact('trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function teamStats()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();

            $usersRef = $this->database->getReference('users');
            $snapshot = $usersRef->getSnapshot();
            $users = [];
            $currentuid = $user2['uuid'];
            foreach ($snapshot->getValue() as $userId => $userData) {
                if ($userData['uuid'] !== $currentuid) {
                    $users[$userId] = $userData;
                }
            }
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }


            return view('backend.layouts.team-stats', compact('user2'), compact('users','trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function presence()
    {
        // FirebaseAuth.getInstance().getCurrentUser();

        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            $matchesList = [];
            $trainingsList = [];
            $user2 = $this->database->getReference("users/$user->uid")->getValue();

            $usersRef = $this->database->getReference('users');
            $snapshot = $usersRef->getSnapshot();
            $users = [];
            $currentuid = $user2['uuid'];
            foreach ($snapshot->getValue() as $userId => $userData) {
                if ($userData['uuid'] !== $currentuid) {
                    $users[$userId] = $userData;
                }
            }
            $user2 = $this->database->getReference("users/$user->uid")->getValue();
            $matches = $this->database->getReference("matches")->getValue();
            $trainings = $this->database->getReference("trainings")->getValue();
            if (!is_null($matches)) {
                foreach ($matches as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($matchesList, $value);
                    };
                }
            }
            if (!is_null($trainings)) {
                foreach ($trainings as $value) {
                    if ($value["teamId"] == $user2["teamId"]) {
                        array_push($trainingsList, $value);
                    };
                }
            }


            return view('backend.layouts.presence', compact('user2'), compact('users','trainingsList', 'matchesList'));
        } catch (\Exception $e) {
            return $e;
        }

    }


}
