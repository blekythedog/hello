                    <a href="<?= base_url('home/tambah_barang') ?>" style="padding-left : 25px; padding-top : 10px;">
                        <button class="btn btn-success">
                            <i class="bi bi-bag-plus"></i>
                        </button>
                    </a>
            <div class="container" style="padding-top : 20px;">
            <div class="card">
                <h5 class="card-header">Data Barang Masuk</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                        $no = 1;
                        foreach ($dt as $table)
                        { ?>
                      <tr>
                        <td> 
                            <strong><?php echo $no++; ?></strong>
                        </td>
                        <td>
                            <?= $table->nama_barang ?>
                        </td>
                        <td>
                            <?= $table->nama_supplier ?>
                        </td>
                        <td>
                        <?= $table->jumlah ?>
                        </td>
                        <td>
                        <?= $table->tanggal_masuk ?>
                        </td>
                        <td>
                           <a>
                            <button class="btn btn-primary">
                                <i class="bi bi-pen"></i>
                            </button>
                           </a>
                           <a>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                           </a>
                        </td>
                        </tr>
                        <?php } ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
</div>