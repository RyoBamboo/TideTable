@extends('layouts.base')

@section('header')
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/assets/js/tide-graph.js"></script>

    <link rel="stylesheet" type="text/css" href="/assets/css/tide-graph.css">
@endsection

@section('content')
    <div class="uk-grid">
        <div class="uk-width-2-3 uk-container-center">
            <div id="graph"></div>
        </div>
    </div>
@endsection
