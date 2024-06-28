@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-block d-sm-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="image_right positon-relative z-n1">
            <img src="/img/messages_green.png" alt="">
        </div>
        <div class="image_left positon-relative z-n1">
            <img src="/img/informations-right.png" alt="">
        </div>

        <div class="wrapper bg_dark_transparent w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-5 fw-bold my_primary">Your messages</h3>
            <h4 class="mb-4">Hi Dr. <span class="my_primary text-decoration-underline">{{ $doctor->surname }}</span>, here
                are the
                messages from your patients</h4>

            @if ($messages)
                <div class="table-responsive">
                    <table class="table border table-light table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Sender</th>
                                <th scope="col">Email</th>
                                <th class="text-center" scope="col">At</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr class="">
                                    <td scope="row">{{ $message->sender_first_name }}
                                        {{ $message->sender_last_name }}</td>

                                    <td>
                                        {{ $message->email }}
                                    </td>


                                    <td class="text-center">
                                        {{ $message->created_at }}
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn my_action_primary rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#modalId-{{ $message->id }}">
                                            <i class="fa-solid fa-eye me-1"></i>
                                            View
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId-{{ $message->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId-{{ $message->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mx-auto"
                                                            id="modalTitleId-{{ $message->id }}">
                                                            This is the message you received from:
                                                            <br>
                                                            <strong>{{ $message->sender_first_name }}
                                                                {{ $message->sender_last_name }}</strong>

                                                        </h5>

                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $message->message_text }}

                                                    </div>
                                                    <div class="modal-footer mx-auto">
                                                        <button type="button"
                                                            class="btn btn-secondary py-1 px-3 rounded-pill my-3"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa-solid fa-xmark me-2"></i>
                                                            Close
                                                        </button>
                                                        <a href="mailto:{{ $message->mail }}"
                                                            class="my_btn_primary py-1 px-3 rounded-pill my-3 text-decoration-none">
                                                            Reply directly
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $messages->links() }}

                </div>
            @else
                <h4>You don't have any message yet.</h4>
            @endif
        </div>
    </div>
@endsection
