<div class="container">
	<div class="row">
		<p class="text-center" style="font-size: 17px"><b>PEMBERITAHUAN IMPOR BARANG UNTUK DITIMBUN <br>DI TEMPAT PENIMBUNAN BERIKAT</b></p>
	</div>
	
	<form action="">
		<div class="form-group row">
			<label for="status" class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-2">
				<input style="border: none;" type="text" readonly class="form-control" id="status" value="EDIT">
			</div>
		</div>

		<div class="form-group row">
			<label for="status_perbaikan" class="col-sm-2 col-form-label">Status Perbaikan</label>
			<div class="col-sm-2">
				<input style="border: none;" type="text" readonly class="form-control" id="status_perbaikan" value="-">
			</div>
		</div>
		
		<!-- FORM NOMOR PENGAJUAN -->
		<div style="margin-top: 30px;">
			<div class="form-group row">
				<label for="nomor_pengajuan" class="col-sm-2 col-form-label">Nomor Pengajuan</label>
				<div class="col-sm-4">
					<input type="text" readonly class="form-control" id="nomor_pengajuan" value="100056019399911939">
				</div>
			</div>

			<div class="form-group row">
				<label for="nomor_pendaftaran" class="col-sm-2 col-form-label">Nomor Pendaftaran</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nomor_pendaftaran" value="">
				</div>
			</div>

			<div class="form-group row">
				<label for="tanggal_pendaftaran" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="tanggal_pendaftaran" value="" placeholder="DDMMYY">
				</div>
			</div>		
		</div>
		<!-- TUTUP FORM NOMOR PENGAJUAN -->
		
		<!-- FORM KPPBC BONGKAR -->
		<div style="margin-top: 30px;">
			<div class="form-group row">
				<label for="kppbc_bongkar" class="col-sm-2 col-form-label">KPPBC Bongkar</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kppbc_bongkar" value="030100">
				</div>
			</div>

			<div class="form-group row">
				<label for="kppbc_pengawas" class="col-sm-2 col-form-label">KPPBC Pengawas</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kppbc_pengawas" value="070100">
				</div>
			</div>

			<div class="form-group row">
				<label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
				<div class="col-sm-4">
					<select id="inputState" class="form-control">
				        <option selected>Choose...</option>
				        <option>...</option>
			        </select>
				</div>
			</div>		
		</div>
		<!-- TUTUP FORM KPPBC BONGKAR -->
		

		<div class="row">
			<div class="col-sm-12">

				<!-- FORM LEFT SIDE -->
				<ol>
					<div class="col-sm-6">
						<p><b>PEMASOK</b></p>
							<!-- FORM PEMASOK -->
							<div>
								<div class="form-group row">
									<li>
										<label for="nama" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="nama" value="Muhammad Ali Rodhi">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>

								<div class="form-group row">
									<label for="Negara" class="col-sm-3 col-form-label">Negara</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>
							</div>
							<!-- TUTUP FORM PEMASOK -->		
						
							<!-- FORM IMPORTIR -->
							<div>
								<p style="margin-left: -38px"><b>IMPORTIR</b></p>
									
								<div class="form-group row">
									<li>
										<label for="nama" class="col-sm-3 col-form-label">Identitas</label>
										<div class="col-sm-4">
											<select id="inputState" class="form-control">
										        <option selected>NPWP</option>
										        <option>...</option>
									        </select>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama" placeholder="10005696969699">
										</div>
									</li>
								</div>	
								
								<div class="form-group row">
									<li>
										<label for="alamat" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="alamat" value="070100">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">No Izin</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>
								

								<div class="form-group row">
									<li>
										<label for="Negara" class="col-sm-3 col-form-label">API</label>
										<div class="col-sm-4">
											<select id="inputState" class="form-control">
										        <option selected>APIP</option>
										        <option>...</option>
									        </select>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="070100">
										</div>
									</li>
								</div>
							</div>
							<!-- TUTUP FORM IMPORTIR -->

							<!-- FORM PEMILIK -->
							<div>
								<p style="margin-left: -38px"><b>PEMILIK</b></p>
									
								<div class="form-group row">
									<li>
										<label for="nama" class="col-sm-3 col-form-label">Identitas</label>
										<div class="col-sm-4">
											<select id="inputState" class="form-control">
										        <option selected>NPWP</option>
										        <option>...</option>
									        </select>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama" placeholder="10005696969699">
										</div>
									</li>
								</div>	
								
								<div class="form-group row">
									<li>
										<label for="alamat" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="alamat" value="070100">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>
								

								<div class="form-group row">	
									<label for="Negara" class="col-sm-3 col-form-label">API</label>
									<div class="col-sm-4">
										<select id="inputState" class="form-control">
									        <option selected>APIP</option>
									        <option>...</option>
								        </select>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="alamat" placeholder="070100">
									</div>
								
								</div>
							</div>
							
							<!-- FORM PPJK -->
							<div>
								<p style="margin-left: -38px"><b>PPJK</b></p>
									
								<div class="form-group row">
									<li>
										<label for="nama" class="col-sm-3 col-form-label">Identitas</label>
										<div class="col-sm-4">
											<select id="inputState" class="form-control">
										        <option selected>NPWP</option>
										        <option>...</option>
									        </select>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama" placeholder="10005696969699">
										</div>
									</li>
								</div>	
								
								<div class="form-group row">
									<li>
										<label for="alamat" class="col-sm-3 col-form-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="alamat" value="070100">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="alamat" value="070100">
									</div>
								</div>
								

								<div class="form-group row">
									<li>
										<label for="Negara" class="col-sm-3 col-form-label">NP-PPJK</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="">
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="DDMMYY">
										</div>
									</li>
								</div>
							</div>
							<!-- TUTUP FORM PPJK -->
							
							<!-- FORM PENGANGKUTAN -->
							<div>
								<p style="margin-left: -38px"><b>PENGANGKUTAN</b></p>
									
								<div class="form-group row">
									<li>
										<label for="nama" class="col-sm-3 col-form-label">Cara Pengangkutan</label>
										<div class="col-sm-6">
											<select id="inputState" class="form-control">
										        <option selected>NPWP</option>
										        <option>...</option>
									        </select>
										</div>
									</li>
								</div>	
								
								<div class="form-group row">
									<li>
										<label for="alamat" class="col-sm-3 col-form-label">Nama Sarana Pengangkut</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="alamat" value="070100">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<label for="alamat" class="col-sm-3 col-form-label">Voy/Flight & Negara</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="alamat" value="052SM">
									</div>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="alamat" value="VN">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="alamat" value="Vietnam">
									</div>
								</div>
								
								<div class="form-group row">
									<li>
										<label for="Negara" class="col-sm-3 col-form-label">Pelabuhan Muat</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="VNSGN">
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="Ho Ci Mint City">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<li>
										<label for="Negara" class="col-sm-3 col-form-label">Pelabuhan Transit</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="alamat" placeholder="070100">
										</div>
									</li>
								</div>

								<div class="form-group row">
									<li>
										<label for="Negara" class="col-sm-3 col-form-label">Pelabuhan Bongkar</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="IDTPE">
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="alamat" placeholder="Tanjung Perak">
										</div>
									</li>
								</div>
							</div>
							<!-- TUTUP FORM PENGANGKUTAN -->	
					</div>
					<!-- TUTUP FORM LEFT SIDE -->


					<!-- FORM RIGHT SIDE -->
					<div class="col-sm-6" style="padding-right: 50px;">
						<p><b>DOKUMEN</b></p>
						<div class="form-group row">
							<li>
								<label for="nama" class="col-sm-3 col-form-label">Invoice</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="nama" value="IV20190831">
								</div>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="nama" value="2019-08-31">
								</div>
							</li>
						</div>

						<div class="form-group row">
							<li>
								<label for="kppbc_pengawas" class="col-sm-3 col-form-label">Fasilitas Impor</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="kppbc_pengawas" value="">
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="kppbc_pengawas" placeholder="DDMMYY">
								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" id="kppbc_pengawas" value="">
								</div>
							</li>
						</div>

						<div class="form-group row">
							<li>
								<label for="tujuan" class="col-sm-10 col-form-label">Surat Keputusan / Dokumen Lainnya</label>
							</li>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<table class="table table-sm">
								  <thead>
								    <tr class="bg-success">
								      <th scope="col">#</th>
								      <th scope="col">First</th>
								      <th scope="col">Last</th>
								      <th scope="col">Handle</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>Mark</td>
								      <td>Otto</td>
								      <td>@mdo</td>
								    </tr>
								    <tr>
								      <th scope="row">2</th>
								      <td>Jacob</td>
								      <td>Thornton</td>
								      <td>@fat</td>
								    </tr>
								    <tr>
								      <th scope="row">3</th>
								      <td colspan="2">Larry the Bird</td>
								      <td>@twitter</td>
								    </tr>
								  </tbody>
								</table>
							</div>
						</div>

					</ol>			
				</div>		
				<!-- TUTUP FORM RIGHT SIDE -->

			</div>
		</div>
	</form>

</div>
<!-- TUTUP CONTAINER -->
