@extends('layouts.app')

@section('title', 'Add New Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    

                    <label for="name" >name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="votes" >votes</label>
                    <input type="text" id="location" name="location" required>
                    <label for="position" >position</label>
                    <input type="text" id="position" name="position" required>
                    <button type="submit" class="btn btn-success">
                            Create
                        </button>
@endsection
