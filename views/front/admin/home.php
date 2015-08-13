<?php

	$users = Users_Model::find('all' , array('company' => $current_user->email));

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $delete_list = $_POST['delete'];

        for($i = sizeof($delete_list) ; $i>0 ; $i--){

        	$users[$delete_list[$i-1]]->delete();
        }


       	if ($_FILES["csv"]["size"] > 0) 
       	{
	        //get the csv file 
	        $file = $_FILES["csv"]["tmp_name"]; 
	        $handle = fopen($file,"r");

	        $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
	        if(in_array($_FILES['csv']['type'],$mimes))
	        {

                while ($data = fgetcsv($handle,2000,",","'")) {

	                $user = new Users_Model();

	                $user->first_name = $data[0];

	                $user->last_name = $data[1];

	                $user->email = $data[2];

	                $user->pass = MD5($data[3]);

	                $user->registration_date = date("Y-m-d H:i:s");

	                $user->company = $current_user->email;

	                $user->save();

                }
   			}
		}
        
        $result = "Succeed";
        $users = Users_Model::find('all' , array('company' => $current_user->email));
    }
?>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}

td , th {
	padding: 5px;
}

</style>

<div class="col-md-12 tagline">

    <div class="tagline_admin">

        <div class="form-wrap">

            <div id="content" class="col-xs-12 col-sm-12">

                <h1 class="page-title">Admin Page</h1>

                	<?php if(!empty($result)):?>
                		<p class="success"><?= $result ?></p>
            		<?php endif;?>

                    <?php if(!empty($mes)):?>
                    	<p class="error"><?php echo $mes ?></p>
                    <?php else:
                    ?>
                    <form method="post" action="" enctype="multipart/form-data">
	                    <p style="margin-top:25px ; text-align:left;">Users</p>
	                   	<table style="color: #a0a0a0;">
	                   		<tr>
	                   			<th>First Name</th>
	                   			<th>Last Name</th>
	                   			<th>Email</th>
	                   			<th>Activated ?</th>
	                   			<th>User Level</th>
	                   			<th>Delete ?</th>
	                   		</tr>
	                    <?php
	                    	foreach ($users as $index => $user) {
	                   	?>	
		       				<tr>
		       					<td><?php echo $user->first_name ?></td>
		       					<td><?php echo $user->last_name ?></td>
		       					<td><?php echo $user->email ?></td>
		       					<td><?php echo ($user->active)?"No":"Yes" ?></td>
		       					<td><?php echo $user->user_level ?></td>
		       					<td><input type="checkbox" name="delete[]" id="delete" value="<?php echo $index ?>"></td>
		       				</tr>
	                   	<?php
	                    	}
	                    ?>
	                    </table>
	                    <p></p>
	                    <input type="button" id="bulk_upload" class="btn btn-danger col-xs-6 col-sm-6" value = "Import Users from CSV">
	                    <input type="submit" value = "Apply" id="apply" class="btn btn-success">
	                    <a href="/Dashboard" style ="color: white;margin-left: 3em;">Return</a>
	                    <input type="file" id="file" style ="display:none" name = "csv">
                    </form>
                    <?php endif;?>
                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#bulk_upload").click(function () {
			$("#file").trigger('click');
		});

		$("#file").change(function(){
			$("#apply").trigger('click');
		})
	})
</script>