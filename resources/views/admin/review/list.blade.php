@extends('admin.layouts.index')

@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Reviews</h1>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Reviews</h3>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="example1" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Product Name</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                        <td>{{ $review->customer ? trim($review->customer->first_name . ' ' . $review->customer->last_name) : 'Anonymous' }}</td>
                        <td>{{ Str::limit($review->product->title ?? 'Unknown Product',30) }}</td>
                        <td>{{ Str::limit($review->comment, 100) ?? 'No Comment' }}</td>
                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star" style="color: {{ $i <= $review->rating ? '#ffc107' : '#e4e5e9' }}"></i>
                            @endfor
                        </td>
                        <td>
                            @if($review->status == 1)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($review->status == 0)
                                <a href="{{ route('admin.review.status', $review->id) }}" class="btn btn-success btn-sm" title="Approve Review">
                                    <i class="fas fa-check"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.review.status', $review->id) }}" class="btn btn-secondary btn-sm disabled" title="Set Pending">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Product Name</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

        <div class="mt-3">
            {{ $reviews->links() }}
        </div>
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
            "order": [[0, "desc"]],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
