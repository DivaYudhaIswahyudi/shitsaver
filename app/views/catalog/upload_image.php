<?php $this->view("catalog/header", $data); ?>

<div style="margin: auto; max-width: 600px; width:100%; padding: 2em;">
<style>.col-6.tm-text-primary {width: 100%;}</style>
<h2 class="col-6 tm-text-primary">Upload Your Image</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Image Title" required>
            <small class="form-text text-muted">Add a title to your image.</small>
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Image Description" rows="4"></textarea>
            <small class="form-text text-muted">Add a description to your image.</small>
        </div>
        <div class="form-group">
            <input type="file" name="file" class="btn">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>
</div>

<?php $this->view("catalog/footer", $data); ?>
