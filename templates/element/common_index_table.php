<!-- templates/element/common_index_table.php -->
<?php
echo "common_index_table.php is loaded.";
?>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>項目名</th>
                <th>値</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= h($item['name']) ?></td>
                <td><?= h($item['value']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
