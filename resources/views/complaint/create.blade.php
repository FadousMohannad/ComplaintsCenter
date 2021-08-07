@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New Complaint</div>
                    <div class="card-body">
                        <form action="/complaint" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Name</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Save Complaint">
                        </form>
                        <a class="btn btn-primary float-right" href="/complaint"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection