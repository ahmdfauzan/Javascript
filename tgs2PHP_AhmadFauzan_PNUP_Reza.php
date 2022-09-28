<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="container px-5 my-5">
    <form method="POST">
    <div class="form-floating mb-3">
            <input class="form-control" id="namaPegawai" name="nama" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
            <label for="namaPegawai">Nama Pegawai</label>
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="agama" name="agama" aria-label="Agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
            <label for="agama">Agama</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="manager" type="radio" name="jabatan"value="manager" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="asisten" type="radio" name="jabatan"value="asisten" data-sb-validations="" />
                <label class="form-check-label" for="asisten">Asisten</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="kabag" type="radio" name="jabatan"value="kabag" data-sb-validations="" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="staff" type="radio" name="jabatan"value="staff" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="menikah" type="radio" name="status" value="menikah" data-sb-validations="" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="belum menikah" data-sb-validations="" />
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="jumlahAnak" name="JumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg " name="simpan" type="submit">Submit</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST["simpan"])) {
    $nama = $_POST["nama"];
    $agama = $_POST["agama"];
    $jabatan = $_POST["jabatan"];
    $status = $_POST["status"];
    $JumlahAnak = $_POST["JumlahAnak"];

    switch ($jabatan) {
        case 'manager':
            $gajipokok = 2000000;
            # code...
            break;
            case 'asisten':
                $gajipokok = 15000000;
                # code...
                break;
                case 'kabag':
                    $gajipokok = 1000000;
                    # code...
                    break;
                    case 'staff':
                        $gajipokok = 4000000;
                        # code...
                        break;
        default:
        $gajipokok = 0;
        break;
    }
    $tunjab = (20 * $gajipokok) / 100;

    if ($status == "menikah" && $JumlahAnak <= 2) {
        $tunkel = (5 * $gajipokok) / 100;
    } elseif ($status == "menikah" && $JumlahAnak <= 5) {
        $tunkel = (10 * $gajipokok) / 100;
    } elseif ($status == "menikah" && $JumlahAnak > 5) {
        $tunkel = (5 * $gajipokok) / 100;
    } else {
        $tunkel = 0;
    }

    $gajikotor = $gajipokok + $tunjab + $tunkel;

    $zakatprofesi = ($agama == "Islam" && $gajikotor >= 6000000) ? (2.5 * $gajikotor) / 100 : 0;

    $takehomepay = $gajikotor - $zakatprofesi;
?>
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Nama Pegawai : <?=$nama?></p>
        <p>Nama Agama : <?=$agama?></p>
        <p>Nama Jabatan : <?=$jabatan?></p>
        <p>Nama Status : <?=$status?></p>
        <p>Nama Jumlah Anak : <?=$JumlahAnak?></p>
        <p>Nama Gaji Pokok : <?="Rp.".number_format($gajipokok)?></p>
        <p>Nama Tunjangan Jabatan : <?="Rp.".number_format($tunjab)?></p>
        <p>Nama Tunjangan Keluarga : <?="Rp.".number_format($tunkel)?></p>
        <p>Nama Gaji Kotor : <?="Rp.".number_format($gajikotor)?></p>
        <p>Nama Zakat Profesi : <?="Rp.".number_format($zakatprofesi)?></p>
        <p>Nama Take Home Pay : <?="Rp.".number_format($takehomepay)?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
    const modal = new bootstrap.Modal("#modalView");
    modal.show();
</script>
  </body>
</html>