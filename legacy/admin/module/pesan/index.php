<h4><b>Data Pesan Kontak</b></h4>
<br />
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM pesan_kontak ORDER BY id DESC";
                    $row = $config->prepare($sql);
                    $row->execute();
                    $hasil = $row->fetchAll();
                    $no = 1;
                    foreach($hasil as $isi){
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['nama'];?></td>
                    <td><?php echo $isi['email'];?></td>
                    <td><?php echo $isi['subjek'];?></td>
                    <td><?php echo $isi['pesan'];?></td>
                    <td><?php echo $isi['tanggal'];?></td>
                </tr>
                <?php $no++; }?>
            </tbody>
        </table>
    </div>
</div>