<h1 class="page-header">
    New User
</h1>

<ol class="breadcrumb">
  <li class="active">New User</li>
</ol>

<form id="frm-user" action="?controller=user&action=save" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" placeholder="Insert User Name" required/>
    </div>

    <div class="form-group">
        <label>Lastname</label>
        <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" class="form-control" placeholder="Insert User Lastname" required/>
    </div>

    <div class="form-group">
        <label>Enabled / Disabled</label>
        <input type="checkbox" name="status" value="<?php echo $user->status; ?>" class="form-control" style="width:2%" />
    </div>

    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $user->email; ?>" class="form-control" placeholder="Insert User E-mail" required/>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-user").submit(function(){
            return $(this).validate();
        });
    })
</script>
