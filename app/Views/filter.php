<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>
                <?php
                if ($kunci == 'view_laporan') {
                    echo "Laporan Transaksi";
                } else if ($kunci == 'view_laporan_masuk') {
                    echo "Laporan barang masuk";
                }
                ?>
            </h2>
            <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

            <form class="form-horizontal form-label-left" action="<?php
            if ($kunci == 'view_laporan') {
                echo base_url('home/laporan_pdf');
            } else if ($kunci == 'view_laporan_masuk') {
                echo base_url('home/laporan_bm');
            }
            ?>" method="post">

<div class="content-wrapper">
            <!-- Content -->


              <div class="row">
                <!-- Basic -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Print Pdf</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <p>Tanggal awal</p>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-calendar"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Masuk"
                          name="awal"
                        />
                      </div>
                      <p>Tanggal akhir</p>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-calendar"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Akhir"
                         name="akhir"
                        />
                      </div>
                      <div>
                        <button class="btn btn-danger form-control" type="submit">
                            <i class="bi bi-file-earmark-spreadsheet"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            <form class="form-horizontal form-label-left" action="<?php
            if ($kunci == 'view_siswa') {
                echo base_url('home/pdf_siswa');
            } else if ($kunci == 'view_barang_masuk') {
                echo base_url('home/pdf_bm');
            } else if ($kunci == 'view_penjualan') {
                echo base_url('home/pdf_p');
            }
            ?>" method="post">
                  <div class="row">
                <!-- Basic -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Print Excel</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <p>Tanggal awal</p>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-calendar"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Masuk"
                          name="awal"
                        />
                      </div>
                      <p>Tanggal akhir</p>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-calendar"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Akhir"
                         name="akhir"
                        />
                      </div>
                      <div>
                        <a>
                        <button class="btn btn-success form-control">
                            <i class="bi bi-file-earmark-spreadsheet"></i>
                        </button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
           
</div>
</div>
</div>