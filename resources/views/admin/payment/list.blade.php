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
                <h1 class="m-0">Payments</h1>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Payments</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Stripe ID</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>
                        {{ $payment->name }}
                    </td>
                    <td>{{ $payment->email }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>
                        {{ $payment->payment_id }}
                    </td>
                    <td>
                        {{ $payment->status == 1 ? 'Success' : 'Pending' }}
                    </td>
                    <!-- <td>
                        <a href="{{ route('payment.view', $payment->id) }}" class="btn btn-sm btn-primary">
                            <i class="mdi mdi-eye"></i> View
                        </a>
                    </td> -->
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Stripe ID</th>
                    <th>status</th>
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
</script>
@endsection