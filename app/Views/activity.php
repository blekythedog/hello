<div class="container" style="padding-top : 50px;">
<div class="card">
                <h5 class="card-header">Data Log Activity</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Log Activity</th>
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
                        <?php if ($table->jumlah > 0){
                            echo 'sudah terinput';
                        } ?> 
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