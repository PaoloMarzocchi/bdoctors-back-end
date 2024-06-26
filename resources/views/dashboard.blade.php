@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="fs-2 my_primary my-4 d-flex align-items-center justify-content-center">
            <p class="bg-secondary rounded px-2 py-1 text-center shadow">
                {{ __('Dashboard') }}
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card p-3 border-0">
                    <div class="card-header rounded-5 text-center my_primary">
                        DoctyAI &copy;
                    </div>
                    {{--
                    ################################################
                    ########### FAKE AI AREA BIGGER !! #############
                    ################################################ 
                    --}}
                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row flex-column chat mt-3 px-4 gy-3">

                            <div class="messageReceived p-2">
                                Welcome BDoctor! I'm your AI, Docty.
                            </div>
                            <div class="messageReceived p-2">
                                Type something like "statistics" and I will try to help!😊
                            </div>

                            {{--
                            ################################################
                            REMEMBER TO PUT HERE THE NAME OF CURRENT USER !!
                            ################################################ 
                            --}}
                            {{--               <div class="col-8 align-self-start">
                <textarea rows="2" disabled placeholder="Try to ask me, '-statistics'.." class="form-control" name=""
                  id="">{{ __("Welcome BDoctor ! I'm your AI, Docty.") }}
                                </textarea>
              </div>
              <br>
              <div class="col-8 align-self-end">
                <textarea rows="1" class="form-control text-end" name="" id=""
                  placeholder="Try to ask '-statistics'.."></textarea>
              </div> --}}
                            {{-- <div class="chat_main dflex">
                                <div class="current_chat">
                                    @foreach (currentChat . messages as singleMessage)
                                        <div class="dflex spacing"
                                            :class="singleMessage.status === 'sent' ? 'mine_message' : 'enemy_message'">
                                            <div class="text">
                                                <p>
                                                    {{ singleMessage . message }}
                                                </p>
                                            </div>
                                            <div class="text_info dflex">
                                                <div class="check">

                                                    <ul class="secret_option">
                                                        <li>
                                                            <a href="#">
                                                                Cancella messaggio
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                Rimuovi dalla tua vita
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                "Fai come ti pare" cit.
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.check -->
                                                <div class="msg_hours">
                                                    {{ singleMessage . date }}
                                                </div>
                                                <!-- /.msg_hours -->
                                            </div>
                                    @endforeach
                                </div>
                            </div> 
                        </div> --}}
                        </div>

                        <div class="input_message rounded p-2 mt-3 d-flex">
                            <a href="#"><i class="hide_sm fa-regular fa-xl fa-face-smile"></i></a>
                            <input type="text" placeholder="Scrivi un messaggio" v-model.trim="newMessage.message"
                                @keydown.enter="addMessage(activeContact)" @keyup.enter="replyMessage(activeContact)">
                            <a href="#"><i class="hide_sm fa-solid fa-xl fa-microphone"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="row">
                    {{--
                    ################################################
                    REMEMBER TO CHANGE THOSE BUTTONS INTO SQUARES !!
                    ################################################ 
                    --}}

                    <div class="col-6 p-0 align-self-end d-flex align-items-center p-3">
                        <a class="text-decoration-none" href="{{ route('admin.doctorProfile.index') }}">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/profile.png" alt="">
                                <span>
                                    PROFILE
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-end d-flex align-items-center p-3">

                        <a class="text-decoration-none" href="{{ route('admin.messages.index') }}">

                            <div class="my_square shadow">
                                <img class="rounded-5 my_edge_photo" src="/img/messages.png" alt="">
                                <span>
                                    MESSAGES
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">
                        <a class="text-decoration-none" href="{{ route('admin.reviews.index') }}">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/reviews.png" alt="">
                                <span>
                                    REVIEWS
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">
                        <a class="text-decoration-none" href="{{ route('admin.vote.index') }}">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/reviews.png" alt="">
                                <span>
                                    VOTES
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">

                        <a class="text-decoration-none" href="{{ route('admin.statistics.index') }}">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/statistics.png" alt="">
                                <span>
                                    STATISTICS
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">

                        <a class="text-decoration-none" href="{{ route('admin.sponsorship.index') }}">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/statistics.png" alt="">
                                <span>
                                    SPONSORSHIPS
                                </span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
