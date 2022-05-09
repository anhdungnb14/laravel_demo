
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileupload"/>
    <input type="submit" name="sbm" value="Upload"/>
    {{csrf_field()}}
</form>

