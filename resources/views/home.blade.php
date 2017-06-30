@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login successful</div>

                <div class="panel-body">
                    You're logged in as {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
