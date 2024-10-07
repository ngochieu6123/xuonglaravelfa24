@extends('master')
@section('title')
    Chi tiet khach hang {{ $customer->name }}
@endsection
@section('content')
    <h1>Chi tiet khach hang {{ $customer->name }}</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Ten truong</th>
                    <th scope="col">Gia tri</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->toArray() as $key => $value)
                    <tr class="">
                        <td scope="row">{{ strtoupper($key) }}</td>
                        <td>
                            @php
                                switch ($key) {
                                    case 'avatar':
                                        if ($value) {
                                            $url = Storage::url($value);
                                            echo "<img src ='$url' width='100px'>";
                                        }
                                        break;

                                    case 'is_active':
                                    echo $value
                                    ? '<span class="badge bg-primary">YES</span>'
                                    :'<span class="badge bg-danger">NO</span>';
                                    break;
                                    default:
                                        echo $value;
                                        break;
                                }
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
