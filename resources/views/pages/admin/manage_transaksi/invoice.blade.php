<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>INVOICE</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        .gambar{

            max-width: 80px;

            max-height: 80px;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(3) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(3) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <img src="{{public_path('/img/Laundry2.png')}}"  class="gambar">
                            </td>
                            <td></td>

                            <td style="">
                                Invoice : {{ $transaksi->kode_invoice }}<br>
                                Dibuat : {{ $tanggal }}<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td></td>
                            <td>
                                {{$transaksi->alamat_outlet}}<br>

                                Outlet : {{ $transaksi->nama_outlet }}

                            </td>

                            <td>
                                Email<br>
                                kilolaundry@gmail.com<br>
                                Kilo Laundry 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="heading">
                <td>
                    Paket
                </td>

                <td>QTY</td>

                <td>
                    Harga
                </td>
            </tr>

            @foreach($detail as $p)
            <tr class="item">


                <td>{{ $p->nama_paket }} (Rp.{{ number_format($p->harga_paket) }},-)</td>

                <td>{{ $p->qty }}</td>

                <td>
                    Rp. {{ number_format($p->total_harga )}},-
                </td>

            </tr>
            @endforeach

            <tr class="heading">
                <td>Subtotal :</td>
                <td></td>

                <td>
                    Rp. {{ number_format($total) }},-
                </td>
            </tr>
            <tr class="heading">
                <td>Biaya Tambahan : </td>
                <td></td>
                <td>Rp. {{ number_format($transaksi->biaya_tambahan )}},-</td>

            </tr>
            <tr class="heading">
                <td>Pajak (5%) : </td>
                <td></td>
                <td>RP. {{number_format($transaksi->pajak_transaksi)}},-</td>

            </tr>
            @php
            $diskon = ($total+$transaksi->biaya_tambahan+$transaksi->pajak_transaksi) * $transaksi->diskon_transaksi / 100;
            @endphp
            <tr class="heading">
                @if($transaksi->diskon_transaksi == NULL)
                <td>Diskon (0%) : </td>
                @else
                <td>Diskon ({{$transaksi->diskon_transaksi}}%) : </td>
                @endif
                <td></td>
                <td>Rp. {{ number_format($diskon )}},-</td>

            </tr>

            <tr class="total">
                <td></td>
                <td>Total Bayar :</td>

                <td>
                    Rp. {{ number_format($transaksi->total_bayar) }},-
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
