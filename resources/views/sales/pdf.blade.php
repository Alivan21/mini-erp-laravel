<!DOCTYPE html>
<html>

<head>
  <title>Laporan Penjualan</title>
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
    <h5>Data Penjualan</h5>
  </center>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Nama Barang</th>
        <th>Total Pembelian</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach ($sales as $sale)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ \Carbon\Carbon::parse($sale->date)->translatedFormat('d F Y') }}</td>
          <td>{{ $sale->customer->name }}</td>
          <td>{{ $sale->product->name }}</td>
          <td>{{ $sale->quantity }}</td>
          <td>Rp. {{ number_format($sale->total_price, 0, ',', '.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
