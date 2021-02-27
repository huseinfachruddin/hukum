

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?=$title?></h1>
           <!-- Content Row -->
           <div class="row">

<!-- Earnings (Monthly) Card Example -->
<a class="col-xl-3 col-md-6 mb-4" href="<?=base_url('admin/data_user')?>">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body ">
      <div class="row no-gutters align-items-center ">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">User</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-address-book fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a>

<!-- Earnings (Monthly) Card Example -->
<a class="col-xl-3 col-md-6 mb-4" href="<?=base_url('admin/content')?>">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Content</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a>

<!-- Earnings (Monthly) Card Example -->
<a class="col-xl-3 col-md-6 mb-4" href="<?=base_url('admin/kategory')?>">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Kategory</div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-book fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a>

<!-- Pending Requests Card Example -->
<!-- <a class="col-xl-3 col-md-6 mb-4" href="">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Perkara</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-gavel fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</a> -->
</div>

<div class="row">
        	 <!-- Area Chart -->
   <div class="card shadow mb-4 col-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">User Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                  <canvas id="myChart"></canvas>
                  </div>
                  <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                      type: 'doughnut',
                      data: {
                              labels: [<?php foreach ($data_user as $row)
                            { echo '"'.$row->role.'",';}?>],
                        datasets: [{
                          label: '# of Votes',
                          data: [<?php foreach ($data_user as $row)
                            { echo '"'.$row->jumlah.'",';}?>],
                          backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth: 1
                        }]
                      }
                    });
	               </script>
                </div>
       </div>
       <div class="card shadow mb-4 col-8">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Content Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                  <canvas id="myChart2"></canvas>
                  </div>
                  <script>
		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php foreach ($data_content as $row)
                            { echo '"'.$row->date.'",';}?>],
				datasets: [{
					label: '# of Votes',
					data: [<?php foreach ($data_content as $row)
{ echo '"'.$row->jumlah.'",';}?>],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
  </div>

 
                </div>
       </div>
      
        <!-- /.container-fluid -->
        
 

 
 

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SOL <?= date('Y')?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

