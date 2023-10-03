<table class="table table-bordered table-hover table-stripped table-sm" id="tbl-produk">
  <thead>
    <tr>
      <th>No.</th>
      <th>Nama Produk</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($produk as $p)
        <tr>
          <td>{{ $i = isset($i)?++$i:1 }}</td>
          <td>{{ $p->nama_produk }}</td>
          <td>
            <button type="button" class="btn btn-info"><i class="far fa-edit"></i></button>  
            <form action="produk/{{ $p->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
          <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td>
          </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>