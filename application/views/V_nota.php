<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Nota</title>

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

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
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

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
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
    <?php
    $radja = array();
    $zuppa = array();
    $Skirpsi = array();

    $var = $nota['produk'];
    $sembah = 1;
    $array = explode(',', $var);
    foreach ($array as $value) {
        $radja[$sembah] = $value;
        $sembah++;
    }

    $sembah = 1;
    $var = $nota['qty'];
    $array = explode(',', $var);
    foreach ($array as $value) {
        $zuppa[$sembah] = $value;
        $sembah++;
    }

    $sembah = 1;
    $var = $nota['harga_satuan'];
    $array3 = explode(',', $var);
    // $sesuaiformat = "Rp " . number_format($array3, 0, ',', '.');
    foreach ($array3 as $value) {
        $Skripsi[$sembah] = $value;
        $sembah++;
    }

    ?>
    <div class="invoice-box">

        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <h3>Bun Jaya <br> Service</h3>
                            </td>
                            <td>
                                Jalan Kapten Jumhana No.616 <br>
                                Medan, Sumatra Utara
                            </td>
                            <hr>


                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>

                                <b>No Invoice : <?php echo $nota['id_transaksi']; ?> </b>

                                <br>
                                <b>Tanggal Transaksi :</b>
                                <?php $hari = $nota['hari'];
                                switch ($hari) {
                                    case "0":
                                        echo "Senin";
                                        break;
                                    case "1":
                                        echo "Selasa";
                                        break;
                                    case "2":
                                        echo "Rabu";
                                        break;
                                    case "3":
                                        echo "Kamis";
                                        break;
                                    case "4":
                                        echo "Jumat";
                                        break;
                                    case "5":
                                        echo "Sabtu";
                                        break;
                                    case "6":
                                        echo "Minggu";
                                        break;
                                } ?> <?php echo date("d/M/Y", strtotime($nota['transaction_date'])); ?>


                            </td>

                            <td>
                                <b>Pelanggan :</b> <br>
                                <?php echo $nota['pelanggan']; ?><br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    No
                </td>

                <td>
                    Barang
                </td>

                <td>
                    Qty
                </td>

                <td>
                    Harga Satuan
                </td>

            </tr>



            <?php $nanges = 1;
            for ($i = 1; $i <= $sembah - 1; $i++) { ?>
                <tr class="item">
                    <td><?php echo $nanges ?></td>
                    <td><?php echo $radja[$i] ?></td>
                    <td><?php echo $zuppa[$i] ?></td>
                    <td><?php echo "Rp " . number_format($Skripsi[$i], 0, ',', '.'); ?></td>
                </tr>
            <?php $nanges++;
            } ?>



            <tr class="total">
                <!-- <td></td> -->
                <hr>
                <td>
                    Total Pembayaran: <br> <?php $hasil_rupiah = "Rp " . number_format($nota['total'], 0, ',', '.');
                                            echo $hasil_rupiah; ?>
                </td>
            </tr>

            <tr class="total">
                <!-- <td></td> -->
                <!-- <br> -->
                <td>
                    Dicetak oleh : <?= $this->session->userdata('nama'); ?>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>