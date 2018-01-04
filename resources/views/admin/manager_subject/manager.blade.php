@extends('welcome')
@section('header')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <a href="{{route('manager_subject.create')}}" class="btn btn-primary active btn-add">New Subject</a>
        </div>
        <table class="table-bordered table">
            <tr>
                <th class="stt">STT</th>
                <th >Name Subject</th>
                <th >Academy</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($subjects as $key => $subject)
                <tr>
                    <td>{{++$key}} </td>
                    <td> {{$subject ->name}}</td>
                    <td>{{$subject ->academy}} </td>
                    <td><a class="glyphicon glyphicon-edit" title="EDIT"
                                       href="{{route('manager_subject.edit',$subject->id)}}"></a></td>
                    <td>
                        <form action="{{route('manager_subject.destroy',$subject->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" title="DELETE" class="delete"><span
                                        class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$subjects->links()}}
    </div>

@endsection