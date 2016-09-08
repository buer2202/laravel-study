@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>

    @foreach($user as $u)
    <div>{{ $u->name }}</div>
    @endforeach

    <div>{{ $page->links() }}</div>
    <div>{{ $page->count() }}</div>
</div>


@endsection
