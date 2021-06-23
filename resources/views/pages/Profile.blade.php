@extends('layers.layer')
@section('content')
<div class="rg-container mt-4">
    <div class="settings d-grid">
        <section class="sec">
            <div class="row">
                <div class="col-md-6">
                    <h2 class=" text-whity fs-12 fw-500 mb-3">{{Auth::user()->name}} Configuration</h2>
                    <form action="{{asset(route('updatename'))}}" method="POST" class=" mt-4 pb-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="mb-0 fs-12 text-gray">Email Address</label>
                            <input type="text" class="form-control disableForm mb-4" value="{{Auth::user()->email}}"
                                name="email" disabled>
                        </div>
                        <div class="form-group">
                            <label class="mb-2 fs-12 text-gray">Username</label>
                            <input type="text" class="form-control  rg-input @error('name') is-invalid @enderror"
                                value="{{Auth::user()->name}}" name="name">
                            @error('name')
                            <div class="message  @error('name') error @enderror">
                                {{$message}}
                            </div>
                            @enderror
                            @if(session()->has('success'))
                            <div class="message">
                                {{ session()->get('success') }}
                            </div>
                            @else
                            asd
                            @endif
                        </div>
                        <button class="mt-4 green-btn">Update</button>
                    </form>
                    <h2 class=" text-whity fs-12 fw-500 mb-3 mt-4">Change Password</h2>
                    <p class="fs-12 text-white">Yo Hoody, in case of you change password make sure to remeber the new
                        password</p>
                    <form action="{{asset(route('updatepassword'))}}" method="POST" class=" mt-4 pb-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="mb-2 fs-12 text-gray">Current Password</label>
                            <input type="password"
                                class="form-control  rg-input fs-13 @if(session()->has('currerror')) is-invalid @endif"
                                name="currentpass" placeholder="Current Password">
                            @if(session()->has('currerror'))
                            <div class="message error">
                                {{session()->get('currerror')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="mb-2 fs-12 text-gray">New Password</label>

                            <input type="password"
                                class="form-control  rg-input fs-13 @error('newpass') is-invalid @enderror"
                                name="newpass" placeholder="New Password">
                            @error('newpass')
                            <div class="message  @error('newpass') error @enderror">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-2 fs-12 text-gray">New Password Confirmation</label>

                            <input type="password" class="form-control  rg-input fs-13 " name="newpass_confirmation"
                                placeholder="New Password Confirm">
                        </div>
                        <button class="mt-4 green-btn">Change password</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2 class=" text-whity fs-12 fw-500 mb-3">Logout</h2>
                    <div class="logout mt-4">
                        <p class="fs-12 text-white">Yo Hoody,If yo logout anydata you didnt save will be terminated,bye
                            we are waiting to see you again</p>
                        <form action="{{ route('logout') }}" method="POST">@csrf <button
                                class="mt-4 green-btn">Logout</button></form>
                        <div>
                            <div class="delete mt-4">
                                <h2 class=" text-whity fs-12 fw-500 mb-3">Delete Account</h2>
                                <div class="logout mt-4">
                                    <p class="fs-12 text-white">Yo Hoody,If yo delete your account two thing will
                                        happend , first one we will miss you bud secound you wont be able to retrive
                                        your data again</p>
                                        <button type="button" class="btn btn-primary green-btn" data-toggle="modal" data-target="#deleteModal" data-whatever="@getbootstrap">Delete</button>
                                        @if(session()->has('password_delete'))
                            <div class="message error">
                                {{session()->get('password_delete')}}
                            </div>
                            @endif
                                    <div>
                                    </div>
                                </div>
                            </div>
        </section>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{asset(route('accdelete'))}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="password" class="form-control" name="password"
                                placeholder="Enter password">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
