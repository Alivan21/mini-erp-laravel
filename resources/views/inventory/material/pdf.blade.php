<!DOCTYPE html>
<html>

<head>
  <title>Laporan Bahan Baku</title>
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
    <h5>Data Bahan Baku</h5>
  </center>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>No</th>
        <th>Bahan Baku</th>
        <th>Deskripsi</th>
        <th>Total Stok</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach ($materials as $material)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $material->name }}</td>
          <td>{{ $material->description }}</td>
          <td>{{ $material->quantity }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>

</html>
