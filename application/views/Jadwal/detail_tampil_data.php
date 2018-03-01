        <?php
            $day = $data_jadwal_detail->hari;;
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
<div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Jadwal</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                <label>NIP*</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" "  value="<?php echo $data_jadwal_detail->NIP; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
                <div class="form-group">
                <label>Nama Guru</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->Nama; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Hari</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $hari; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
               <div class="form-group">
                <label>Mata Pelajaran</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->Mata_pelajaran; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
                <div class="form-group">
                <label>Kelas</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->nama_kelas; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Lama Ngajar</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->lama_mapel; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
               <div class="form-group">
                <label>Jam Awal</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->jam_awal; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
                <div class="form-group">
                <label>Jam Akhir</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->jam_akhir; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tahun Ajaran</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-table"></i>
                  </div>
                  <input type="text" disabled=" " value="<?php echo $data_jadwal_detail->Tahun_ajar; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="">
               <a href="<?php echo base_url('jadwal'); ?>" class="btn btn-info pull-right" style="margin-right: 4px;">Kembali</a>
            </div>
        </div>
      </div>