@extends('layouts.admin')

@section('content')
  <div class="container my-4">
    @include('partials.session-message')
    @include('partials.validation-message')
    @if ($messages)
      <div class="container">

        <h2 class="display-5 fw-bold my_primary my-5">Your messages</h2>

        <div class="row">
          <div class="col">
            <div class="table-responsive">
              <table class="table table-light border border-2 table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">Sender</th>
                    <th scope="col">Email</th>
                    <th scope="col">At</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($messages as $message)
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
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                          data-bs-target="#modalId-{{ $message->id }}">
                          <i class="fa-solid fa-eye"></i>
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId-{{ $message->id }}" tabindex="-1" data-bs-backdrop="static"
                          data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $message->id }}"
                          aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                  <i class="fa-solid fa-xmark"></i>

                                </button>
                                <a href="mailto:{{ $message->mail }}" class="btn btn-primary">Reply directly</a>
                              </div>
                            </div>
                          </div>
                        </div>


                      </td>

                    </tr>

                  @empty
                  @endforelse

                </tbody>


              </table>
            </div>
          </div>
        </div>
      @else
        <p>
          Nothing to show
        </p>
    @endif
  </div>
@endsection
