
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-1">


        @if(Auth::user()->isAdmin == 1)

        <div class="row justify-content-center mt-2">
            <h2>Admin Accessibilties</h2>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <a href="/users/showall" class="btn btn-info btn-squared-default">
                <i class="fa fa-compass fa-5x"></i> <br>
            Show <br> users
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/departments/tree" class="btn btn-success btn-squared-default mx-4">
                <i class="fa fa-compass fa-5x"></i> <br>
                Show departments
            </a>

            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/chat" class="btn btn-info btn-squared-default"><br>
                <i class="fa fa-laptop fa-4x"></i> <br>
            Enter Chat
            </a>
        </div>

        @else

        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:170px; height:170px; float:left; border-radius:50%; margin-right:25px;">
        
        <h2>
            {{ Auth::user()->name }}'s Profile<br>
            <small>{{ Auth::user()->email }}</small>
        </h2>
        <br>

        <form enctype="multipart/form-data" action="/home" method="POST">
            <label>Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="float-right btn btn-primary">
        </form>
        </div>
         
    </div>   
        <br><br><br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-info">
                    <p> You can edit your profile or enter the chatroom below. </p>
                </div>
            <br>
            <div class="row justify-content-center">
                <button class="btn btn-primary btn-squared-default" data-myname="{{Auth::user()->name}}" data-myemail="{{Auth::user()->email}}" data-userid="{{Auth::user()->id}}" data-toggle="modal" 
                data-target="#edit">
                    <i class="fa fa-pencil fa-3x"></i> <br/>
                Edit Personal Data
                </button> 
                &nbsp;&nbsp;&nbsp;&nbsp;
                
                <a href="/chat" class="btn btn-success btn-squared-default ml-2">
                <br>
                    <i class="fa fa-laptop fa-4x"></i> <br>
                    Enter Chat
                </a>                    
                
            </div>
        </div>   
</div>        


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add">Edit Personal Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <form action="{{route('User.update', 'test')}}" method="post">
            {{method_field('patch')}}
            {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

        @endif
</div>
        
    
@endsection