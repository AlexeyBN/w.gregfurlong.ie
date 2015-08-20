<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Tweets</div>
    <!-- Table -->
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php if(!empty($tweets)): ?>
            <?php foreach ($tweets as $tweet): ?>
                <tr>
                    <td><?php echo date('h:i:s A \o\n d/m/y', $tweet->date) ?></td>
                    <td><?php echo $tweet->is_posted? "Posted": "Not Yet" ?></td>
                    <td>
                        <?php if (!$tweet->is_posted): ?>
                            <button data-id="<?php echo $tweet->id ?>" type="button" class="btn btn-danger remove-tweet">Delete</span></button>
                        <?php endif; ?>
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