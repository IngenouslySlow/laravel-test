@extends('layouts.app')
@section('title', 'Distancer')
@section('content')
<form action="{{ route('home.show') }}" method="POST">
    @csrf
    <label for="code_one">Enter your first code</label>
    <input type="text" name="code_one" id="code_one">
    <br>
    <label for="code_two">Enter your second code</label>
    <input type="text" name="code_two" id="code_two">
    <br>
    <input type="submit" value="Calculate">
</form>
<h1>The distance is : {{$distance??""}} </h1>
@endsection
