<div id="sidebar">
  <?php echo form_open_multipart('niriksha/do_upload');?>
<table>
	<tr>
		<td>tittle</td>
		<td>: <input type="text" name="title" size="30"/></td>
	</tr>
	<tr>
		<td>description</td>
		<td>: <input type="textarea" name="desc" /></td>
	</tr>
	<tr>
		<td>file</td>
		<td>: <input type="file" name="userfile" size="20" /></td>
	</tr>
	<tr>
		<td>privacy option</td>
		<td>: <select name="privacy">
			<option value=1>public</option>
			<option value=2>same division only</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan=2><input type="submit" value="upload" /></td>

	</tr>
</table>

</form>

</div>
