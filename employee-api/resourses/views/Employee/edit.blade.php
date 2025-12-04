@extends('layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="PUT" action="{{ route('announcement.update', $Announcement) }}">
                    @csrf
                    

                    <label for="name" >name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="tenure" >tenure</label>
                    <input type="text" id="tenure" name="tenure" required>
                    <label for="department" >department</label>
                    <input type="text" id="department" name="department" required>
                    <button type="submit" class="btn btn-success">
                            Update
                        </button>
@endsection
