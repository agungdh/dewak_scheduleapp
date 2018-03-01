

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
       <strong>DAFTAR MATA PELAJARAN SMK CITRA ANGKASA SCHOOL</strong><br>
  </table>
  <div class="bb" style="border: 1px solid black"></div> 
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
        <?php $no=1; 
    header("Content-type: application/octet-stream");

    header("Content-Disposition: attachment; filename=Data_mapel.xls");

    header("Pragma: no-cache");

    header("Expires: 0");


        foreach ($data_mapel as $items) :?>
        <tr>
          <td align="center" style="border: 1px solid black;"><?php echo $items->id_mapel; ?></td>
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