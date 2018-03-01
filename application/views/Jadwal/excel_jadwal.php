<html>
<title>Jadwal Guru CAS</title>

 <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:px solid #000;
      padding: 1px;
      font-weight: bold;
      text-align: center;
      background: silver;
  }
 
  </style>
</head>
<body>
  <table>
       <strong>JADWAL GURU MENGAJAR SMK CITRA ANGKASA SCHOOL</strong><br>
  </table>
  <div class="bb" style="border: 1px solid black"></div> 
    <table>
      <thead>
        <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Hari</th>
        <th>Jam Awal</th>
        <th>Jam Akhir</th>
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>ID Mata Pelajaran</th>
        <th>Mata Pelajaran</th>
        <th>Lama Mata Pelajaran</th>
        <th>Tahun Ajaran</th>
        </tr>
      </thead>
      <br>
      <tbody>
        <?php $no=1; 
    header("Content-type: application/octet-stream");

    header("Content-Disposition: attachment; filename=jadwal_guru.xls");

    header("Pragma: no-cache");

    header("Expires: 0");


        foreach ($data_jadwal as $items) :?>
        <tr>
          <td align="center" style="border: 1px solid black;"><?php echo $no++; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->nama_kelas;?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->nama_jurusan; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->hari; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->jam_awal; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->jam_akhir; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo "'".$items->NIP."'"; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Nama; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->id_mapel; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Mata_pelajaran; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->lama_mapel." Jam"; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Tahun_ajar; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
</html>