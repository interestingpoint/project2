@extends('layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="PUT" action="{{ route('announcement.update', $Announcement) }}">
                    @csrf
                    

                    <label for="name" >name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="questions" >questions</label>
                    <input type="text" id="questions" name="questions" required>
                    <label for="class" >class</label>
                    <input type="text" id="class" name="class" required>
                    <button type="submit" class="btn btn-success">
                            Update
                        </button>
@endsection
