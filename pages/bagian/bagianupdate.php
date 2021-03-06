<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Bagian</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php 
                include_once "../database/database.php";

                $id =  $_GET['id'];
                echo $id;
                $findSQL = "SELECT * FROM bagian WHERE id = ?";
                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($findSQL);
                $statement->bindParam(1, $id);
                $statement->execute();
                $data = $statement->fetch();

                if(isset($_POST['button_simpan'])){
                $id            = $_POST['id'];
                $nik            = $_POST['nik'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $jabatan = $_POST['jabatan'];

                $updateSQL = "UPDATE `bagian` SET `nik` = ?, `nama` = ?, `jenis_kelamin` = ?, `jabatan`= ? WHERE `bagian`.`id` = ?";

                $database = new Database();
                $connection = $database->getConnection();
                $statement = $connection->prepare($updateSQL);
                $statement->bindParam(1, $nik);
                $statement->bindParam(2, $nama);
                $statement->bindParam(3, $jenis_kelamin);
                $statement->bindParam(4, $jabatan);
                $statement->bindParam(5, $id);
                $statement->execute();

                header('Location: main.php?page=bagian');

                }
            ?>
            </div>
      </div>
      <div>
        <form action="" method="post">
          <!-- <div class="mb-3">
            <label for="id" class="form-label">ID Karyawan</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
          </div> -->
          <input type="hidden"  id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
          <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Karyawan</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data['nik'] ?>"required>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>"required>
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" value="Laki-laki" name="jenis_kelamin" id="jenis_kelamin1" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? "checked" : "" ?> required>
              <label class="form-check-label" for="jenis_kelamin1">
                Laki-laki
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" id="jenis_kelamin2" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? "checked" : "" ?> >
              <label class="form-check-label" for="jenis_kelamin2">
                Perempuan
              </label>
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" aria-label="Default select example" name="jabatan" required>
              <option value="">Pilih Jabatan</option>
              <option value="Direktur"<?php echo ($data['jabatan'] == 'Direktur') ? "selected" : "" ?> >Direktur</option>
              <option value="Manager"<?php echo ($data['jabatan'] == 'Manager') ? "selected" : "" ?> >Manager</option>
              <option value="Devisi Umum"<?php echo ($data['jabatan'] == 'Devisi Umum') ? "selected" : "" ?> >Devisi Umum</option>
            </select>
          </div>
          <button class="btn btn-success" type="submit" name="button_simpan"><span data-feather="database"></span> Simpan</button>
        </form>
      </div>
</main> 