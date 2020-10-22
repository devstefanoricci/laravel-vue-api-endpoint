{{--{{ $data }}--}}


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

    <div id="app">
        <front-page></front-page>
    </div>


    <span>Page  {{ $data['page'] }}</span>
@endsection

