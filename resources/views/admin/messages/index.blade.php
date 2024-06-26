@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="image_right">
            <img src="/img/messages_green.png" alt="">
        </div>
        <div class="image_left">
            <img src="/img/informations-right.png" alt="">
        </div>

        <div class="wrapper w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-6 fw-bold my_primary">Your messages</h3>
            <h4 class="mb-4">Hi dr. {{ $doctor->surname }}, here are the messages from your patients</h4>

            @if ($messages)
                <div class="table_glass table-responsive">
                    <table class="table border table-light table-striped table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Sender</th>
                                <th scope="col">Email</th>
                                <th scope="col">At</th>
                                <th scope="col">Actions</th>
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


                                    <td>
                                        {{ $message->created_at }}
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $message->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId-{{ $message->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId-{{ $message->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId-{{ $message->id }}">
                                                            This is the message you received from:
                                                            <strong>{{ $message->sender_first_name }}
                                                                {{ $message->sender_last_name }}</strong>

                                                        </h5>

                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $message->message_text }}

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa-solid fa-xmark"></i>

                                                        </button>
                                                        <a href="mailto:{{ $message->mail }}" class="btn btn-primary">Reply
                                                            directly</a>
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
