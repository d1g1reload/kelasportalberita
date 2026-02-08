<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-sm-0">Edit Berita</h4>
            <div class="page-title-right">
                <a href="<?php echo base_url('news') ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('failed')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <strong><?php echo $this->session->flashdata('failed'); ?></strong>
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

<form id="formNews" action="<?php echo base_url('news/update') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <input type="hidden" name="id_news" value="<?php echo $news->id_news; ?>">

                    <div class="mb-4">
                        <label for="title" class="form-label font-weight-bold">Judul Berita <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" name="title" id="title"
                            value="<?php echo $news->title; ?>" required>
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

                        <div id="editor-news-add"></div>

                        <input type="hidden" name="content" id="konten-news"
                            value="<?php echo htmlspecialchars($news->content); ?>">
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
                        <?php
                            $img_src = ($news->image && file_exists('./cloud/'.$news->image))
                                ? base_url('cloud/'.$news->image)
                                : base_url('assets/images/default.jpg');
                ?>
                        <img id="imgPreview" src="<?php echo $img_src; ?>" alt="Preview"
                            class="img-fluid rounded border" style="max-height: 200px; object-fit: cover;">
                    </div>

                    <div class="mb-2">
                        <input class="form-control form-control-sm" type="file" name="image" id="imageInput"
                            accept="image/*">
                    </div>
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    <input type="hidden" name="old_image" value="<?php echo $news->image; ?>">
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
                            <?php $selected = ($cat->id_category == $news->id_category) ? 'selected' : ''; ?>
                            <option value="<?php echo $cat->id_category ?>" <?php echo $selected; ?>>
                                <?php echo $cat->category_name ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="news_status" class="form-select">
                            <option value="1" <?php echo ($news->news_status == '1') ? 'selected' : ''; ?>>
                                Publish (Tayang)</option>
                            <option value="0" <?php echo ($news->news_status == '0') ? 'selected' : ''; ?>>Draft
                                (Simpan Saja)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_headline" name="is_headline"
                                value="1" <?php echo ($news->is_headline == 1) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="is_headline">Jadikan Headline?</label>
                        </div>
                    </div>

                    <hr>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Setup Quill
    if (document.querySelector('#editor-news-add')) {
        var quill = new Quill('#editor-news-add', {
            modules: {
                toolbar: '#toolbar-container'
            },
            theme: 'snow',
            placeholder: 'Tulis deskripsi berita...'
        });

        // 2. LOAD DATA LAMA (PENTING!)
        // Ambil isi dari input hidden, lalu masukkan ke Editor
        var hiddenInput = document.querySelector('#konten-news');
        if (hiddenInput.value) {
            // Kita gunakan method dangerousPasteHTML atau root.innerHTML
            quill.root.innerHTML = hiddenInput.value;
            // Decode HTML entities jika perlu (biasanya otomatis oleh browser/quill)
        }

        // 3. SYNC SAAT MENGETIK
        quill.on('text-change', function() {
            hiddenInput.value = quill.root.innerHTML;
        });

        // 4. SYNC SAAT SUBMIT
        var myForm = document.getElementById('formNews');
        if (myForm) {
            myForm.addEventListener('submit', function(e) {
                hiddenInput.value = quill.root.innerHTML;
            });
        }
    }

    // Image Preview Logic
    document.getElementById('imageInput').onchange = function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById('imgPreview').src = fr.result;
            }
            fr.readAsDataURL(files[0]);
        }
    }
});
</script>