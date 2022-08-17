@extends('users.layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-6 offset-lg-3 margin-tb">
             <div class="pull-left">
                 <h2>User Detail </h2>
             </div>
             <div class="pull-right " >
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
     </div>
     <div class="row">
         <div class="col-lg-6 offset-lg-3 margin-tb">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th >Address</th>
                    <th>Age</th>
                    <th>Points</th>
                </tr>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address}}</td>
                    <td>{{ $user->age}}</td>
                    <td>Points {{ $user->points}}</td>
                </tr>
            </table>
         </div>
     </div>