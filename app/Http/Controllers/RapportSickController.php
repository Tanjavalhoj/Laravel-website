<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RapportSickController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('rapportSick');
    }

    public function show(Request $request) {

        //print_r($request->input('chooseWhatToDo'));



        if (!empty($posts)) {
            echo "hey";

            foreach ($posts as $post ) {
                $getId = $post->teacher_id;
                echo "Lærer id'erne er : ". $getId;
            }
        }


    }

    /*
     * Funtion to get substitute teacher
     * Substitute teacher = ST
     * */
    public function getST( Request $request) {
        $client = new Client();

        if (!empty($request)) {
            $action = $request->input('whatToDo');
            $class = $request->input('class');
            $topic = $request->input('topic');
            $lecture = $request->input('lecture');

            if ($action === "1") {
                $result = $client->get('http://localhost:8080/bachelor-api/bachelor-api/crud/student/searchStudent.php?class='. $class);
                $posts = json_decode($result->getBody()->getContents());

                $newAction = "Aflysning";
                $selectedClass = $class . '. Klasse';
                $selectedTopic = $topic;

                return view('rapportSick', ['posts'=>$posts->records,'choice'=>$action,'action'=>$newAction,'class'=>$selectedClass,'topic'=>$selectedTopic]);


            } elseif ($action === "2") {
                $result = $client->get('http://localhost:8080/bachelor-api/bachelor-api/crud/teacher/searchTeachers.php?topic=Vikar');
                $posts = json_decode($result->getBody()->getContents());

                $newAction = "Vikar søges";
                $selectedClass = $class . '. Klasse';
                $selectedTopic = $topic;
                $description = $lecture;

                return view('rapportSick', ['posts'=>$posts->records,'choice'=>$action,'action'=>$newAction,'class'=>$selectedClass,'topic'=>$selectedTopic,'description'=>$description]);


            } elseif ($action === "3") {
                $result = $client->get('http://localhost:8080/bachelor-api/bachelor-api/crud/student/searchStudent.php?class='. $class);
                $posts = json_decode($result->getBody()->getContents());

                $newAction = "Aflysning";
                $selectedClass = $class . '. Klasse';
                $selectedTopic = $topic;

                return view('rapportSick', ['posts'=>$posts->records,'choice'=>$action,'action'=>$newAction,'class'=>$selectedClass,'topic'=>$selectedTopic]);

            }


        }

    }
    /*
     * Function to get a specific class
     * Specific class = SC
     * */
    public function getSC() {

    }

}
