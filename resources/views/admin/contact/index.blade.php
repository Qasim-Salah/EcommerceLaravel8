@extends('layouts.master')
@section('title')
    Contact
@endsection
<style>
    nav svg {
        height: 20px;

    }

    nav .hidden {
        display: block !important;
    }
</style>

@section('content')
    <div>
        <div class="container" style="padding: 30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Categories

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comment</th>
                            <th>date</th>

                        </tr>
                        </thead>
                        <tbody>
                        @isset($contact)
                            @foreach($contact as $contacts)
                                <tr>
                                    <td>{{$contacts->id}}</td>
                                    <td>{{$contacts->name}}</td>
                                    <td>{{$contacts->email}}</td>
                                    <td>{{$contacts->mobile}}</td>
                                    <td>{{$contacts->contact}}</td>
                                    <td>{{$contacts->created_at}}</td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                    {{ $contact->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
