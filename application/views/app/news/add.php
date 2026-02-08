<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-sm-0">Tambah Berita Baru</h4>
            <?php if ($this->session->flashdata('failed')) : ?>

            <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                <strong><?php echo $this->session->flashdata('failed'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')) : ?>

            <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <?php if (validation_errors()): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading"><i class="fas fa-exclamation-circle"></i> Gagal Menyimpan!</h5>
                <hr>
                <?php echo validation_errors(); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <div class="page-title-right">
                <a href="<?php echo base_url('news') ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<form id="formNews" action="<?php echo base_url('news/submit') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <div class="mb-4">
                        <label for="title" class="form-label font-weight-bold">Judul Berita <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="title" id="title"
                            placeholder="Masukkan judul berita yang menarik..." required>
                    </div>

                    <div class="mb-3">
                        <label for="textarea-input" class="form-label">Deskripsi</label>
                        <div id="toolbar-container">

                            <span class="ql-formats">
                                <button class="ql-bold"></button>
                                <button class="ql-italic"></button>
                                <button class="ql-underline"></button>
                            </span>

                            <span class="ql-formats">
                                <button class="ql-list" value="ordered"></button>
                                <button class="ql-list" value="bullet"></button>
                            </span>

                        </div>
                        <div id="editor-news-add">
                        </div>
                        <input type="hidden" name="content" id="konten-news">
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Gambar Thumbnail</h6>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img id="imgPreview" src="<?php echo base_url('assets/images/default.jpg') ?>" alt="Preview"
                            class="img-fluid rounded border" style="max-height: 200px; object-fit: cover;">
                    </div>

                    <div class="mb-2">
                        <input class="form-control form-control-sm" type="file" name="image" id="imageInput"
                            accept="image/*">
                    </div>
                    <small class="text-muted">Format: JPG/PNG. Max: 2MB.</small>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Publikasi</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="id_category" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat->id_category ?>">
                                <?php echo $cat->category_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="news_status" class="form-select">
                            <option value="1">Publish (Tayang)</option>
                            <option value="0">Draft (Simpan Saja)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_headline" name="is_headline"
                                value="1">
                            <label class="form-check-label" for="is_headline">Jadikan Headline?</label>
                        </div>
                        <small class="text-muted" style="font-size: 11px;">
                            Jika aktif, berita akan muncul di slider utama aplikasi Android.
                        </small>
                    </div>

                    <hr>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
// Script untuk Preview Gambar sebelum diupload
document.getElementById('imageInput').onchange = function(evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

    // FileReader support
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function() {
            document.getElementById('imgPreview').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }
}
</script>