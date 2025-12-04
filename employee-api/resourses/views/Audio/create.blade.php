@extends('layouts.app')

@section('title', 'Add New Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    

                    <label for="name" >name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="size" >size</label>
                    <input type="text" id="size" name="size" required>
                    <button type="submit" class="btn btn-success">
                            Create
                        </button>
@endsection
