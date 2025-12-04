@extends('layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="PUT" action="{{ route('announcement.update', $Announcement) }}">
                    @csrf
                    

                    <label for="date" >date</label>
                    <input type="text" id="date" name="date" required>
                    <label for="time" >time</label>
                    <input type="text" id="time" name="time" required>
                    <label for="event" >event</label>
                    <input type="text" id="event" name="event" required>
                    <button type="submit" class="btn btn-success">
                            Update
                        </button>
@endsection
