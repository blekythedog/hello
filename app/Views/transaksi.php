<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pay / </span>Transaksi</h4>

              <div class="row">
                <!-- Basic -->
                <form action="<?= base_url('home/proses_transaksi') ?>" method="post">                
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Checkout</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <!-- <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>"> -->
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-box" disabled value="<?= $dt->nama_barang ?>"></i></span>
                        <select class="form-control" name="keranjang">
                        <?php foreach ($dt as $table) {
                                            ?>
                                                <option value="<?= $table->id_barang ?>">
                                                    <?= $table->nama_barang ?>
                                                </option>
                                            <?php } ?>
                        </option>
                       </select>
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-eyedropper"></i></span>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="total pesan"
                          name="total_pesan"
                        />
                      </div>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"><i class="bi bi-people"></i></span>
                        <label class="form-control" name="harga" value="<?= $table->id_barang ?>"><?= $table->harga ?></label>
                        </div>
                      <div>
                        <a>
                        <button class="btn btn-primary form-control" type="submit">
                            Submit
                        </button>
                        </a>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>

                <script>
  // Get the input field for "total pesan" and the label for harga
  const totalPesanInput = document.querySelector('input[name="total_pesan"]');
  const hargaLabel = document.querySelector('label[name="harga"]');

  // Store the original harga value
  const originalHarga = parseInt(hargaLabel.textContent);

  // Add event listener to the "total pesan" input field
  totalPesanInput.addEventListener('input', function() {
    // Get the value entered in the "total pesan" input field
    const totalPesanValue = parseInt(this.value);

    // Check if the entered value is a valid number
    if (!isNaN(totalPesanValue)) {
      // Get the original harga value
      const harga = parseInt(hargaLabel.textContent);

      // Calculate the new harga by multiplying the original harga with the total pesan value
      const newHarga = harga * totalPesanValue;

      // Update the displayed harga
      hargaLabel.textContent = newHarga;
    }
  });

  // Add event listener to handle backspace key press
  totalPesanInput.addEventListener('keydown', function(event) {
    if (event.key === 'Backspace' || event.key === 'Delete') {
      // Restore the original harga value
      hargaLabel.textContent = originalHarga;
    }
  });
</script>


