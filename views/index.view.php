<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><?=$viewBag['heading']?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="index.php" method="GET" class="form-inline mt-3 mb-3 float-right">
                <div class="form-group ">
                    <input type="text" name="search" id="search" class="form-control float-right"
                        placeholder="Search...">
                    <button type="submit" class="btn btn-dark">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <?php foreach ($data as $item): ?>
            <tr>
                <td><a href="detail.php?term=<?=$item->id?>"><?=$item->term?></a></td>
                <td><?=$item->definition?>
                </td>
            </tr>
            <?php endforeach;?>

        </table>

    </div>
</div>