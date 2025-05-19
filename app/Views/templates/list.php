<h2>Users List</h2>
<a href="<?php echo site_url('users/create'); ?>" class="btn btn-success">Create New User</a>

<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->email; ?></td>
                <td>
                    <a href="<?php echo site_url('users/edit/'.$user->id); ?>" class="btn btn-primary">Edit</a>
                    <a href="<?php echo site_url('users/delete/'.$user->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>