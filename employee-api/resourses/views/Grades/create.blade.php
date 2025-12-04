@extends('layouts.app')

@section('title', 'Add New Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    

                    <label for="text" >text</label>
                    <input type="text" id="text" name="text" required>
                    <label for="location" >location</label>
                    <input type="text" id="location" name="location" required>
                    <button type="submit" class="btn btn-success">
                            Create
                        </button>
@endsection
