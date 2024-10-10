@extends('master')
@section('title')
Danh sach user
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Phone </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
            <tr>
                <td scope="row">{{$user->id}}</td>
                <td>{{$user->phone->value}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>
@endsection