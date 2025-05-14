@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Match Name</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#matchModal">
                                + Add New
                            </button>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All match list here</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- card body --}}
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Match Name</th>
                                            <th>Match Slug(s)</th>
                                            <th>Match date & Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data2 as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->match_name }}</td>
                                            <td>{{ $row->match_slug }}</td>
                                            {{-- <td>{{ $row->match_datetime }}</td> --}}
                                            <td>{{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}
                                            </td>
                                            <td>{{ $row->is_game_over == 2 ? 'Running' : '-' }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm edit"
                                                    data-id="{{ $row->id }}" data-toggle="modal"
                                                    data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('matchh.delete', $row->id) }}"
                                                    class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->match_name }}</td>
                                                <td>{{ $row->match_slug }}</td>
                                                {{-- <td>{{ $row->match_datetime }}</td> --}}
                                                <td>{{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}
                                                </td>
                                                <td>{{ $row->is_game_over == 0 ? 'Upcomming' : '-' }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('matchh.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($data1 as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->match_name }}</td>
                                                <td>{{ $row->match_slug }}</td>
                                                {{-- <td>{{ $row->match_datetime }}</td> --}}
                                                <td>{{ Carbon\Carbon::parse($row->match_datetime)->format('d M Y  h:i:s A') }}
                                                </td>
                                                <td>{{ $row->is_game_over == 1 ? 'Game Over' : '-' }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('matchh.delete', $row->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete"><i
                                                            class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- team insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="matchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Match Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('matchh.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="match_name">Match Name</label>
                            <input type="text" class="form-control" id="match_name" name="match_name" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main Match</small>
                        </div>
                        <div class="from-group">
                            <label for="match_name">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="match_datetime" name="match_datetime"
                                required="">
                            <small id="emailHelp" class="from-text text-muted">This is your match date time</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Match</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('matchh.update') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="match_name">Match Name</label>
                            <input type="text" class="form-control" id="e_match_name" name="match_name" required="">
                            <input type="hidden" class="form-control" id="e_match_id" name="id">
                            <small id="emailHelp" class="from-text text-muted">This is you main match</small>
                        </div>
                        {{-- <div class="from-group">
                            <label for="match_name">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="match_datetime" name="match_datetime"
                                required="">
                            <small id="emailHelp" class="from-text text-muted">This is your match date time</small>
                        </div> --}}
                        <div class="from-group">
                            <label for="match_name">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value=""> --- Select Option --- </option>
                            </select>
                            <small id="emailHelp" class="from-text text-muted">This is your match status</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get("matchh/edit/" + cat_id, function(data) {
                $.get("matchh/edit/" + cat_id, function(data) {
                    $('#e_match_name').val(data.match_name);
                    $('#e_match_id').val(data.id);
                    // $('#match_datetime').val(data.match_datetime);
                    // $("#match_datetime").val(formatDate new Date().toJSON().slice(0,19));
                    // 'd M Y  h:i:s A'
                    // console.log(data.match_datetime);
                    // console.log(new Date().toJSON().slice(0,19));
                    // console.log($.datepicker.formatDate('dd M yy', new Date()));
                    // console.log(moment(new Date()).format('YYYY-MM-DD HH:mm:ss'));
                    // console.log($.format.date(new Date(), 'YYYY-MM-DD HH:mm:ss'));
                    var selectOpt = '';
                    if(data.is_game_over == 0){
                        selectOpt += '<option value="0" selected>Upcomming</option>';
                    }else{
                        selectOpt += '<option value="0">Upcomming</option>';
                    }
                    if(data.is_game_over == 1){
                        selectOpt += '<option value="1" selected>Game Over</option>';
                    }else{
                        selectOpt += '<option value="1">Game Over</option>';
                    }
                    if(data.is_game_over == 2){
                        selectOpt += '<option value="2" selected>Running</option>';
                    }else{
                        selectOpt += '<option value="2">Running</option>';
                    }
                    $('#status').append(selectOpt);
                })
            });
        });
    </script>
@endsection
