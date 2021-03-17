<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Edit Term</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post">
                <input type="hidden" name="original-term"
                    value="<?= $data->id?>">
                <div class="form-group">
                    <label for="term">Term:</label>
                    <input type="text" class="form-control" name="term" id="term" placeholder="Enter a term"
                        value="<?= $data->term ?>">
                </div>
                <div class="form-group">
                    <label for="definition">Definition:</label>
                    <textarea class="form-control" name="definition" id="definition"
                        placeholder="Enter a definition"><?= $data->definition ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-dark" value="Edit Term">
                </div>
            </form>
        </div>
    </div>
</div>