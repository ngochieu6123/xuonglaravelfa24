@extends('master')
@section('title')
    Them moi
@endsection
@section('content')
    <h1>Them moi</h1>
    <div class="container">
        <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
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
                <label for="first_name" class="col-4 col-form-label">First Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first_name" value="{{old('first_name')}}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="last_name" class="col-4 col-form-label">Last Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last_name" value="{{old('last_name')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{old('email')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="phone" value="{{old('phone')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date_of_birth" class="col-4 col-form-label">Date of birth</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="date_of_birth" value="{{old('date_of_birth')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="hire_date" class="col-4 col-form-label">Hire date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="hire_date" id="hire_date" placeholder="hire_date" value="{{old('hire_date')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="salary" class="col-4 col-form-label">Salary</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="salary" id="salary" placeholder="salary" value="{{old('salary')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is active</label>
                <div class="col-8">
                    <input type="checkbox" name="is_active" id="is_active" placeholder="is_active" /> 
                </div>
            </div>
            <div class="mb-3 row">
                <label for="department_id" class="col-4 col-form-label">Department Id</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="department_id" id="department_id" placeholder="department_id" value="{{old('department_id')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="manager_id" class="col-4 col-form-label">Manager Id</label>
                <div class="col-8">
                    <input type="number" class="form-control" name="manager_id" id="manager_id" placeholder="manager_id" value="{{old('manager_id')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{old('address')}}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="profile_picture" class="col-4 col-form-label">Profile picture</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="profile_picture" id="profile_picture" placeholder="profile_picture" value="{{old('profile_picture')}}"/>
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
