<h1 class="page-header">Users List</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?controller=user&action=create">Create New User</a>
</div>

<div class="table-responsive">
    <table id="userList" class="table table-hover table-bordered">
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Status</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($this->model->getUserList() as $r): ?>
            <tr>
                <td><?php echo $r->name; ?></td>
                <td><?php echo $r->lastname; ?></td>
                <td><?php echo ($r->status === "0") ? "Disabled" : "Enabled"; ?></td>
                <td><?php echo $r->email; ?></td>
                <td>
                    <a class="btn btn-primary" href="?controller=user&action=update&id=<?php echo $r->id; ?>">Update</a>
                    <a class="btn btn-primary" onclick="javascript:return confirm('¿Are you sure to delete this user?');" href="?controller=user&action=delete&id=<?php echo $r->id; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Status</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>
