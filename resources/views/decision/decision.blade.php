@extends('layout.layout')

@section('title')
{{$decision->process_number}}
@endsection

@section('meta')
    <meta property="og:title" content="{{$decision->process_number}}">
    <meta name="description" content="{{$decision->summary}}">
    <meta name="keywords" content="@foreach($tags as $tag){{$tag->name}}, @endforeach">
@endsection

@section('content')
    <main class="app-main">
        <div class="wrapper">
            <div class="page has-sidebar has-sidebar-expand-lg">
                <div class="page-inner">
                    <header class="page-title-bar">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Processos</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">{{$decision->process_number}}</a>
                                </li>
                            </ol>
                        </nav>
                        <div class="d-md-flex align-items-md-start">
                            <h1 class="page-title mr-sm-auto"> {{$decision->process_number}} </h1>
                        </div>
                    </header>

                    <div class="page-section">

                        @foreach ($tags as $tag)
                        <a href="#" class="btn btn-outline-info">{{$tag->name}}</a>
                        @endforeach

                        <hr class="my-5">

                        <div class="section-block">
                            <h2 class="section-title"> Sumário </h2>
                            {!!nl2br($decision->summary)!!}
                        </div>

                        <hr class="my-5">

                        <div class="section-block">
                            <h2 class="section-title"> Decisão </h2>
                            {!!nl2br($decision->full_text)!!}
                        </div>

                        <hr class="my-5">

                        <!-- Form to ask a question -->
                        <form action="{{ route('ask-question', $decision->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question">Ask a question:</label>
                                <input type="text" id="question" name="question" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
                @include('decision.sidebar')
            </div>
        </div>
    </main>
@endsection

@section('css')
    <link rel='stylesheet' href='{{asset('css/bootstrap-select.min.css')}}' />
@endsection

@section('js')
<script src='{{asset('js/flatpickr.min.js')}}'></script>
<script src='{{asset('js/bootstrap-select.min.js')}}'></script>
@endsection
