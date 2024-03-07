<?php $this->view("catalog/header", $data); ?>

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
data-image-src="<?= ROOT ?>/assets/catalog/img/sparkle.jpg">
    <form class="d-flex tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>

<div class="container-fluid tm-container-content tm-mt-60">
    <?php if (isset($data['image'])): ?>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                <?= $data['image']->title ?>
            </h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="<?= ROOT . $data['image']->image ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <div class="text-center mb-5">
                        <h2 class="tm-text-primary">
                            <?= $data['image']->title ?>
                        </h2>
                    </div>
                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark">Description:</h4>
                        <p class="tm-text-primary">
                            <?= $data['description'] ?>
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="tm-text-gray-dark">Comments:</h4>
                        <?php if (!empty($data['comments'])): ?>
                            <ul id="commentsList" class="list-unstyled">
                                <?php foreach ($data['comments'] as $comment): ?>
                                    <li>
                                        <?= $comment->comment ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No comments available.</p>
                        <?php endif; ?>

                        <!-- Form for submitting comments -->
<form method="post" id="commentForm">
    <div class="form-group">
        <label for="comment">Leave a Comment:</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
    </div>
    <input type="hidden" name="image_id" value="<?= $data['image']->id ?>">
    <input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">

    <?php
    // Display error message if available
    if (isset($data['error']) && !empty($data['error'])):
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $data['error'] ?>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>




                    <!-- Display Like Count -->
                    <div class="mb-4">
                        <p class="tm-text-primary">Likes:
                            <?= isset($data['image']->likes) ? $data['image']->likes : 0 ?>
                        </p>
                    </div>

                    <!-- Like Button with Feedback -->
                    <form method="post" id="likeForm">
                        <input type="hidden" name="like" value="1">
                        <input type="hidden" name="csrf_token">
                        <button type="submit" class="btn btn-primary" onclick="disableLikeButton()">Like</button>
                    </form>

                    <!-- JavaScript to disable the button and provide feedback -->
                    <script>
                        function disableLikeButton() {
                            document.getElementById('likeForm').submit();
                            document.querySelector('button[type="submit"]').setAttribute('disabled', 'true');
                            // Optionally, display a success message or loading spinner
                        }
                    </script>

                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Dimension: </span><span class="tm-text-primary">1920x1080</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Format: </span><span class="tm-text-primary">JPG</span>
                        </div>
                    </div>
                    <div>
                        <!-- Additional details or actions can be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row mb-4">
    <h2 class="col-12 tm-text-primary">
        Related Photos
    </h2>
</div>
<div class="row mb-3 tm-gallery">
    <?php
    if (is_array($data['random_images'])) {
        foreach ($data['random_images'] as $row) {
            $this->view("catalog/single_image", $row);
        }
    }
    ?>
</div> <!-- row -->
</div> <!-- container-fluid, tm-container-content -->

<?php $this->view("catalog/footer", $data); ?>