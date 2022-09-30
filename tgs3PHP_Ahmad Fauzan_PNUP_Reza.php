<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 PHP Firda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $mhs1 = ["nim" => "001", "nama" => "Fauzan", "nilai" => 75];
    $mhs2 = ["nim" => "002", "nama" => "Fauzan1", "nilai" => 60];
    $mhs3 = ["nim" => "003", "nama" => "Fauzan2", "nilai" => 55];
    $mhs4 = ["nim" => "004", "nama" => "Fauzan3", "nilai" => 80];
    $mhs5 = ["nim" => "005", "nama" => "Fauzan4", "nilai" => 95];
    $mhs6 = ["nim" => "006", "nama" => "Fauzan5", "nilai" => 65];
    $mhs7 = ["nim" => "007", "nama" => "Fauzan6", "nilai" => 85];
    $mhs8 = ["nim" => "008", "nama" => "Fauzan7", "nilai" => 40];
    $mhs9 = ["nim" => "009", "nama" => "Fauzan8", "nilai" => 85];
    $mhs10 = ["nim" => "010", "nama" => "Fauzan9", "nilai" => 70];

    $kumpulanMahasiswa = [$mhs1, $mhs2, $mhs3, $mhs4, $mhs5, $mhs6, $mhs7, $mhs8, $mhs9, $mhs10];
    $kumpulanJudul = ["No", "Nim", "Nama", "Nilai", "Keterangan", "Grade", "Predikat"];
    ?>
    <h1 class="text-center">Data Nilai Mahasiswa</h1>
    <div class="container>
    <table class="table table-bordered table-striped">

    </table>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php
                    foreach ($kumpulanJudul as $judul) { ?>
                        <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                foreach ($kumpulanMahasiswa as $mahasiswa) {
                    $nim = $mahasiswa["nim"];
                    $nama = $mahasiswa["nama"];
                    $nilai = $mahasiswa["nilai"];

                    $keterangan = ($nilai >= 60) ? "Lulus" : "Gagal";

                    if ($nilai >= 90 && $nilai <= 100) {
                        $grade = "A";
                    } elseif ($nilai >= 80 && $nilai < 90) {
                        $grade = "B";
                    } elseif ($nilai >= 70 && $nilai <= 80) {
                        $grade = "C";
                    } elseif ($nilai >= 60 && $nilai <= 70) {
                        $grade = "D";
                    } else {
                        $grade = "E";
                    }

                    switch ($grade) {
                        case 'A':
                            $predikat = "Memuaskan";
                            break;
                        case 'B':
                            $predikat = "Lebih Baik";
                            break;
                        case 'C':
                            $predikat = "Cukup";
                            break;
                        case 'D':
                            $predikat = "Kurang";
                            break;
                        default:
                            $predikat = "Buruk";
                            break;
                    }?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $nim ?></td>
                        <td><?= $nama ?></td>
                        <td><?= $nilai ?></td>
                        <td><?= $keterangan ?></td>
                        <td><?= $grade ?></td>
                        <td><?= $predikat ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php
                $jumlahMahasiswa = count($kumpulanMahasiswa);
                $kumpulanNilai = array_column($kumpulanMahasiswa, "nilai");
                $nilaiTertinggi = max($kumpulanNilai);
                $nilaiTerendah = min($kumpulanNilai);
                $totalNilai = array_sum($kumpulanNilai);
                $rata2 = $totalNilai / $jumlahMahasiswa;

                $tfoot = [
                    "Nilai tertinggi" => $nilaiTertinggi,
                    "Nilai terendah" => $nilaiTerendah,
                    "Rata-rata" => $rata2,
                    "Jumlah Mahasiswa" => $jumlahMahasiswa,
                ];

                foreach ($tfoot as $key => $value) { ?>
                    <tr>
                        <th colspan="4"><?= $key ?></th>
                        <th colspan="3"><?= $value ?></th>
                    </tr>
                    
           <?php }    ?>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>