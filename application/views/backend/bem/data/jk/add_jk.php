<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Proposal Kegiatan dan Pendanaan <small>Tambah Proposal Kegiatan dan Pendaan</small></h2>
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
                    <?php echo form_open_multipart('bem/save_kegiatan'); ?>
                    <!-- <form method="post" action="<?php echo site_url('ukm/save_proposal') ?>"> -->
                    <input type="hidden" name="id_bs" value="<?php echo $session_user->ID_BS ?>">
                    <input type="hidden" name="id_pkp" value="<?php echo $pkp->ID_PKP ?>">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Judul <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" placeholder="Masukkan Judul Proposal" name="judul"
                                value="<?php echo $pkp->JUDUL ?>" readonly id="first-name" required="required"
                                class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal
                            Pengesahan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" name="pengesahan" class="form-control" id="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal
                            Pelaksanaan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="date" readonly name="pelaksanaan" class="form-control" id=""
                                value="<?php echo $pkp->TANGGAL ?>">
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

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Proposal Kegiatan dan Pendanaan</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <th>Tanggal Pengesahan</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jk as $val) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $val->JUDUL; ?></td>
                            <td><?php echo $val->STAT; ?></td>
                            <td><?php echo $val->TANGGAL_PENGESAHAN; ?></td>
                            <td><?php echo $val->TANGGAL_PELAKSANAAN; ?></td>
                            <td align="center">
                                <?php
                                    if ($val->STAT == "ON GOING") {
                                        echo "ON GOING";
                                    } else if ($val->STAT == "Y") {
                                        echo "Diterima";
                                    } else {
                                        echo "Ditolak";
                                    } ?>
                            </td>
                        </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>