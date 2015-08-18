</div><!--#CONTENT-->
</div><!--#ROW-->
</div><!--#MAIN-->
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo $base_url; ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $base_url; ?>assets/admin/plugins/bootstrap/bootstrap.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<!--<script src="js/devoops.js"></script>-->
    <?php foreach($js_scripts as $script): ?>
        <?php if($script['location'] == 'footer'): ?>
        <script src="<?php echo $base_url; ?>assets/<?php echo $script['type'] . '/js/' . $script['file'] ?>"></script>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>