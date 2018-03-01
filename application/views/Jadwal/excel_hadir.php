<html>
<title>Daftar Guru CAS</title>

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
       <strong>DATA GURU HADIR SMK CITRA ANGKASA SCHOOL</strong><br>
  </table>
  <div class="bb" style="border: 1px solid black"></div> 
    <table>
      <thead>
        <tr>
        <th>No</th>
        <th>Nama Guru</th>
        <th>Hari</th>
        <th>Mata Pelajaran</th>
        <th>Kelas</th> 
        <th>Lama Ngajar</th>
        <th>Status</th>  
        <th>Keterangan</th>
        </tr>
      </thead>
      <br>
      <tbody>
        <?php $no=1; 
    header("Content-type: application/octet-stream");

    header("Content-Disposition: attachment; filename=guru_hadir.xls");

    header("Pragma: no-cache");

    header("Expires: 0");


        foreach ($data_jadwal as $items) :?>
        <?php
            $day = $items->hari;;
            switch ($day) {
            case 'Sunday' : $hari = "Minggu"; break;
            case 'Monday' : $hari = "Senin"; break;
            case 'Tuesday' : $hari = "Selasa"; break;
            case 'Wednesday' : $hari = "Rabu"; break;
            case 'Thursday' : $hari = "Kamis"; break;
            case 'Friday' : $hari = "Jum'at"; break;
            case 'Saturday' : $hari = "Sabtu"; break;
            default : $hari = "";
            }
            ?>
         <tr>
          <td align="center" style="border: 1px solid black;"><?php echo $no++; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Nama;?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $hari; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Mata_pelajaran; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->nama_kelas; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->lama_mapel." Jam"; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->status; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->keterangan; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
</html>