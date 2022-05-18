<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Karyawan</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        <?php 
            include_once "../database/database.php";

            if(isset($_POST['button_simpan'])){
                $nik = $_POST['nik'];
                $nama_karyawan = $_POST['nama_karyawan'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $status_menikah = $_POST['status_menikah'];

                // $insertSQL = "INSERT INTO karyawan VALUES (NULL,'" . $nik . "','" . $nama_karyawan . "','"
                //     . $jenis_kelamin . "','" . $status_menikah . "')";

                $insertSQL = "INSERT INTO karyawan VALUES (NULL, ?, ?, ?, ?)";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($insertSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama_karyawan);
                $statement->bindParam(3, $jenis_kelamin);
                $statement->bindParam(4, $status_menikah);
                $statement->execute();

                header('Location: main.php?page=karyawan');
            }

            ?>

        </div>
    </div>
    <div>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
                <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            </div>
            <div class="mb-3">
                <label for="status_menikah" class="form-label">Status Menikah</label>
                <input type="text" class="form-control" id="status_menikah" name="status_menikah">
            </div>
            <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
    </div>
</main> 