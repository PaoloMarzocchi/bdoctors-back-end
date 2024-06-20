@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="fs-2 my_primary my-4 d-flex align-items-center justify-content-center">
            <p class="bg-dark rounded px-2 py-1 text-center">
                {{ __('Dashboard') }}
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card h-100 border-0">
                    <div class="card-header rounded-5 text-center my_primary">
                        Docty &copy;
                    </div>
                    {{--
                    ################################################
                    ########### FAKE AI AREA BIGGER !! #############
                    ################################################ 
                    --}}
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row flex-column">
                            {{--
                            ################################################
                            REMEMBER TO PUT HERE THE NAME OF CURRENT USER !!
                            ################################################ 
                            --}}
                            <div class="col-8 align-self-start">
                                <textarea rows="25" disabled placeholder="Try to ask me, '-statistics'.." class="form-control" name=""
                                    id="" rows="3">{{ __("Welcome BDoctor ! I'm your AI, Docty.") }}
                                </textarea>
                            </div>
                            <br>
                            <div class="col-8 align-self-end">
                                <textarea rows="25" class="form-control text-end" name="" id="" rows="3"
                                    placeholder="Try to ask '-statistics'.."></textarea>
                            </div>
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
                        <a class="text-decoration-none" href="">
                            <div class="my_square shadow">
                                <img class="rounded-5 my_edge_photo" src="/img/messages.png" alt="">
                                <span>
                                    MESSAGES
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">
                        <a class="text-decoration-none" href="">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/reviews.png" alt="">
                                <span>
                                    REVIEWS
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 p-0 align-self-start d-flex align-items-center p-3">
                        <a class="text-decoration-none" href="">
                            <div class="my_square shadow">
                                <img class="rounded-5" src="/img/statistics.png" alt="">
                                <span>
                                    STATISTICS
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
