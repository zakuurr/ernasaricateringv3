@extends('backend/layout-master')
@section('title')
    Rekapan Pendapatan Ongkir Ernasari
@endsection
@section('css')
<meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')
<br>

<div class="col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Rekapan Pendapatan Ongkir</h5>
      </div>
      <div class="card-body">
       
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
            @php
                $totalPendapatan = 0;
            @endphp
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pesan</th>
                  <th>Pendapatan Ongkir</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($orderitem as $key => $item)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y'); }}</td>
                    {{-- <td>{{ $item->menu->nama_menu }}</td> --}}
                    <td>Rp. {{ number_format((float)$item->ongkir,2,'.','.') }}</td>
                  </tr>
                  @php
                      $totalPendapatan += $item->ongkir;
                  @endphp
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total Pendapatan</th>
                        <th>Rp. {{ number_format((float)$totalPendapatan,2,'.','.') }}</th>
                    </tr>
                </tfoot>
              </table>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a href="{{ route('laporan.index') }}" class="btn btn-danger">Kembali</a>
      </div>
      <!-- /.card -->
    </div>
  </div>



@section('js')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
    });
    
    </script>

    
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["excel", "pdf", "print"]
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
@endsection