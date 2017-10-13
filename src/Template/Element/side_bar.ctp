<?php

use Cake\Routing\Router;
?>

<?php

if ($current_user->role == USER_EMPLOYEE):
    echo $this->element('employee_sidebar');
endif;
if ($current_user->role == USER_DESIGNER):
    echo $this->element('designer_sidebar');
endif;
if ($current_user->role == USER_MANAGER):
    echo $this->element('manager_sidebar');
endif;
if ($current_user->role == USER_CUSTOMER):
    echo $this->element('customer_sidebar');
endif;
if ($current_user->role == USER_ADMIN):
    echo $this->element('admin_sidebar');
endif;
?>