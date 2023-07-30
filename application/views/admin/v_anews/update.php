<div class="block-header">
	<h2>
		Edit Artikel
	</h2>
</div>
<!-- Basic Validation -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>Edit Data Artikel</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $news->id ?>">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="keyword" value="<?= isset($news->keyword) ? $news->keyword : '' ?>">
							<label class="form-label">Kata Kunci</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="slug" value="<?= isset($news->slug) ? $news->slug : '' ?>">
							<label class="form-label">Slug</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="description" value="<?= isset($news->description) ? $news->description : '' ?>">
							<label class="form-label">Meta Deskripsi</label>
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="title" value="<?= isset($news->title) ? $news->title : '' ?>" required>
							<label class="form-label">Judul*</label>
						</div>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Status Publish</label>
						<div class="form-line">
							<select name="is_publish" id="is_publish" class="form-control show-tick">
								<option value="0" <?= $news->is_publish == '0' ? 'selected' : '' ?>>Draft</option>
								<option value="1" <?= $news->is_publish == '1' ? 'selected' : '' ?>>Publish</option>
							</select>
						</div>
					</div>
					<div class="form-group form-float">
						<span>Thumbnail</span>
                        <input name="thumbnail" id="thumbnail" type="file" multiple style="margin-top:10px!important" onchange="return fileValidation()"><br>

						<?php if(isset($news->thumbnail)){ ?>
							<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url('/upload/artikel/'.$news->thumbnail); ?>" alt="your image" />
						</div>
						<?php }else{ ?>
						<div id="slider">
							<img class="img-thumbnail" width="200px" height="200px" src="<?php echo base_url(); ?>/assets/admin/images/tidak-ada.png" alt="your image" />
						</div>
						<?php } ?>
					</div>
					<div class="form-group form-float">
						<label class="form-label">Konten:</label>
						<div class="form-line">
						<textarea name="content" id="content" rows="15" class="form-control"><?= isset($news->content) ? $news->content : '' ?></textarea>
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">Kirim</button>
					<a href="<?= site_url('v2/user/news') ?>" class="btn btn-primary waves-effect">Batal</a>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Validation -->

<script type='text/javascript'> 
	// tinymce.init({ selector:'textarea#content', menubar:'', theme: 'modern'});
	$(document).ready(function() {
         0 < $("#content").length && tinymce.init({
             selector: "textarea#content",
             height: 400,
             plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"
             ],
             toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
             style_formats: [{
                 title: "Bold text",
                 inline: "b"
             }, {
                 title: "Red text",
                 inline: "span",
                 styles: {
                     color: "#ff0000"
                 }
             }, {
                 title: "Red header",
                 block: "h1",
                 styles: {
                     color: "#ff0000"
                 }
             }, {
                 title: "Example 1",
                 inline: "span",
                 classes: "example1"
             }, {
                 title: "Example 2",
                 inline: "span",
                 classes: "example2"
             }, {
                 title: "Table styles"
             }, {
                 title: "Table row 1",
                 selector: "tr",
                 classes: "tablerow1"
             }]
         })
     });
</script>

<script type="text/javascript">

function fileValidation() {
    var fileInput = document.getElementById('thumbnail');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        toastr.error('File harus format .jpeg/.jpg/.png/.gif only.', 'Warning', {
            timeOut: 5000
        }, toastr.options = {
            "closeButton": true
        });
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0].size > 1000240) {
            toastr.error('File harus maksimal 1 MB', 'Warning', {
                timeOut: 5000
            }, toastr.options = {
                "closeButton": true
            });
            fileInput.value = '';
            return false;
        } else if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('slider').innerHTML = '<img width="300px" heiht="300px"  src="' + e.target
                    .result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

$('#form_validation').submit(function(e) {
    var data = $(this).serialize();
    // var data = new FormData($(this)[0]);
	var content = tinymce.activeEditor.getContent();
    $('#content').val(content);
    $.ajax({
            // method: 'POST',
            beforeSend: function() {
                $(".loading2").show();
                $(".loading2").modal('show');
            },
            url: '<?php echo base_url('Admin_news/prosesUpdate'); ?>',
            type: "post",
            enctype: "multipart/form-data",
            // data: data,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
        })
        .done(function(data) {
            var result = jQuery.parseJSON(data);
            console.log(data);
            if (result.status == 'berhasil') {
                document.getElementById("form_validation").reset();
                save_berhasil();
            } else {
                $(".loading2").hide();
                $(".loading2").modal('hide');
                gagal();

            }
        })
    e.preventDefault();
});
</script>

<script>
function save_berhasil() {
    Swal.fire({
        title: "Data berhasil disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "success",
        button: "Ok",
    }).then(function() {
        var link = '<?php echo base_url("Admin_news") ?>';
        window.location.replace(link);
    });
}

function gagal() {
    Swal.fire({
        title: "Data gagal disimpan!",
        text: "Klik Ok untuk melanjutkan!",
        icon: "danger",
        button: "Ok",
        dangerMode: true,
    });
}
</script>
