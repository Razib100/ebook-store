@extends('admin.layouts.index')
@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Authors</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('author.add') }}" class="btn btn-sm btn-info">
                            Add New
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Authors List</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Home Visible</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        @if(isset($author->image))
                        <img src="{{ asset('admin/assets/author/' . $author->image) }}"
                            alt="{{ $author->name }}"
                            style="height:50px; width:50px; object-fit:cover; border-radius:5px;">
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ ucfirst($author->gender) ?? '-' }}</td>
                    <td>{{ $author->dob ? $author->dob->format('Y-m-d') : '-' }}</td>
                    <td>{{ $author->phone ?? '-' }}</td>
                    <td>
                        @if($author->home_visible)
                        <span class="badge badge-success">Yes</span>
                        @else
                        <span class="badge badge-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        @if($author->status)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('author.view', $author->id) }}" class="btn btn-sm btn-primary">
                            <i class="mdi mdi-eye"></i> View
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('author.add', $author->id) }}" class="btn btn-sm btn-success">
                            <i class="mdi mdi-pencil"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('author.delete', $author->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="mdi mdi-delete"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Phone</th>
                    <th>Home Visible</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('script')
<!-- DataTables & Plugins -->
<script src="{{ asset('/admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection