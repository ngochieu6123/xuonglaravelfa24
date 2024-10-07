@extends('master')
@section('title')
    Them moi
@endsection
@section('content')
    <h1>Them moi khach hang</h1>
    <div class="container">
        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf

            @if (session()->has('success') && !session()->get('success'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            @endif

            @if (session()->has('success') && session()->get('success'))
                <div class="alert alert-primary" role="alert">
                    <strong>Thanh cong</strong>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{old('address')}}"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}"/>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is active</label>
                <div class="col-8">
                    <input type="checkbox" name="is_active" id="is_active" placeholder="is_active" /> 
                </div>
            </div>
            <div class="mb-3 row">
                <label for="avatar" class="col-4 col-form-label">Avatar</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="avatar" id="avatar" placeholder="avatar" value="{{old('avatar')}}"/>
                </div>
            </div>
    </div>
    <div class="mb-3 row">
        <div class="offset-sm-4 col-sm-8">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
    </form>
    </div>
@endsection
