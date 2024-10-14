@extends('master')
@section('title')
    Chi tiet sinh vien
@endsection
@section('content')
    <h1>Chi tiet sinh vien</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">ID</td>
                    <td>{{ $student->id }}</td>
                </tr>
                <tr>
                    <td scope="row">Name</td>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <td scope="row">Email</td>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <td scope="row">Classroom</td>
                    <td>
                        @php
                            $classroom = $student->classroom;
                            echo $classroom ? $classroom->name : 'N/A';
                        @endphp
                    </td>
                </tr>
                <tr>
                    <td scope="row">Is active</td>
                    <td>
                        @if ($student->is_active)
                            <span class="badge bg-primary">YES</span>
                        @else
                            <span class="badge bg-danger">NO</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td scope="row">Created at</td>
                    <td>{{ $student->created_at }}</td>
                </tr>
                <tr>
                    <td scope="row">Updated at</td>
                    <td>{{ $student->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Ho chieu sinh vien</h2>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                @if ($student->passport)
                    <tr>
                        <td>Passport number</td>
                        <td>{{ $student->passport->passport_number }}</td>
                    </tr>
                    <tr>
                        <td>Issued date</td>
                        <td>{{ $student->passport->issued_date }}</td>
                    </tr>
                    <tr>
                        <td>Expiry date</td>
                        <td>{{ $student->passport->expiry_date }}</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{ $student->passport->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td>{{ $student->passport->updated_at }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2">Chua co ho chieu</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
