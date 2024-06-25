@extends('layouts.admin')

@section('content')
  <div class="container my-3">


    {{--         <div class="card p-3 border-0">
          <div class="card-header rounded-5 text-center my_primary">
            DoctyAI &copy;
          </div> --}}
    {{--
                    ################################################
                    ########### FAKE AI AREA BIGGER !! #############
                    ################################################ 
                    --}}
    {{--           <div class="card-body p-0">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="row flex-column chat mt-3 px-4 gy-3">

              <div class="messageReceived p-2">
                Welcome {{ Auth::user()->name . ' ' . $doctorProfile->surname }}. I'm your AI, Docty.
              </div>
              <div class="messageReceived p-2">
                Type something like "statistics" and I will try to help!😊
              </div> --}}

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
    {{--             </div>

            <div class="input_message rounded p-2 mt-3 d-flex">
              <a href="#"><i class="hide_sm fa-regular fa-xl fa-face-smile"></i></a>
              <input type="text" placeholder="Scrivi un messaggio" v-model.trim="newMessage.message"
                @keydown.enter="addMessage(activeContact)" @keyup.enter="replyMessage(activeContact)">
              <a href="#"><i class="hide_sm fa-solid fa-xl fa-microphone"></i></a>
            </div>

          </div>
        </div> --}}

    <div class="messages mb-4 border">
      <div class="container-fluid py-2 overlay">
        <section>
          <h2 class="section_title display-5 fw-bold my_primary">Your last messages</h2>

          <div class="message_list d-flex flex-column gap-3 mb-3">
            @forelse ($messages as $message)
              <div class="message shadow p-2">
                <div class="name">
                  {{ $message->sender_first_name . ' ' . $message->sender_last_name }}
                </div>
                <div class="email">{{ $message->email }}</div>
                <div class="message_text">{{ $message->message_text }}</div>
                <div class="date">{{ $message->formattedDate($message->created_at) }}</div>

              </div>
            @empty
              <h4>You don't have any message for now.</h4>
            @endforelse
          </div>

          <a class="btn my_btn_primary btn-lg px-4 rounded-pill my-3" href="{{ route('admin.messages.index') }}">
            View all messages
            <i class="ms-2 fa-solid fa-arrow-right"></i>
          </a>
        </section>
      </div>
    </div>

    <div class="row align-items-md-stretch">

      <div class="col-md-6">
        <div class="reviews h-100 border">
          <section class="overlay p-5">
            <h3 class="section_title display-6 fw-bold my_primary">Your last reviews</h3>

            <div class="review_list d-flex flex-column gap-3 mb-3">
              @forelse ($reviews as $review)
                <div class="review shadow p-2">
                  <div class="name">
                    {{ $review->first_name . ' ' . $review->last_name }}
                  </div>
                  <div class="email">{{ $review->email }}</div>
                  <div class="review_text">{{ $review->review_text }}</div>
                  <div class="date">{{ $message->formattedDate($review->created_at) }}</div>

                </div>
              @empty
                <h4>You don't have any message for now.</h4>
              @endforelse
            </div>

            <a class="btn my_btn_primary px-4 rounded-pill my-3" href="{{ route('admin.reviews.index') }}">
              View all reviews
              <i class="ms-2 fa-solid fa-arrow-right"></i>
            </a>
          </section>
        </div>
      </div>

      <div class="col-md-6 d-flex flex-column gap-4">
        <div class="votes border">
          <section class="overlay p-5">
            <h3 class="section_title display-6 fw-bold my_primary">Your average vote</h3>

            <div class="review_list d-flex flex-column gap-2 mb-3">
              @if ($votes)
                <span class="text-warning ms-2">
                  @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $average)
                      <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    @else
                      <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                    @endif
                  @endfor
                </span>
              @endif

            </div>

            <a class="btn my_btn_primary px-4 rounded-pill my-3" href="{{ route('admin.reviews.index') }}">
              View all votes
              <i class="ms-2 fa-solid fa-arrow-right"></i>
            </a>
          </section>
        </div>


        <div class="sponsorships border flex-fill">
          <section class="overlay p-5">
            <h3 class="section_title display-6 fw-bold my_primary">Your active sponsorship</h3>

            <div class="sponsorship_list d-flex flex-column gap-2">

              @forelse ($doctorProfile->sponsorships as $sponsorship)
                <div class="sponsorship shadow px-2 py-3">
                  <div class="name mb-2">
                    {{ $sponsorship->name }}:
                  </div>
                  <div id="countdown">Your {{ strtolower($sponsorship->name) }} will expire in:

                    <span id="hours">{{ $sponsorship->timeRemaining($sponsorship->created_at)['hours'] }}</span>
                    <span id="minutes">{{ $sponsorship->timeRemaining($sponsorship->created_at)['minutes'] }}:</span>
                    <span id="seconds">{{ $sponsorship->timeRemaining($sponsorship->created_at)['seconds'] }}</span>

                  </div>
                </div>
              @empty
                <h4>You don't have any message for now.</h4>
              @endforelse

            </div>

            <a class="btn my_btn_primary px-4 rounded-pill my-3" href="{{ route('admin.sponsorship.index') }}">
              Buy other sponsorships
              <i class="ms-2 fa-solid fa-arrow-right"></i>
            </a>

          </section>
        </div>


      </div>



    </div>

    @vite(['resources/js/sponsorshipCountDown.js'])
  @endsection
