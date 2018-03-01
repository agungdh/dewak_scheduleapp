

<html>
<title>Keterangan Guru CAS</title>

 <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
      background: silver;
  }
 
  </style>
</head>
<body>
  <table>
    <tr>
      <td><img src="berkas/logo.jpg" style="height: 65px; width: 85px; margin-right: 5px;"></td>
      <td>
       <strong><center><b>SMK CITRA ANGKASA SCHOOL</</center></strong>
        <center>Jl. Perwira No.21 Rajabasa Bandar Lampung Provinsi Lampung </center>
        <center>Telp. 0721-708889, E-mail: catpramugari@gmail.com, Website: www.sekolahpramugaricat.com</center>
        <br>
        <br>
      </td>
      <td><img src="berkas/logo.jpg" style="height: 65px; width: 85px; margin-left: 90px;"></td>
    </tr>
  </table>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="bb" style="border: 2px solid black"></div> 
  <center><h3>Data Guru Hadir</h3</center><br><br>
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
        <?php $no=1; foreach ($data_jadwal as $items) :?>
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