<div class="right_col" role="main">
    <!-- <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Jadwal Kegiatan <small>Tambah Jadwal Kegiatan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="<?php echo site_url('bem/save_kegiatan') ?>">
                        <input type="hidden" name="id_bs" value="<?php echo $session_user->ID_BS ?>">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Judul <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="judul" id="first-name" required="required"
                                    class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deskripsi <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal
                                Kegiatan<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="datetime-local" name="pengesahan" class="form-control" id="">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Proposal Kegiatan dan Pendanaan Pepek</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Proposal</th>
                            <th>Proposal</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pkp as $val) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $val->JUDUL; ?></td>
                                <td><?php echo $val->PROPOSAL; ?></td>
                                <td><?php echo $val->TANGGAL; ?></td>
                                <td>
                                    <?php
                                    if ($val->STAT == "X") {
                                        echo "Pengajuan";
                                    } else if ($val->STAT == "Y") {
                                        echo "Diterima";
                                    } else {
                                        echo "Ditolak";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('bem/reject/' . $val->ID_PKP); ?>" class="btn btn-danger">Ditolak</a>
                                    <a href="<?php echo site_url('bem/acc/' . $val->ID_PKP); ?>" class="btn btn-success">Diterima</a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
            <div class="x_content">
                <br />
                <form method="post" action="<?php echo site_url('bem/proposal') ?>">
                    <input type="hidden" name="id_bs" value="<?php echo $session_user->ID_BS ?>">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pilih Status Laporan
                            Proposal<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select name="status" id="" class="form-control">
                                <option value="Z">Ditolak</option>
                                <option value="Y">Diterima</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php if (!empty($hasil)) { ?>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Proposal</th>
                                <th>Proposal</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($hasil as $val) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $val->JUDUL; ?></td>
                                    <td><?php echo $val->PROPOSAL; ?></td>
                                    <td><?php echo $val->TANGGAL; ?></td>
                                    <td align="center">
                                        <?php
                                        if ($val->STAT == "X") {
                                            echo "Pengajuan";
                                        } else if ($val->STAT == "Y") {
                                            echo "Diterima";
                                        } else {
                                            echo "Ditolak";
                                        } ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('bem/add_jk/' . $val->ID_PKP) ?>" class="btn btn-info">Tambah</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                <?php } else {
                echo "Tidak ada data yang ditemukan untuk rentang tanggal yang dimasukkan.";
            } ?>
                </div>
        </div>
    </div>

</div>