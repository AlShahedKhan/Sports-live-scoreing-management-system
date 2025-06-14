@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Bowler</h1>
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
                                <h3 class="card-title">All Bowler list here</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- card body --}}
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Overs</th>
                                            <th>maidens</th>
                                            <th>runs</th>
                                            <th>wickets</th>
                                            <th>no_balls</th>
                                            <th>wides</th>
                                            <th>panalty_runs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->overs }}</td>
                                                <td>{{ $row->maidens }}</td>
                                                <td>{{ $row->runs }}</td>
                                                <td>{{ $row->wickets }}</td>
                                                <td>{{ $row->no_balls }}</td>
                                                <td>{{ $row->wides }}</td>
                                                <td>{{ $row->panalty_runs }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('updatebowler.delete', $row->id) }}"
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
                <form action="{{ route('updatebowler.store') }}" method="Post">
                    @csrf
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="overs">overs</label>
                            <input type="text" class="form-control" name="overs" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you overs</small>
                        </div>
                        <div class="from-group">
                            <label for="maidens">maidens</label>
                            <input type="text" class="form-control" name="maidens" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you maidens</small>
                        </div>
                        <div class="from-group">
                            <label for="runs">runs</label>
                            <input type="text" class="form-control" name="runs" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you runs</small>
                        </div>
                        <div class="from-group">
                            <label for="wickets">wickets</label>
                            <input type="text" class="form-control" name="wickets" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you wickets</small>
                        </div>
                        <div class="from-group">
                            <label for="no_balls">no_balls</label>
                            <input type="text" class="form-control" name="no_balls" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you no balls</small>
                        </div>
                        <div class="from-group">
                            <label for="wides">wides</label>
                            <input type="text" class="form-control" name="wides" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you wides</small>
                        </div>
                        <div class="from-group">
                            <label for="panalty_runs">panalty_runs</label>
                            <input type="text" class="form-control" name="panalty_runs" required="">
                            <small id="emailHelp" class="from-text text-muted">This is you panalty runs</small>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Player</h5>
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
            $.get("updatebowler/edit/" + subcat_id, function(data) {
                $("#modal_body").html(data);
            });
        });
    </script>
@endsection
