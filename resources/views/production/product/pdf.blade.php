<!DOCTYPE html>
<html>

<head>
  <title>Laporan Produksi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <style type="text/css">
    table tr td,
    table tr th {
      font-size: 9pt;
    }
  </style>
  <center>
    <h5>Data Produksi</h5>
  </center>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal Produksi</th>
        <th>Nama Produk</th>
        <th>Deskripsi</th>
        <th>Stok Barang</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach ($products as $product)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ \Carbon\Carbon::parse($product->date)->translatedFormat('d F Y') }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->stock }}</td>
          <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>

        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
