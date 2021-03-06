@extends('layouts.admin')
@section('content')

<div class="container con">
     <br>
     <br>
     <h2>Edit Session</h2>
     <center><label>You must Make changes in the Required Fields</label></center>
     <form action="{{route('sessions.update', [$session->id])}}" method="post">
         @csrf
         @method('PUT')
         <div class="form-group">
             <label>Name</label>
             <input name="name" value="{{$session->name}}" type="text" class="form-control"  disabled>
         </div>
         <div class="form-group">
             <label>Session Day</label>
            <label>in Format: Y-m-d</label>
             <input name="day" class="form-control" value="{{$session->day}}" />
         </div>


         <div class="form-group">
             <label>Start Time</label>
            <label>in Format: Y-m-d H:m:s</label>
             <input name="starts_at" class="form-control" value="{{$session->starts_at}}" />
         </div>
         <div class="form-group">
             <label>End Time</label>
            <label>in Format: Y-m-d H:m:s</label>
             <input name="finishes_at" class="form-control" value="{{$session->finishes_at}}" />
         </div>





         <button type="submit" class="btn btn-primary" style="display:inline; float:left;">Submit</button>
     </form>
     <a href="{{route('sessions.index')}}" class="btn btn-danger" style="display:inline; float:left; margin-left:10px;">Back</a>

 </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @endsection