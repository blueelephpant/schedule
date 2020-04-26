<h1 class="page-header">
    <?php echo $user->name != null ? $user->lastname : 'New User'; ?>
</h1>

<form id="frm-user" action="?controller=user&action=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $user->id; ?>" />

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label>Lastname</label>
        <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" class="form-control" required />
    </div>

    <div class="form-group">
        <label>Status</label>
        <input type="checkbox" name="status" value="<?php echo $user->status; ?>" class="form-control" style="width:2%" <?php if ($user->status) { echo 'checked'; } ?> />
    </div>

    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" required/>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Update</button>
    </div>
</form>
