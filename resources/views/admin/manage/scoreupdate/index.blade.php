@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Score Update Batter</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamModal">
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
                                <h3 class="card-title">All Scoreupdate list here</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- card body --}}
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <<th>SL</th>
                                                <th>Out Type</th>
                                                <th>Out by Type</th>
                                                <th>One</th>
                                                <th>Two</th>
                                                <th>Three</th>
                                                <th>Four</th>
                                                <th>Six</th>
                                                <th>Balls</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->out_type }}</td>
                                                <td>{{ $row->out_by_type }}</td>
                                                <td>{{ $row->one }}</td>
                                                <td>{{ $row->two }}</td>
                                                <td>{{ $row->three }}</td>
                                                <td>{{ $row->four }}</td>
                                                <td>{{ $row->six }}</td>
                                                <td>{{ $row->balls_played }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('scoreupdates.delete', $row->id) }}"
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

    {{-- category insert modal --}}
    <!-- Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Player Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('scoreupdates.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="out_type">Out Type</label>
                            <input type="text" class="form-control" id="out_type" name="out_type" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main Out Type</small>
                        </div>
                        <div class="from-group">
                            <label for="out_by_type">Out by Type</label>
                            <input type="text" class="form-control" id="out_by_type" name="out_by_type" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main Out by Type</small>
                        </div>
                        <div class="from-group">
                            <label for="one">one</label>
                            <input type="text" class="form-control" id="one" name="one" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main Out Type</small>
                        </div>
                        <div class="from-group">
                            <label for="two">Two</label>
                            <input type="text" class="form-control" id="two" name="two" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main Two</small>
                        </div>
                        <div class="from-group">
                            <label for="three">Three</label>
                            <input type="text" class="form-control" id="three" name="three" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main three</small>
                        </div>
                        <div class="from-group">
                            <label for="four">Four</label>
                            <input type="text" class="form-control" id="four" name="four" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main four</small>
                        </div>
                        <div class="from-group">
                            <label for="six">Six</label>
                            <input type="text" class="form-control" id="six" name="six" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main six</small>
                        </div>
                        <div class="from-group">
                            <label for="balls_played">Balls</label>
                            <input type="text" class="form-control" id="balls_played" name="balls_played" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you main balls played</small>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Score Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("scoreupdates/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
