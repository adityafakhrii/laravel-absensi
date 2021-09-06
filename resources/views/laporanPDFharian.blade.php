<body style="    
	color: #2E3849;
    font-family: 'Ruda', sans-serif;
    font-size: 13px;">

	
	<section id="container">
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body" style="font-weight: 900px;">
                <div class="pull-left">
                  <h1 align="center" style="
	                  @import url(http://fonts.googleapis.com/css?family=Ruda:400,700,900);
	                  font-size: 18px;
	                  font-family: 'Ruda', sans-serif;
								    font-weight: 500;
								    line-height: 1.1px;
								    color: inherit;"><b> Laporan Absensi Karyawan Tanggal {{date("d-m-Y")}}</b>
							  	</h1>
                  
                </div>
                <!-- /pull-left -->
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                
                <div class="row">
	                  <!-- /col-md-9 -->
	                  <div class="col-md-3">
	                    <br>
	                    <div style="margin-bottom: 5px;">
		                    <i>Diunduh pada : {{date('d-m-Y H:i:s')}}</i>
	                    	
	                    </div>
	                    <div class="well well-small green" style="
	                    	background-color: #1C3FAA;
										    border: none;
										    height: 1px;
										    width: auto;
					   						margin-bottom: 10px">
	                  	</div>
		                </div>
                <!-- /col-lg-10 -->
                <table border="" class="table" style="width: 100%;
							    max-width: 100%;
							    margin-bottom: 20px;
									background-color: transparent;
									border-spacing: 0;
			  					border-collapse: collapse;
							  ">
                  <thead>
                    <tr>
	                    <td>Tanggal</td>
	                    <td>NIK</td>
	                    <td>Nama</td>
	                    <td align="center">Waktu Masuk</td>
	                    <td align="center">Waktu Keluar</td>
	                    <td align="center">Status</td>
	                </tr>
                  </thead>
                  <tbody>
                  	@forelse($data_absen as $absen)
                      <tr>
                          <td>{{$absen->tgl}}</td>
                          <td>{{$absen->nik}}</td>
                          <td>{{$absen->nama}}</td>
			                    <td align="center">{{$absen->masuk}}</td>
			                    <td align="center">{{$absen->keluar}}</td>
			                    <td align="center">{{$absen->status}}</td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="6" align="center"><b>TIDAK ADA DATA UNTUK DITAMPILKAN</b></td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
                <br>
                <br>
            </div>
              
      </section>
    </section>
</section>
	
</body>