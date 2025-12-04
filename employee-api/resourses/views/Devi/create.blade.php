@extends('layouts.app')

@section('title', 'Add New Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    

                    <label for="type" >type</label>
                    <input type="text" id="type" name="type" required>
                    <label for="desc" >desc</label>
                    <input type="text" id="desc" name="desc" required>
                    <label for="status" >status</label>
                    <input type="text" id="status" name="status" required>
                    <button type="submit" class="btn btn-success">
                            Create
                        </button>
@endsection
