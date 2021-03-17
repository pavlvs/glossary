<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Delete Term</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center mb-4">
            Are you sure you want to delete <?= $data->term ?>?
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <form action="" method="post">
                <input type="hidden" name="term"
                    value="<?= $data->id?>">
                <div class="form-group">
                    <input type="submit" class="btn btn-dark" value="Delete Term">
                </div>
            </form>
        </div>
    </div>
</div>