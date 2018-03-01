

<html>
<title>Daftar Mata Pelajaran SMK CAS</title>

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
  <center><h3>Daftar Mata Pelajaran</h3</center><br><br>
    <table>
      <thead>
        <tr>
        <th>ID Mapel</th>
        <th>Mata Pelajaran</th>
        <th>Lama Pelajaran</th>
        <th>Tahun Ajar</th>
        </tr>
      </thead>
      <br>
      <tbody>
        <?php foreach ($data_mapel as $items) :?>
        <tr>
          <td align="center" style="border: 1px solid black;"><?php echo $items->id_mapel ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Mata_pelajaran;?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->lama_mapel." Jam"; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Tahun_ajar; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
</html>