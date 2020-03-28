<?php 

SELECT u.login, o.name, o.status FROM users u LEFT JOIN objects o ON u.object_id = o.id WHERE u.object_id IS NOT NULL;