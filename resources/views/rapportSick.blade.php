@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-size: 24px; color: #005584;">Udfyld din forspørgsel her</div>

                    <div class="card-body row">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{URL::to('/rapportSick')}}" method="post">
                            {{ csrf_field() }}
                            <div id="action">
                                <input class="chooseAction" type="radio" name="whatToDo" value="1" onclick="showToStudent()" required>Jeg skal aflyse én timer.
                                <br>
                                <input class="chooseAction" type="radio" name="whatToDo" value="2" onclick="showToTeacher()">Jeg skal finde en vikar.
                                <br>
                                <input class="chooseAction" type="radio" name="whatToDo" value="3" onclick="showToStudent()">Jeg skal aflyse alle mine timer.
                                <br>
                            </div>

                            <div class="row classTopic">
                                <div id="class" class="hide col-xs-12 col-sm-6">
                                    <select class="chooseClass" name="class" required>
                                        <option selected disabled value="">Vælg klasse</option>
                                        <option value="0">0. Klasse</option>
                                        <option value="1">1. Klasse</option>
                                        <option value="2">2. Klasse</option>
                                        <option value="3">3. Klasse</option>
                                        <option value="4">4. Klasse</option>
                                        <option value="5">5. Klasse</option>
                                        <option value="6">6. Klasse</option>
                                        <option value="7">7. Klasse</option>
                                        <option value="8">8. Klasse</option>
                                        <option value="9">9. Klasse</option>
                                    </select>
                                </div>
                                <div id="topic" class="hide col-xs-12 col-sm-6">
                                    <select class="chooseTopic" name="topic" required>
                                        <option selected disabled value="">Vælg fag</option>
                                        <option value="Dansk">Dansk</option>
                                        <option value="Engelsk">Engelsk</option>
                                        <option value="Tysk">Tysk</option>
                                        <option value="Matematik">Matematik</option>
                                        <option value="Biologi">Biologi</option>
                                        <option value="Geografi">Geografi</option>
                                        <option value="Fysik">Fysik</option>
                                        <option value="Kemi">Kemi</option>
                                        <option value="Historie">Historie</option>
                                        <option value="Religion">Religion</option>
                                    </select>
                                </div>
                            </div>
                            <div id="lecture" class="hide col-xs-12">
                                <textarea id="describeLecture" name="lecture" placeholder="Hvad skal der undervises i?"></textarea>
                            </div>
                            <div class="col-xs-12 submitButton">
                                <button type="submit" class="submitB">Send forspørgsel</button>
                            </div>
                            <div>
                                @if (!empty($posts))
                                    <h5 id="successMsg">Din efterspørgsel er nu sendt</h5>
                                @endif
                            </div>

                        </form>
                        <div>

                        </div>
                    </div>
                </div>
                <!---->
                @if (!empty($posts) && $choice === "1")
                    <br>
                    <div class="card">
                        <div class="card-header" style="font-size: 24px; color: #005584;"><h3>Dette er informationerne du har sendt afsted:</h3></div>
                        <div class="card-body">

                            Du har valgt: {{$action}} <br>
                            Du har valgt: {{$class}} <br>
                            Du har valgt faget: {{$topic}} <br>


                            @if(!empty($description)) Der skal undervises i: {{$description}} @endif <br>


                            <h5>Dette er id'erne på de personer du sender forspørgslen ud til:</h5>
                            @foreach ($posts as $post )
                                <?php $getId = $post->student_id; ?>
                                <li>{{$getId}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($posts) && $choice === "2")
                    <br>
                    <div class="card">
                        <div class="card-header" style="font-size: 24px; color: #005584;"><h3>Dette er informationerne du har sendt afsted:</h3></div>
                        <div class="card-body">

                            Du har valgt: {{$action}} <br>
                            Du har valgt: {{$class}} <br>
                            Du har valgt faget: {{$topic}} <br>


                            @if(!empty($description)) Der skal undervises i: {{$description}} @endif <br>


                            <h5>Dette er id'erne på de personer du sender forspørgslen ud til:</h5>
                            @foreach ($posts as $post )
                                <?php $getId = $post->teacher_id; ?>
                                <li>{{$getId}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($posts) && $choice === "3")
                    <br>
                    <div class="card">
                        <div class="card-header" style="font-size: 24px; color: #005584;"><h3>Dette er informationerne du har sendt afsted:</h3></div>
                        <div class="card-body">

                            Du har valgt: {{$action}} <br>
                            Du har valgt: {{$class}} <br>
                            Du har valgt faget: {{$topic}} <br>


                            @if(!empty($description)) Der skal undervises i: {{$description}} @endif <br>


                            <h5>Dette er id'erne på de personer du sender forspørgslen ud til:</h5>
                            @foreach ($posts as $post )
                                <?php $getId = $post->student_id; ?>
                                <li>{{$getId}}</li>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
