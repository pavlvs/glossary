<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><?=$viewBag['heading']?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="create.php" class="float-right mb-2">Add a term</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <?php foreach ($data as $item): ?>
            <tr>
                <td><?=$item->term?>
                </td>
                <td><?=$item->definition?>
                </td>
                <td><a href="edit.php?key=<?=$item->id?>">Edit</a>
                </td>
                <td><a
                        href="delete.php?key=<?=$item->id?>">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>

        </table>

    </div>
</div>