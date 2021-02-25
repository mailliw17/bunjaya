<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<!-- <h1 class="h3 mb-2 text-gray-800">History Data Mining</h1> -->
	<div class="" style="margin-bottom: 10px;">
		<a class="btn btn-primary btn-sm" type="button" href="<?= base_url('historydatmin') ?>"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
	</div>

	<div class="card shadow mb-4">
		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success" role="alert">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php } else if ($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php } else if ($this->session->flashdata('warning')) { ?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
			</div>
		<?php } else if ($this->session->flashdata('info')) { ?>
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php } ?>
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Knowledge ID : <?php echo $RuleID->id ?></h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm">
					<h5>Min Support: <?php echo $RuleID->min_support ?></h5>
					<h5>Min Confidence: <?php echo $RuleID->min_confidence ?> </h5>
				</div>
				<div class="col-sm">
					<h5>Start Date: <?php echo date("d/M/Y", strtotime($RuleID->start_date)); ?> </h5>

					<h5>End Date: <?php echo date("d/M/Y", strtotime($RuleID->end_date)); ?> </h5>
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->

	<!-- initial array $data_confidence -->
	<?php $data_confidence = []; ?>

	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Confidence dari itemset 3 </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class="display table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Support X U Y </th>
														<th> Support X </th>
														<th> Confidence </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
												<?php $j = 1; ?>
													<?php foreach ($ConfidenceItemset3 as $ConfidenceItemset3) : ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset3->kombinasi1 . " => " . $ConfidenceItemset3->kombinasi2 ?>
															</td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset3->support_xUy ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset3->support_x ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset3->confidence ?></td>
															<?php $keterangan = ($ConfidenceItemset3->confidence <= $ConfidenceItemset3->min_confidence) ? "Tidak Lolos" : "Lolos"; ?>
															<td align="center" width="130"><?php echo $keterangan ?></td>
														</tr>
														<?php
														$j++;
														if ($ConfidenceItemset3->lolos == 1) {
															$data_confidence[] = $ConfidenceItemset3;
														}
														?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->

	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Confidence dari itemset 2 </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">

								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Support X U Y </th>
														<th> Support X </th>
														<th> Confidence </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ConfidenceItemset2 as $ConfidenceItemset2) : ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset2->kombinasi1 . " => " . $ConfidenceItemset2->kombinasi2 ?>
															</td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset2->support_xUy ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset2->support_x ?></td>
															<td align="center" width="130">
																<?php echo $ConfidenceItemset2->confidence ?></td>
															<?php $keterangan = ($ConfidenceItemset2->confidence <= $ConfidenceItemset2->min_confidence) ? "Tidak Lolos" : "Lolos"; ?>
															<td align="center" width="130"><?php echo $keterangan ?></td>
														</tr>
														<?php
														$j++;
														if ($ConfidenceItemset2->lolos == 1) {
															$data_confidence[] = $ConfidenceItemset2;
														}
														?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
 -->
	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Rule Asosiasi </h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered"
												style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> X => Y </th>
														<th> Confidence </th>
														<th> Nilai Uji Lift </th>
														<th> Korelasi Rule </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($data_confidence as $val) { ?>
													<tr>
														<td align="center" width="5"><?php echo $j ?></td>
														<td align="center" width="130">
															<?php echo $val->kombinasi1 . " => " . $val->kombinasi2 ?>
														</td>
														<td align="center" width="130">
															<?php echo $val->confidence ?></td>
														<td align="center" width="130">
															<?php echo $val->nilai_uji_lift ?></td>
														<td align="center" width="130">
															<?php echo $val->korelasi_rule ?></td>
													</tr>
													<?php
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->


	<!-- Satu Tabel -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">
				Hasil Analisis
			</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Knowledge</th>
							<th>Akurasi</th>
						</tr>
					</thead>
					<tbody>
						<?php $j = 1;
						arsort($data_confidence);
						$RADJAWILLIAM = 1; ?>
						<?php foreach ($data_confidence as $val) {
							if ($RADJAWILLIAM > 20)
								break;
							if ($val->confidence == 100) {
								$RADJAWILLIAM++;
						?>
								<tr>
									<td align="center" width="5"><?php echo $j ?></td>
									<td> Jika konsumen membeli <span class="badge badge-pill badge-primary"><?php echo $val->kombinasi1 ?></span> , maka
										konsumen juga akan membeli <span class="badge badge-pill badge-success"><?php echo $val->kombinasi2 ?></span>
									</td>
									<td align="center" width="150">
										<?php echo $val->confidence ?>%</td>
								</tr>
						<?php
							}
							$j++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- EOF Tabel -->

	<!-- Tabel Itemset 1  -->
	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 1</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												 initial array $ItemSet1Lolos 
                                                 <?php $ItemSet1Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ItemSet1 as $ItemSet1) { ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td> <?php echo $ItemSet1->atribut ?></td>
															<td> <?php echo $ItemSet1->jumlah ?></td>
															<td> <?php echo $ItemSet1->support ?></td>
															<td> <?php echo $ItemSet1->lolos == 1 ? "Lolos" : "Tidak Lolos" ?>
															</td>
														</tr>

													<?php
														if ($ItemSet1->lolos == 1) {
															$ItemSet1Lolos[] = $ItemSet1; //item yg lolos itemset1
														}
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->

	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 1 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ItemSet1Lolos as $ItemSet1Lolos) { ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td> <?php echo $ItemSet1Lolos->atribut ?></td>
															<td> <?php echo $ItemSet1Lolos->jumlah ?></td>
															<td> <?php echo $ItemSet1Lolos->support ?></td>
														</tr>
													<?php
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

 -->
	<!-- Tabel Itemset 2  -->
	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 2</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												 initial array $ItemSet2Lolos 
												<?php $ItemSet2Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ItemSet2 as $ItemSet2) { ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td> <?php echo $ItemSet2->atribut1 ?></td>
															<td> <?php echo $ItemSet2->atribut2 ?></td>
															<td> <?php echo $ItemSet2->jumlah ?></td>
															<td> <?php echo $ItemSet2->support ?></td>
															<td> <?php echo $ItemSet2->lolos == 1 ? "Lolos" : "Tidak Lolos" ?>
															</td>
														</tr>

													<?php
														if ($ItemSet2->lolos == 1) {
															$ItemSet2Lolos[] = $ItemSet2; //item yg lolos itemset1
														}
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
 -->
	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 2 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ItemSet2Lolos as $ItemSet2Lolos) { ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td> <?php echo $ItemSet2Lolos->atribut1 ?></td>
															<td> <?php echo $ItemSet2Lolos->atribut2 ?></td>
															<td> <?php echo $ItemSet2Lolos->jumlah ?></td>
															<td> <?php echo $ItemSet2Lolos->support ?></td>
														</tr>
													<?php
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
 -->
	<!-- Tabel Itemset 3  -->
	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Perhitungan Itemset 3</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												 initial array $ItemSet2Lolos 
												<?php $ItemSet3Lolos = []; ?>
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Item 3 </th>
														<th> Jumlah </th>
														<th> Support </th>
														<th> Keterangan </th>
													</tr>
												</thead>
												<tbody>
													<?php $j = 1; ?>
													<?php foreach ($ItemSet3 as $ItemSet3) { ?>
														<tr>
															<td align="center" width="5"><?php echo $j ?></td>
															<td> <?php echo $ItemSet3->atribut1 ?></td>
															<td> <?php echo $ItemSet3->atribut2 ?></td>
															<td> <?php echo $ItemSet3->atribut3 ?></td>
															<td> <?php echo $ItemSet3->jumlah ?></td>
															<td> <?php echo $ItemSet3->support ?></td>
															<td> <?php echo $ItemSet3->lolos == 1 ? "Lolos" : "Tidak Lolos" ?>
															</td>
														</tr>

													<?php
														if ($ItemSet3->lolos == 1) {
															$ItemSet3Lolos[] = $ItemSet3; //item yg lolos itemset3
														}
														$j++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> -->

	<!-- <div class="x_panel">
							<div class="x_title">
								<h2>Itemset 3 Lolos</h2>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<table class=" display table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th> No. </th>
														<th> Item 1 </th>
														<th> Item 2 </th>
														<th> Item 3 </th>
														<th> Jumlah </th>
														<th> Support </th>
													</tr>
												</thead>
												<tbody>
													<?php
													$j = 1;
													if ($ItemSet3Lolos != "") {
														foreach ($ItemSet3Lolos as $ItemSet3Lolos) {
													?>
															<tr>
																<td align="center" width="5"><?php echo $j ?></td>
																<td> <?php echo $ItemSet3Lolos->atribut1 ?></td>
																<td> <?php echo $ItemSet3Lolos->atribut2 ?></td>
																<td> <?php echo $ItemSet3Lolos->atribut3 ?></td>
																<td> <?php echo $ItemSet3Lolos->jumlah ?></td>
																<td> <?php echo $ItemSet3Lolos->support ?></td>
															</tr>
													<?php
															$j++;
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

 -->

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->