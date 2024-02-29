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
                <th>Nama</th> 
                <th>Nis</th> 
                <th>Kelas</th> 
                <th>Level</th>
                <th>Point</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($dt as $td) {
            ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $td->nama ?>
                </td> <!-- Change to <?= $td->nama ?> -->
                <td>
                    <?= $td->nis ?>
                </td> <!-- Change to <?= $td->nis ?> -->
                <td>
                    <?= $td->nama_kelas ?>
                </td> <!-- Change to <?= $td->nama_kelas ?> -->
                <td>
                    <?= $td->level ?>
                </td> <!-- Change to <?= $td->level ?> -->
                <td>
                    <?= $td->point ?>
                </td> <!-- Change to <?= $td->point ?> -->
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
<script>
    window.print();
</script>