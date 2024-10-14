@extends('master')
@section('title')
    Cap nhat
@endsection
@section('content')
    <h1>Cap nhat</h1>
    <div class="container">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('PUT')

            @if (session()->has('success') && !session()->get('success'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            @endif

            @if (session()->has('success') && session()->get('success'))
                <div class="alert alert-primary" role="alert">
                    <strong>Thành công</strong>
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
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                        value="{{ $student->name }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="{{ $student->email }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="classroom_id" class="col-4 col-form-label">Classroom</label>
                <div class="col-8">
                    <select class="form-control" name="classroom_id" id="classroom_id">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" @selected($student->classroom_id == $classroom->id)>{{ $classroom->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is active</label>
                <div class="col-8">
                    <input type="checkbox" @checked($student->is_active) name="is_active" id="is_active" />
                </div>
            </div>

            <h3>Ho chieu sinh vien</h3>

            <div class="mb-3 row">
                <label for="passport_number" class="col-4 col-form-label">Passport number</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="passport_number" id="passport_number"
                        placeholder="Passport number"
                        value="{{ old('passport_number', $student->passport->passport_number ?? '') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="issued_date" class="col-4 col-form-label">Issued date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="issued_date" id="issued_date"
                        value="{{ old('issued_date', $student->passport->issued_date ?? '') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="expiry_date" class="col-4 col-form-label">Expiry date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="expiry_date" id="expiry_date"
                        value="{{ old('expiry_date', $student->passport->expiry_date ?? '') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
