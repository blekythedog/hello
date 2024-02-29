<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Barang</h4>

              <div class="row">
                <!-- Basic -->
                <form action="<?= base_url('home/pt_barang') ?>" method="post">                
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Tambah Barang</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-box"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Nama Barang"
                          name="nama_barang"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-people"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Kode Barang"
                          name="kode_barang"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-bezier2"></i></span>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="Harga"
                          name="harga"
                        />
                      </div>
                      <!-- <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-diagram-2"></i></span>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="Stok"
                          name="stok"
                        />
                      </div> -->
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-calendar"></i></span>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Masuk"
                        />
                      </div>
                      <div>
                        <a>
                        <button class="btn btn-primary form-control">
                            Submit
                        </button>
                        </a>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>