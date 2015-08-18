<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Tweets</div>
    <!-- Table -->
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if(!empty($tweets)): ?>
            <?php foreach ($tweets as $tweet): ?>
                <tr>
                    <td><?php echo $tweet->id ?></td>
                    <td><?php echo date('Y/d/m H:i:s', $tweet->date) ?></td>
                    <td><?php echo $tweet->is_posted? "Posted": "Not Yet" ?></td>
                    <td>
                        <button data-id="<?php echo $tweet->id ?>" type="button" class="btn btn-danger remove-tweet">Delete</span></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No Tweets</td>
            </tr>
        <?php endif; ?>
    </table>
</div>