

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
       <strong>DAFTAR KELAS SMK CITRA ANGKASA SCHOOL</strong><br>
  </table>
  <div class="bb" style="border: 1px solid black"></div> 
    <table>
      <thead>
        <tr>
         <th>NO</th>
          <th>Kelas</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <br>
      <tbody>
        <?php $no=1; 
          header("Content-type: application/octet-stream");
          header("Content-Disposition: attachment; filename=Data_kelas.xls");
          header("Pragma: no-cache");
          header("Expires: 0");

        foreach ($data_kelas as $items) :?>
        <tr>
          <td align="center" style="border: 1px solid black;"><?php echo $no++; ?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->Nama_kelas;?></td>
          <td align="center" style="border: 1px solid black;"><?php echo $items->nama_jurusan; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->
</html>