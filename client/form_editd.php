<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!-- end datatable -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#tabel-undangan').DataTable();
        });
    </script>

</head>

<body>
    <?php

    include 'vendor/autoload.php';

    use GuzzleHttp\Client;


    $id = $_GET['id'];

    $client = new Client([
        'base_uri' => 'http://127.0.0.1:8000',
        'timeout' => 5
    ]);

    $response = $client->request('GET', '/api/Iddrink/', ['json' => [
        'id' => $id,
    ]]);
    $body = $response->getBody();
    $data_body = json_decode($body);

    ?>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Tambah <b>Minuman</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="makanan.php" class="btn btn-secondary"><span class="material-icons-outlined">Back</span></a>
                        </div>
                    </div>
                </div>
                <form action="edit_datafood.php?id=<?php echo $id ?>" method="POST">
                    <div class="mb-3">
                        <label for="name_field" class="form-label">Nama Minuman</label>
                        <input type="text" class="form-control" id="name_field" name="nama" value="<?php echo $data_body->nama ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" name="ket" id="ket" class="form-control" value="<?php echo $data_body->ket ?>" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Insert</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>