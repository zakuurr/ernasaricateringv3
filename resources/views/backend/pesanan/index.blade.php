@extends('backend/layout-master')
@section('title')
    Ernasari Catering | Pesanan
@endsection
@section('content')
      <!-- Content Wrapper. Contains page content -->


    <!-- /.content-header -->
    <div class="card">
      <div class="card-header">
        <h2>Daftar Pesanan</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Order ID</th>
            <th>Sub total</th>
            <th>Total</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Bukti Pembayaran</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($pesananOr as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->subtotal }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  {{-- <img src="{{asset('storage/fototransfer/'.$item->foto)}}" width="20%" alt=""> --}}
                  <button id="buttonKlik" type="button" class="btn btn-info" data-foto="{{$item->foto}}" data-toggle="modal" data-target="#largeModal">
                   Cek Bukti
                  </button> 
                </td>
                <td>
                    <a style="margin-bottom : 5px;" class="btn btn-warning" href="{{ route('pesanan.detail', $item->id) }}" ><font color="white"><i class="fa fa-eye"></i> Lihat detail</font></a>
                  <div class="dropdown">
                      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Status
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'diproses'])}}">Di Proses</a>
                        <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'sedang-dikirim'])}}">Sedang Dikirim</a>
                        {{-- <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'pesanan-diterima'])}}">Sedang Dikirim</a> --}}
                        <a class="dropdown-item" href="{{ route('pesanan.updateOrderStatus',['id'=>$item->id,'status'=>'cancel'])}}">Cancel</a>

                      </div>
                    </div>

              </td>
              </div>
            </tr>

           
    @endforeach
          </tbody>

        </table>
      </div>
      <!-- /.card-body -->
    </div>
  <!-- Modal-->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                     
                    <img class="card-img-top rounded-0 pb-2" name="image" id="pict" width="20%" src="" alt="Belum ada bukti pembayaran">
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- End Modal --}}
   
    @section('js')
<script>

$('.tombol-hapus').on('click', function (e) {

e.preventDefault();

const href =$(this).attr('href');

Swal.fire({
title: 'Apakah anda yakin ?',
text: "Transaksi pesanan ini akan dihapus",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Ya'
}).then((result) => {
if (result.value) {
    document.location.href = href;
    Swal.fire(
  'Terhapus!',
  'Data berhasil dihapus.',
  'success'
)
}
})

});

</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["excel", "pdf", "print"]
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

<script>
  $('#largeModal').on('show.bs.modal', function (event) {
    
    var button= $(event.relatedTarget)
        var foto= button.data('foto')
        
        var modal= $(this)
        modal.find('.modal-body #pict').attr("src", "storage/fototransfer/"+foto);
        
  })
</script>
@endsection
@endsection
