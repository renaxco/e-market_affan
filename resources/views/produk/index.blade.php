@extends('templates.layout')

@section('content')
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Manajemen Produk</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
         <div class="mb-2">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
              {{  session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger mt-2" role="alert" id="error-alert">
              <ul>
              @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div>
          @endif
          </div>  
          <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#produkFormModal">
            Tambah  Produk
          </button>

          @include('produk.data')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    @include('produk.form')
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('script')
  <script>
   
    $(function(){
      $('#tbl-produk').DataTable()

      // dialog hapus data
      $('.btn-delete').on('click', function(e){
        let nama_produk = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
          icon: 'error',
          title: 'Hapus Data',
          html: `Apakah data <b>${nama_produk}</b> akan dihapus?`,
          confirmButtonText : 'Ya',
          denyButtonText : 'Tidak',
          showDenyButton : true,
          focusConfirm: false
        }).then((result) => {
          if(result.isConfirmed) $(e.target).closest('form').submit()
          else swal.close()
        })
      })
    })
  </script>
@endpush