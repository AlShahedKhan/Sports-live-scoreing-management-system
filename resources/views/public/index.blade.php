@extends('layouts.public')
{{-- @include('layouts.public_partial.navbar')
@include('layouts.public_partial.sidebar') --}}

    @section('admin_content')
        <div class="content-wrapper">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/public_scores') }}">
                            <h1>খেলা|পাগল</h1>
                        </a>
                    </div>
                </nav>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-body">
                                            {{ __('ম্যাচের তালিকা সমূহ!') }}
                                                <div class="mb-3">
                                                    লাইভ:
                                                    <br>
                                                    @foreach ($match2 as $row)
                                                        <input onclick="mk({{ $row->id }})" type="button"
                                                            class="btn btn-primary mb-1" id="match"
                                                            matchId="{{ $row->id }}" value="{{ $row->match_name }} | {{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}" />
                                                    @endforeach
                                                    <br>
                                                    আসন্ন ম্যাচ:
                                                    <br>
                                                    @foreach ($match as $row)
                                                        <input onclick="mk({{ $row->id }})" type="button"
                                                            class="btn btn-primary mb-1" id="match"
                                                            matchId="{{ $row->id }}"
                                                            value="{{ $row->match_name }} | {{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}" />
                                                    @endforeach
                                                    <br>
                                                    খেলা শেষ:
                                                    <br>
                                                    @foreach ($match1 as $row)
                                                        <input onclick="mk({{ $row->id }})" type="button"
                                                            class="btn btn-primary mb-1" id="match"
                                                            matchId="{{ $row->id }}"
                                                            value="{{ $row->match_name }} | {{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}" />
                                                    @endforeach
                                                </div>

                                                <div id="matchData">

                                                </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script type="text/javascript">
                function mk(id) {
                    window.history.pushState('Cricket', 'Match', '{{ url('/') }}/public_scores?match_id=' + id);
                    var matchId = id;
                    $('#matchData').html('');
                    $.ajax({
                        url: '{{ route('getStates') }}?match_id=' + matchId,
                        type: 'get',
                        success: function(res) {
                            $("#matchData").append(res.html);
                        }
                    });
                }

                function GraphScore(id) {
                    var matchId = id;
                    $('#GraphScore').html('');
                    $.ajax({
                        url: '{{ route('getGraph') }}?match_id=' + matchId,
                        type: 'get',
                        success: function(res) {
                            $("#GraphScore").append(res.html);
                        }
                    });
                }
                $(document).ready(function() {
                    let searchParams = new URLSearchParams(window.location.search);
                    searchParams.has('match_id'); // true
                    if (searchParams.has('match_id')) {
                        let param = searchParams.get('match_id');
                        mk(param);
                    }
                });
            </script>
        @endsection
