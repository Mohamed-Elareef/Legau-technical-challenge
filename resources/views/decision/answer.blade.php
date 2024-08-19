@extends('layout.layout')

@section('title', 'Question Answer')

@section('content')
    <div class="container">
        <h1>Question Answer</h1>
        <p><strong>Question:</strong> {{ $question }}</p>
        <p><strong>Answer:</strong> {{ $answer }}</p>
        <a href="{{ route('decisions.show', $decision->id) }}" class="btn btn-secondary">Back to Decision</a>
    </div>
@endsection
