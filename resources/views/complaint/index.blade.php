@extends('layouts.app')

@section('content')
<?php  //echo $users_data['role']; die; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" style="width:60%;align-content:center;">
            <div class="card" style="margin-top:50px;">
                <b><div class="card-header">All Complaints</div></b>

                <div class="card-body">
                    <ul class="list-group">
                    @foreach($complaints as $complaint)
                        <!-- <label for="" class="label">User Description</label> -->
                        <li class="list-group-item"><a title="Show Details" href="/complaint/{{$complaint->id}}" style="text-decoration: none;">{{$complaint->subject}}</a>
                            <form action="/complaint/{{$complaint->id}}" style="display: inline;" method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn btn-sm btn-outline-danger float-right" value="Delete">
                            </form>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <?php if($users_data['role'] == 1998) { ?>
            <div class="m-3 d-felx justify-content-center">
            {{ $complaints->links('pagination::bootstrap-4');}}
            </div>
            <?php } ?>
            <?php if($users_data['role'] != 1998) { ?>
            <div class="m-2">
                <a class="btn btn-success btn-sm" href="/complaint/create">Add New Complaint</a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
@endsection

