@extends('layouts.app')

@section('content')
<?php // echo $users_data['id']; die; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7" style="width:60%;align-content:center;">
            <div class="card" style="margin-top:50px;">
                <b><div class="card-header">{{$users_data['name']}}</div></b>

            <div class="card-body">
                <form action="/complaint/{{$complaint->id}}" method="POST">
                    <b>{{$complaint->description}}</b>
                </form>
            </div>
                <div class="card-footer">
                    @if($complaint->status == "Pending")
                        <b><label for="status" style="color:orange">{{$complaint->status}}</label></b>
                    @endif
                    @if($complaint->status == "Rejected")
                        <b><label for="status" style="color:red;">{{$complaint->status}}</label></b>
                    @endif
                    @if($complaint->status == "Approved")
                        <b><label for="status" style="color:green;">{{$complaint->status}}</label></b>
                    @endif
                <?php if($users_data['role'] == 1998)  {?>
                <form action="/complaint/{{$complaint->id}}" method="POST">
                @csrf
                @method('PUT')
                    <input id="status" name="status" type="submit" class="btn btn-sm btn-success float-right" value="Approve">
                    <input id="status" name="status" type="submit" style="margin-right:10px;" class="btn btn-sm btn-danger float-right" value="Reject">
                </form>
                <?php } ?>
                    
                </div>
            </div>
            <div class="m-2">
                <a class="btn btn-primary" href="/complaint">Back To List</a>
            </div>
        </div>
    </div>
</div>
@endsection

