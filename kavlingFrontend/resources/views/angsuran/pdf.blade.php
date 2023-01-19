

         <!DOCTYPE html>
         <html lang="en">
         <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Document</title>
         </head>
         <style>
          td {
            text-align: center;
          }
         </style>
         <body>

<h3 style="text-align: center">DATA ANGSURAN KAVLING</h3>
        
            <table align="center" cellspacing="1" cellpadding="1" border="1px">
            <tr style="text-align:center ;">
                <th>No</th>
                <th>No kav</th>
                <th>nama konsumen <br> / tot pembelian</th>
                <th>Pembayaran Awal <br> / kurang bayar</th>
                <th>tanggal Pembayaran</th>
                <th>Nominal Angsuran</th>                
              </tr>
            <?php $no = 0 ?>
            @foreach ($angsuran as $data)
            @php $no++ @endphp
              <tr>
                <td>@php
                    echo $no
                @endphp</td>
                <td>{{$data['no_kav']}}</td>
                <td>{{ $data['nama_konsumen'] }} <br> Rp. {{ $data['tot_pembelian'] }}</td>
                <td>Rp. {{ $data['pembayaran_awal'] }} <br> Rp. {{ $data['kurang_bayar'] }}</td>
                <td>{{ $data['tanggal_angsuran'] }} </td>
                <td>Rp. {{ $data['nominal_angsuran'] }} </td>              
              </tr>
              @endforeach
          </table>
         </body>
         </html>
