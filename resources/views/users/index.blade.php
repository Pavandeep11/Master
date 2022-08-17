
@extends('users.layout')
 
 @section('content')
     <div class="row">
         <div class="col-lg-6 offset-lg-3 margin-tb">
             <div class="pull-left">
                 <h2>API for Leaderboard application </h2>
             </div>
             
         </div>
     </div>
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    
     <div class="row">
         <div class="col-lg-12 margin-tb">
            <table class="table table-bordered">
                <tr>
                    <th colspan="5" >User List</th>
                </tr>
                @if(!$users->isEmpty())
                @foreach ($users as $user)
                <tr>
                    <td> <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">X</button>
                        </form></td>
                    <td><a href="{{ route('users.show',$user->id) }}" >{{ $user->name }}</a></td>
                    <td><form  action="{{ route('users.add-point',$user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">+</button>
                        </form></td>
                    <td>
                    <form action="{{ route('users.decrease-point',$user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">-</button>
                            
                        </form>
                    </td>
                    <td>{{ $user->points}} Points</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan=5 style='text-align:center'>No data found</td>
                </tr>
                @endif
            </table>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.create') }}"> + Add User</a>
            </div>
         </div>
     </div>
     {!! $users->links() !!}
       
 @endsection