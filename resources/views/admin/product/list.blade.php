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
    <div id="flashMessageContainer">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('product.add') }}" class="btn btn-sm btn-info">
                            Add New
                        </a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Cover Image</th>
                    <th>Status</th>
                    <th>Trending</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->created_by }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category ? $product->category->name : '-' }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>
                        @if($product->cover_image && file_exists(public_path($product->cover_image)))
                        <img src="{{ asset($product->cover_image) }}" alt="Cover Image" style="height:50px; width:50px; object-fit:cover; border-radius:5px;">
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        <!-- @if($product->status)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif -->
                        <form action="{{ route('product.toggleStatus', $product->id) }}" method="POST" style="display:inline">
                            @csrf
                            @if($product->status)
                            <button type="submit" class="btn btn-success btn-sm" style="padding: 0.15rem 0.4rem; font-size: 0.7rem;">Active</button>
                            @else
                            <button type="submit" class="btn btn-danger btn-sm" style="padding: 0.15rem 0.4rem; font-size: 0.7rem;">Inactive</button>
                            @endif
                        </form>
                    </td>
                    <td>
                        @if($product->is_trending)
                        <span class="badge badge-info">Yes</span>
                        @else
                        <span class="badge badge-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('product.view', $product->id) }}" class="btn btn-sm btn-primary">
                            <i class="mdi mdi-eye"></i> View
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('product.add', $product->id) }}" class="btn btn-sm btn-success">
                            <i class="mdi mdi-pencil"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline-block;">
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
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Cover Image</th>
                    <th>Status</th>
                    <th>Trending</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
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
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    setTimeout(() => {
        const flash = document.getElementById('flashMessageContainer');
        if (flash) {
            flash.style.display = 'none';
        }
    }, 5000);
</script>
@endsection