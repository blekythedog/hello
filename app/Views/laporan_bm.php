<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        <?= $title ?>
    </title>
    <style>
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            /* Atur ukuran logo sesuai kebutuhan */
            height: auto;
        }

        .judul {
            font-size: 24px;
            font-weight: bold;
        }

        .alamat {
            font-size: 14px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Background color for even rows */
        }

        tr:nth-child(odd) {
            background-color: #fff;
            /* Background color for odd rows */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="container">
    <div class="header">

    </div>

    <table class="table table-striped table-bordered" border="1" width="100%">
    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                        $no = 1;
                        foreach ($dt as $table)
                        { ?>
                      <tr>
                        <td> 
                            <strong><?php echo $no++; ?></strong>
                        </td>
                        <td>
                            <?= $table->nama_barang ?>
                        </td>
                        <td>
                            <?= $table->nama_supplier ?>
                        </td>
                        <td>
                        <?= $table->jumlah ?>
                        </td>
                        <td>
                        <?= $table->tanggal_masuk ?>
                        </td>
                        </tr>
                        <?php } ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
    </table>
</body>

</html>
<script>
    window.print();
</script>