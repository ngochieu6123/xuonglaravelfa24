@extends('master')
@section('title')
    Danh sach khach hang
@endsection
@section('content')
    <h1>Danh sach khach hang</h1>
    <a class="btn btn-info" href="{{ route('customers.create') }}">Create</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name </th>
                    <th scope="col">Address </th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is active?</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr class="">
                        <td scope="row">{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            @if ($customer->avatar)
                                <img src="{{ Storage::url($customer->avatar) }}" width="100px">
                            @endif
                        </td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif
                        </td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('customers.show', $customer) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('customers.edit', $customer) }}">Edit</a>

                            <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Chac chan xoa?')">
                                    xm
                                </button>
                            </form>

                            <form action="{{ route('customers.forceDestroy', $customer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Chac chan xoa?')">
                                    xc
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
