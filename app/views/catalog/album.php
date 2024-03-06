<?php $this->view("catalog/header", $data); ?>

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
    data-image-src="<?= ASSETS ?>catalog/img/hero.jpg"></div>

<div class="container-fluid tm-mt-60">
    <div class="row tm-mb-50">
        <div class="col-lg-4 col-12 mb-5">
            <h2 class="tm-text-primary mb-5">Album Page</h2>
            <form id="album-form" action="<?= ROOT ?>album/add" method="POST" class="tm-contact-form mx-auto">
                <div class="form-group">
                    <label for="title" class="tm-text-primary">Album Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description" class="tm-text-primary">Album Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Album</button>
            </form>
        </div>
        <div class="col-lg-4 col-12 mb-5">
            <!-- Additional content for the second column if needed -->
        </div>
        <div class="col-lg-4 col-12">
            <!-- Additional content for the third column if needed -->
        </div>
    </div>
    <div class="row tm-mb-74 tm-people-row">
        <!-- Additional content or display of existing albums/people -->
    </div>
</div> <!-- container-fluid, tm-container-content -->

<?php $this->view("catalog/footer"); ?>

