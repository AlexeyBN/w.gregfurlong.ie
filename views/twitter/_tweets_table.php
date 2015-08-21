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
                    <td><?php echo $tweet->status == Tweets_Model::STATUS_SENDED? "Posted": "Not Yet" ?></td>
                    <td>
                        <a href="#" data-id="<?php echo $tweet->id ?>" class="edit-tweet">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <?php if ($tweet->status != Tweets_Model::STATUS_SENDED): ?>
                            <a href="#" data-id="<?php echo $tweet->id ?>" class="remove-tweet">
                                <span class="glyphicon glyphicon-remove"></span>
                            </a>
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

    <div class="modal fade" id="modal-dialog-tweet" tabindex="-1" role="dialog" aria-labelledby="View tweet">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">View tweet</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

</div>