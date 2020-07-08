<h4><?= $title ?></h4>

<form id="form_religion">
	<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square-o"></i> Add New </button>
	<table class="table table-hover">
		<thead>
			<tr>
				<th><input id="selAll" type="checkbox" title="Select All"> 
				</th>
				<th scope="col">Religion</th>
				<th scope="col">Code</th>
				<th scope="col"></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $posts as $row) :?>
				<tr>
					<th><input id="check[]" type="checkbox" value="<?php echo $row['Religion_Id'];?>">
					</th>
					<th scope="row"><?php echo $row['Religion']; ?></th>
					<td><?php echo $row['Religion_Code'];?></td>
					<td>
						<?php echo form_open('religion/edit/'.$row['Religion_Id']);?>
						<button class="btn btn-outline-info" data-toggle="modal" data-target="#ReligionEditModal"><i class="fa fa-edit"></i>
						</button>
					</form>
				</td>
				<td>
					<?php echo form_open('religion/delete/'.$row['Religion_Id']);?>
					<button class="btn btn-outline-info"><i class="fa fa-trash-o"></i>
					</button>
				</form>
			</td>
		</tr>

	<?php endforeach; ?>
</tbody>
</table> 
<?php echo form_open('religion/delete/'.$row['Religion_Id']);?>
<button class="btn btn-outline-danger"><i class="fa fa-trash-o"></i> Delete </button>
</form>

<script type="text/javascript">
	$( '#form_religion #selAll' ).click( function () {
		$( '#form_religion input[type="checkbox"]' ).prop('checked', this.checked)
	});
</script>

</form>

<!--ADD Religion Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo validation_errors();?>
				<?php echo form_open('religion/addNew');?>
				<div class="form-group">
					<label for="inputReligion">Religion</label>
					<input type="text" class="form-control" id="inputReligion" name="inputReligion" placeholder="Religion" autocomplete="off" onchange="ValidateReligion()" required>
					<em id="inputReligion-error" class="invalid-feedback"></em>
					<script>
						function ValidateReligion()
						{
							var val = document.getElementById('inputReligion').value;
							if (!val.match(/^[A-Za-z\s]{3,}$/))
							{
								$("#inputReligion-error").html('Only characters allowed and require minimum 3 char').fadeIn().delay(4000).fadeOut();
								document.getElementById('inputReligion').value = "";

								return false;
							}
							return true;
						}
					</script>
				</div>
				<div class="form-group">
					<label for="inputReligionCode">Religion Code</label>
					<input type="text" class="form-control" name="inputReligionCode" id="inputReligionCode" placeholder="Code" autocomplete="off" required onchange="ValidateReligionCode()">
					<em id="inputReligionCode-error" class="invalid-feedback"></em>
					<script>
						function ValidateReligionCode()
						{
							var val = document.getElementById('inputReligionCode').value;
							if (!val.match(/^[A-Za-z\s]{3,}$/))
							{
								$("#inputReligionCode-error").html('Only characters allowed and require minimum 3 char').fadeIn().delay(4000).fadeOut();
								document.getElementById('inputReligionCode').value = "";

								return false;
							}
							return true;
						}
					</script>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
	</div>

</div>
</div>

<!--EDIT Religion Modal -->
<div class="modal fade" id="ReligionEditModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo validation_errors();?>
				<?php echo form_open('religion/update/');?>
				<input type="hidden" value="<?php echo $row['Religion_Id'];?>" name="inputReligionId">
				<div class="form-group">
					<label for="inputReligion">Religion</label>
					<input type="text" class="form-control" id="inputReligion" name="inputReligion" value="<?php echo $row['Religion'];?>" autocomplete="off" onchange="ValidateReligion()" required>
					<em id="inputReligion-error" class="invalid-feedback"></em>
					<script>
						function ValidateReligion()
						{
							var val = document.getElementById('inputReligion').value;
							if (!val.match(/^[A-Za-z\s]{3,}$/))
							{
								$("#inputReligion-error").html('Only characters allowed and require minimum 3 char').fadeIn().delay(4000).fadeOut();
								document.getElementById('inputReligion').value = "";

								return false;
							}
							return true;
						}
					</script>
				</div>
				<div class="form-group">
					<label for="inputReligionCode">Religion Code</label>
					<input type="text" class="form-control" name="inputReligionCode" id="inputReligionCode" value="<?php echo $row['Religion_Code'];?>" autocomplete="off" required onchange="ValidateReligionCode()">
					<em id="inputReligionCode-error" class="invalid-feedback"></em>
					<script>
						function ValidateReligionCode()
						{
							var val = document.getElementById('inputReligionCode').value;
							if (!val.match(/^[A-Za-z\s]{3,}$/))
							{
								$("#inputReligionCode-error").html('Only characters allowed and require minimum 3 char').fadeIn().delay(4000).fadeOut();
								document.getElementById('inputReligionCode').value = "";

								return false;
							}
							return true;
						}
					</script>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
	</div>

</div>
</div>