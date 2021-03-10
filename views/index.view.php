<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Glossary</h1>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?php echo $item->term ?></td>
                <td><?php echo $item->definition ?></td>
            </tr>
        <?php endforeach;?>

        </table>

    </div>
</div>