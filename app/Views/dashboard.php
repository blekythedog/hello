<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang Di Kasir HandPhone , <?php if(session()->get('level') == 1)
                          {
                            echo 'Admin';
                          } else{
                            echo 'Petugas';
                          } ?> 🎉</h5>
                          <p class="mb-4">
                          <span class="fw-bold">Semangatt!!</span> Makin banyak terjual, Bonus akan tambah!!
                          </p>

                          <a href="<?= base_url('home/barang') ?>" class="btn btn-sm btn-outline-primary">View barang</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>