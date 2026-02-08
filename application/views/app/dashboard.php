<div class="row">
    <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="avatar-text avatar-lg bg-primary-soft text-primary">
                            <i class="feather-file-text"></i>
                        </div>
                        <div>
                            <div class="fs-4 fw-bold text-dark">
                                <span class="counter"><?php echo $total_news; ?></span>
                            </div>
                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Berita</h3>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?php echo base_url('news') ?>"
                            class="fs-12 fw-medium text-muted text-truncate-1-line">
                            Lihat Semua Berita <i class="feather-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="progress mt-2 ht-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="avatar-text avatar-lg bg-warning-soft text-warning">
                            <i class="feather-list"></i>
                        </div>
                        <div>
                            <div class="fs-4 fw-bold text-dark">
                                <span class="counter"><?php echo $total_category; ?></span>
                            </div>
                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Kategori</h3>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="<?php echo base_url('category') ?>"
                            class="fs-12 fw-medium text-muted text-truncate-1-line">
                            Kelola Kategori <i class="feather-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="progress mt-2 ht-3">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="avatar-text avatar-lg bg-success-soft text-success">
                            <i class="feather-message-circle"></i>
                        </div>
                        <div>
                            <div class="fs-4 fw-bold text-dark">
                                <span class="counter"><?php echo $total_comment; ?></span>
                            </div>
                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Komentar Masuk</h3>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                            Moderasi Komentar <i class="feather-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="progress mt-2 ht-3">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-4">
                    <div class="d-flex gap-4 align-items-center">
                        <div class="avatar-text avatar-lg bg-info-soft text-info">
                            <i class="feather-users"></i>
                        </div>
                        <div>
                            <div class="fs-4 fw-bold text-dark">
                                <span class="counter"><?php echo $total_user; ?></span>
                            </div>
                            <h3 class="fs-13 fw-semibold text-truncate-1-line">Admin & Staff</h3>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                            Kelola Pengguna <i class="feather-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="progress mt-2 ht-3">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Berita Terbaru</h5>
                <div class="card-header-action">
                    <a href="<?php echo base_url('news/create') ?>" class="btn btn-sm btn-primary">
                        <i class="feather-plus me-1"></i> Buat Berita
                    </a>
                </div>
            </div>
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="border-b">
                                <th scope="row">Judul Berita</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th class="text-center">Views</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($latest_news)): ?>
                            <tr>
                                <td colspan="6" class="text-center p-3">Belum ada berita.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($latest_news as $row): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-image">
                                            <img src="<?php echo base_url('cloud/' . $row->image) ?>" alt=""
                                                class="img-fluid rounded"
                                                style="width:40px; height:40px; object-fit:cover;"
                                                onerror="this.src='<?php echo base_url('assets/images/default.jpg')?>'" />
                                        </div>
                                        <div>
                                            <span class="d-block fw-bold text-truncate" style="max-width: 250px;">
                                                <?php echo $row->title; ?>
                                            </span>
                                            <span class="fs-12 d-block fw-normal text-muted">
                                                <?php echo date('d M Y, H:i', strtotime($row->created_at)); ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-soft-primary text-primary">
                                        <?php echo $row->category_name; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="fs-13 text-dark"><?php echo $row->full_name; ?></span>
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-gray-200 text-dark">
                                        <i class="feather-eye me-1"></i>
                                        <?php echo number_format($row->views); ?>
                                    </span>
                                </td>

                                <td>
                                    <?php if ($row->news_status == '1'): ?>
                                    <span class="badge bg-soft-success text-success">Tayang</span>
                                    <?php else: ?>
                                    <span class="badge bg-soft-warning text-warning">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?php echo base_url('news/edit/'.$row->id_news) ?>"
                                        class="btn btn-sm btn-light">
                                        <i class="feather-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="<?php echo base_url('news') ?>" class="fs-11 fw-bold text-uppercase">Lihat Semua Berita</a>
            </div>
        </div>
    </div>
</div>