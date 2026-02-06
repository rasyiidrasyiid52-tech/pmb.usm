<?php
error_reporting(1);
date_default_timezone_set('Asia/Jakarta');
$tgl = date("d/m/Y");
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=PMB Gelombang 2 $tgl.xls");

include "../../assets/config/koneksi.php";

$app = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas WHERE id='1'")); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <table>

    <tr style="text-transform: uppercase;"><th colspan="53" align="left" style="text-transform: uppercase;"><h1 style="text-transform: uppercase;">Data PMB Gelombang 1 <?php echo $app['nama']?></h1></th></tr>
    <tr style="height: 50px;color:#fff;"  border="1">
      <th style="background: #007bff;">NO. </th>
      <th style="background: #007bff;text-align: left;">NOMOR PMB</th>
      <th style="background: #007bff;">FAKULTAS</th>
      <th style="background: #007bff;">PROGRAM STUDI</th>
      <th style="background: #007bff;">NIK</th>
      <th style="background: #007bff;">NAMA</th>
      <th style="background: #007bff;">TEMPAT LAHIR</th>
      <th style="background: #007bff;">TANGGAL LAHIR</th>
      <th style="background: #007bff;">JK</th>
      <th style="background: #007bff;">AGAMA</th>
      <th style="background: #007bff;">EMAIL</th>
      <th style="background: #007bff;">HANDPHONE (WA)</th>
      <th style="background: #007bff;">ALAMAT</th>
      <th style="background: #007bff;">PROVINSI</th>
      <th style="background: #007bff;">KABUPATEN/KOTA</th>
      <th style="background: #007bff;">KECAMATAN</th>
      <th style="background: #007bff;">DESA/KELURAHAN</th>
      <th style="background: #007bff;">SEKOLAH ASAL</th>
      <th style="background: #007bff;">ALAMAT SEKOLAH ASAL</th>
      <th style="background: #007bff;">JURUSAN</th>
      <th style="background: #007bff;">TAHUN LULUS</th>
      <th style="background: #007bff;">NOMOR IJAZAH</th>
      <th style="background: #007bff;">TAHUN IJAZAH</th>
      <th style="background: #007bff;">NILAI UJIAN RATA-RATA</th>
      <th style="background: #007bff;">UKURAN ALMAMATER</th>
      <th style="background: #007bff;">PRESTASI</th>
      <th style="background: #007bff;">NIK AYAH</th>
      <th style="background: #007bff;">NAMA AYAH</th>
      <th style="background: #007bff;">NO. HANPHONE AYAH</th>
      <th style="background: #007bff;">PENDIDIKAN AYAH</th>
      <th style="background: #007bff;">PEKERJAAN AYAH</th>
      <th style="background: #007bff;">JABATAN AYAH</th>
      <th style="background: #007bff;">PENGHASILAN AYAH</th>
      <th style="background: #007bff;">NAMA KANTOR AYAH</th>
      <th style="background: #007bff;">ALAMAT KANTOR AYAH</th>
      <th style="background: #007bff;">NIK IBU</th>
      <th style="background: #007bff;">NAMA IBU</th>
      <th style="background: #007bff;">NO. HANPHONE IBU</th>
      <th style="background: #007bff;">PENDIDIKAN IBU</th>
      <th style="background: #007bff;">PEKERJAAN IBU</th>
      <th style="background: #007bff;">JABATAN IBU</th>
      <th style="background: #007bff;">PENGHASILAN IBU</th>
      <th style="background: #007bff;">NAMA KANTOR IBU</th>
      <th style="background: #007bff;">ALAMAT KANTOR IBU</th>
      <th style="background: #007bff;">ALAMAT LENGKAP ORANGTUA</th>
      <th style="background: #007bff;">ALASAN MEMILIH UNIVERSITAS SAINTEK MUHAMMADIYAH</th>
      <th style="background: #007bff;">KTP</th>
      <th style="background: #007bff;">KARTU KELUARGA</th>
      <th style="background: #007bff;">AKTA KELAHIRAN</th>
      <th style="background: #007bff;">PHOTO</th>
      <th style="background: #007bff;">IJAZAH</th>
      <th style="background: #007bff;">SURAT KETERANGAN KERJA</th>
      <th style="background: #007bff;">PIAGAM/SERTIFIKAT</th>
      <?php
      $tampil=mysqli_query($con, "SELECT * FROM users 
        INNER JOIN fakultas ON users.id_fak = fakultas.id_fak 
        INNER JOIN prodi ON users.id_pro = prodi.id_pro 
        INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
        INNER JOIN agama ON users.id_agm = agama.id_agm 
        INNER JOIN provinces ON users.id_prov = provinces.id_prov
        INNER JOIN regencies ON users.id_kab = regencies.id_kab
        INNER JOIN districts ON users.id_kec = districts.id_kec  
        INNER JOIN villages ON users.id_kel = villages.id_kel 
        INNER JOIN jurusan ON users.id_jurusan = jurusan.id_jurusan 
        INNER JOIN almamater ON users.id_alm = almamater.id_alm 
        WHERE id_gel IN ('2') AND status_pmb IN ('1') ORDER BY id_user DESC");
      $no=1;
      while ($r=mysqli_fetch_array($tampil))
      {
        $tgl_lhr = date("d-m-Y", strtotime($r['tgl_lhr']));
        $tgl_input = date("d-m-Y", strtotime($r['tgl_input']));
        $pekerjaan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pekerjaan WHERE id_pekerjaan ='$r[pekerjaan_ayah]'"));
        $pendidikan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pendidikan WHERE id_pendidikan ='$r[pendidikan_ayah]'"));
        $penghasilan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penghasilan WHERE id_penghasilan ='$r[penghasilan_ayah]'"));
        $pekerjaan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pekerjaan WHERE id_pekerjaan ='$r[pekerjaan_ibu]'"));
        $pendidikan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pendidikan WHERE id_pendidikan ='$r[pendidikan_ibu]'"));
        $penghasilan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penghasilan WHERE id_penghasilan ='$r[penghasilan_ibu]'"));
        echo "
        <tr style='height: 40px;vertical-align: middle;'>
        <td style='border-bottom:1px solid #eee;'><center>$no.</center></td>
        <td style='border-bottom:1px solid #eee;text-align: left;'>$r[npm]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_fak]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_pro]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[nik]</td>
        <td style='border-bottom:1px solid #eee;'>$r[name]</td>
        <td style='border-bottom:1px solid #eee;'>$r[tmp_lhr]</td>
        <td style='border-bottom:1px solid #eee;'>$tgl_lhr</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_jk]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_agm]</td>
        <td style='border-bottom:1px solid #eee;'>$r[email]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[hp]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alamat]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_provinsi]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_kabupaten]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_kecamatan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_kelurahan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[sekolah]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alamat_sekolah]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_jurusan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[thn_lulus]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[no_ijazah]</td>
        <td style='border-bottom:1px solid #eee;'>$r[thn_ijazah]</td>
        <td style='border-bottom:1px solid #eee;text-align:center;'>'$r[nilai_rr]</td>
        <td style='border-bottom:1px solid #eee;text-align:center;'>$r[nama_alm]</td>
        <td style='border-bottom:1px solid #eee;'>$r[prestasi]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[nik_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[hp_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>$pendidikan_ayah[nama_pendidikan]</td>
        <td style='border-bottom:1px solid #eee;'>$pekerjaan_ayah[nama_pekerjaan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[jabatan_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>$penghasilan_ayah[nama_penghasilan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[kantor_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alamat_kantor_ayah]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[nik_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>$r[nama_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>'$r[hp_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>$pendidikan_ibu[nama_pendidikan]</td>
        <td style='border-bottom:1px solid #eee;'>$pekerjaan_ibu[nama_pekerjaan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[jabatan_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>$penghasilan_ibu[nama_penghasilan]</td>
        <td style='border-bottom:1px solid #eee;'>$r[kantor_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alamat_kantor_ibu]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alamat_ortu]</td>
        <td style='border-bottom:1px solid #eee;'>$r[alasan_ortu]</td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/ktp/$r[ktp]'>Lihat KTP</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/kk/$r[kk]'>Lihat KK</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/akta/$r[akta]'>Lihat Akta</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/user/$r[gambar]'>Lihat Photo</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/ijazah/$r[ijazah]'>lihat Ijazah</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/suratkerja/$r[surat_kerja]'>Lihat Surat Kerja</a></td>
        <td style='border-bottom:1px solid #eee;'><a href='$app[url]/assets/dist/img/piagam/$r[piagam]'>Lihat Piagam</a></td>
        </tr>";
        $no++;
      }
      ?>
    </table>
  </body>
  </html>