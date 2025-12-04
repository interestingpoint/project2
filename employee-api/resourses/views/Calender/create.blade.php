@extends('layouts.app')

@section('title', 'Add New Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    

                    <label for="date" >date</label>
                    <input type="text" id="date" name="date" required>
                    <label for="time" >time</label>
                    <input type="text" id="time" name="time" required>
                    <label for="event" >event</label>
                    <input type="text" id="event" name="event" required>
                    <button type="submit" class="btn btn-success">
                            Create
                        </button>
@endsection
