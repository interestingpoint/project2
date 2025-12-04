@extends('layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="row justify-content-center">

                <form method="PUT" action="{{ route('announcement.update', $Announcement) }}">
                    @csrf
                    

                    <label for="name" >name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="size" >size</label>
                    <input type="text" id="size" name="size" required>
                    <label for="artist" >artist</label>
                    <input type="text" id="artist" name="artist" required>
                            Update
                        </button>
@endsection
