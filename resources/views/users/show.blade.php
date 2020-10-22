{{--{{ $user['data']['id']  }}--}}


@extends('base')

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    @if(!empty($message))
        <div class="alert alert-success"> {{ $message }}</div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">User</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Email</td>
                    <td>avatar</td>

                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$user['data']['id']}}</td>
                        <td>{{$user['data']['first_name']}}</td>
                        <td>{{$user['data']['last_name']}}</td>
                        <td>{{$user['data']['email']}}</td>

                        <td><img src="{{$user['data']['avatar']}}" class="img-fluid"></td>

                        <td>
{{--                            <a href="{{ route('contacts.edit',$user['data']['id'])}}" class="btn btn-primary">Edit</a>--}}
                            <a href="{{ route('index-users') }}" class="btn btn-primary" ><i class="fas fa-address-book"></i> </a>
                        </td>
                        <td>
                            <form action="{{ route('user-destroy', $user['data']['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>

    </div>
{{--    <span>Page  {{ $data['page'] }}</span>--}}
@endsection
