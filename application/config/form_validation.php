<?php
$config = array(
    'Consultant' => array(
        array(
            'field' => 'firstname',
            'label' => 'First Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'nationality',
            'label' => 'Nationality',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'trim|required'
        ),
       
        array(
            'field' => 'subsector',
            'label' => 'SubSector',
            'rules' => 'required'
        ),
        array(
            'field' => 'degreeType',
            'label' => 'Degree Type',
            'rules' => 'required'
        ),
       
        array(
            'field' => 'mobile',
            'label' => 'Mobile Number',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|required'
        ),
    ),
    'Sector' => array(
        array(
            'field' => 'sname',
            'label' => 'Sector Name',
            'rules' => 'trim|required'
        ),
    ),
    'Degree' => array(
        array(
            'field' => 'title',
            'label' => 'Degree Name',
            'rules' => 'trim|required'
        ),
    ),
    'AddUser' => array(
        array(
            'field' => 'fname',
            'label' => 'First Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'lname',
            'label' => 'Last Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|is_unique[cv_users.username]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
    ),
    'EditUser' => array(
        array(
            'field' => 'fname',
            'label' => 'First Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'lname',
            'label' => 'Last Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|is_unique[cv_users.username]'
        ),
    ),
    'PasswordSettings' => array(
        array(
            'field' => 'oldpass',
            'label' => 'Old Password',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'newpass',
            'label' => 'New Password',
            'rules' => 'trim|required'
        )
),

);
?>