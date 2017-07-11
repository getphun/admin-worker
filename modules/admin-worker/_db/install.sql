INSERT IGNORE INTO `user_perms` ( `name`, `group`, `role`, `about` ) VALUES
    ( 'read_worker',    'Worker', 'Administrator', 'Allow user to view all jobs' ),
    ( 'remove_worker',  'Worker', 'Administrator', 'Allow user to remove exists job' );