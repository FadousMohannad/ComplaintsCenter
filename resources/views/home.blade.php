@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Complaint!') }}</div>

                <div class="card-body">
                <label class="col-md-4 col-form-label text-md-right">{{ __('Complaint') }}</label>
                <input id="password" type="textarea" class="form-control required">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
