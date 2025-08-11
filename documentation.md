# emsWorx User Documentation

## Table of Contents

1. [User Management](#user-management)
   - [Creating a New User](#creating-a-new-user)
   - [Viewing User Details](#viewing-user-details)
   - [Editing User Information](#editing-user-information)
   - [Deleting a User](#deleting-a-user)
2. [Password Management](#password-management)
   - [Forgot Password Process](#forgot-password-process)
   - [Resetting Your Password](#resetting-your-password)
3. [Profile Management](#profile-management)
   - [Accessing Your Profile](#accessing-your-profile)
   - [Updating Your Profile Information](#updating-your-profile-information)
   - [Changing Your Password](#changing-your-password)
   - [Theme Preferences](#theme-preferences)
4. [Role Management](#role-management)
   - [Viewing Roles](#viewing-roles)
   - [Creating a New Role](#creating-a-new-role)
   - [Editing Role Permissions](#editing-role-permissions)
   - [Deleting a Role](#deleting-a-role)
5. [Permission Management](#permission-management)
   - [Viewing Permissions](#viewing-permissions)
   - [Creating a New Permission](#creating-a-new-permission)
   - [Editing Permissions](#editing-permissions)
   - [Deleting a Permission](#deleting-a-permission)

---

## User Management

### Creating a New User

Administrators can create new users in the system by following these steps:

1. Log in to your emsWorx account with administrator privileges.
2. Navigate to the Users section by clicking on "Users" under the "Configuration" menu in the sidebar.
3. Click the "Create User" button in the top-right corner of the Users page.
4. Fill in the required information in the user creation form:
   - **Name**: Enter the user's full name
   - **Email**: Enter a valid email address (this will be used for login and notifications)
   - **Password**: Create a secure password (minimum 8 characters)
   - **Confirm Password**: Re-enter the password to confirm
   - **Role**: Select a role for the user from the dropdown menu
5. Click the "Create User" button to save the new user.
6. The system will validate the information and create the user if all requirements are met.
7. Upon successful creation, you will be redirected to the Users list with a confirmation message.

**Note**: Each user must have a unique email address in the system.

### Viewing User Details

To view detailed information about a user:

1. Navigate to the Users section.
2. Click on the user's name in the list to access their profile page.
3. The user details page displays the following information:
   - User's name
   - Email address
   - Account creation date
   - Last update date
   - Email verification status

### Editing User Information

To edit a user's information:

1. Navigate to the Users section.
2. Find the user you want to edit and click the "Edit" button in the Actions column.
3. Update the necessary fields in the edit form:
   - **Name**: Update the user's full name
   - **Email**: Update the email address (must be unique)
   - **Password**: Enter a new password (leave blank to keep the current password)
   - **Confirm Password**: Re-enter the new password to confirm
4. Click the "Update User" button to save the changes.
5. Upon successful update, you will be redirected to the Users list with a confirmation message.

### Deleting a User

To delete a user from the system:

1. Navigate to the Users section.
2. Find the user you want to delete and click the "Delete" button in the Actions column.
3. A confirmation dialog will appear asking you to confirm the deletion.
4. Click "Yes, I'm sure" to proceed with deletion or "No, cancel" to cancel the operation.
5. Upon successful deletion, the user will be removed from the system and you will see a confirmation message.

**Warning**: Deleting a user is permanent and cannot be undone. All data associated with the user will be lost.

---

## Password Management

### Forgot Password Process

If you have forgotten your password, you can reset it by following these steps:

1. Navigate to the login page.
2. Click on the "Forgot your password?" link below the login form.
3. Enter the email address associated with your account.
4. Click the "Email Password Reset Link" button.
5. Check your email inbox for a message from emsWorx containing a password reset link.
   - If you don't see the email, check your spam or junk folder.
   - The link is valid for 60 minutes.

### Resetting Your Password

After requesting a password reset:

1. Open the password reset email and click on the reset link.
2. You will be directed to a password reset page.
3. Enter your email address to confirm.
4. Create a new password and confirm it by typing it again.
5. Click the "Reset Password" button.
6. Upon successful reset, you will be redirected to the login page with a confirmation message.
7. Log in with your new password.

---

## Profile Management

### Accessing Your Profile

To access your own profile:

1. Log in to your emsWorx account.
2. Click on your name or profile icon in the top-right corner of the page.
3. Select "Profile" from the dropdown menu.

### Updating Your Profile Information

To update your profile information:

1. Access your profile as described above.
2. Click the "Edit Profile" button.
3. Update your information as needed:
   - **Name**: Update your full name
   - **Email**: Update your email address (requires verification if changed)
4. Click the "Save Changes" button to update your profile.

### Changing Your Password

To change your password while logged in:

1. Access your profile as described above.
2. Click on the "Security" tab or "Change Password" button.
3. Enter your current password for verification.
4. Enter your new password and confirm it by typing it again.
5. Click the "Update Password" button to save the changes.
6. You will receive a confirmation message upon successful password change.

**Security Tip**: Choose a strong password that includes a mix of uppercase and lowercase letters, numbers, and special characters. Avoid using easily guessable information like birthdays or common words.

### Theme Preferences

You can customize the appearance of the emsWorx interface by switching between light and dark modes:

1. Access your profile as described above.
2. Find the "Theme Preferences" section.
3. Toggle the switch to enable or disable dark mode.
4. The interface will update immediately to reflect your choice.
5. Your preference will be saved and applied across all your sessions.

---

## Role Management

Role management is available to users with the appropriate permissions (typically super-admin users).

### Viewing Roles

To view all roles in the system:

1. Log in to your emsWorx account with appropriate permissions.
2. Navigate to the Configuration menu in the sidebar.
3. Click on "Roles" to access the roles management page.
4. The roles page displays a list of all roles with the following information:
   - Role name
   - Number of users assigned to the role
   - Associated permissions
   - Action buttons (View, Edit, Delete)

### Creating a New Role

To create a new role:

1. Navigate to the Roles section as described above.
2. Click the "Add New Role" button in the top-right corner.
3. Fill in the required information:
   - **Role Name**: Enter a name for the role (use lowercase with hyphens, e.g., 'content-editor')
   - **Permissions**: Select the permissions to assign to this role by checking the appropriate boxes
4. Click the "Create Role" button to save the new role.
5. Upon successful creation, you will be redirected to the Roles list with a confirmation message.

### Editing Role Permissions

To modify an existing role:

1. Navigate to the Roles section.
2. Find the role you want to edit and click the "Edit" button.
3. Update the role information:
   - **Role Name**: Modify the role name if needed
   - **Permissions**: Add or remove permissions by checking or unchecking the boxes
4. Click the "Update Role" button to save the changes.

**Note**: The super-admin role has all permissions by default and cannot be modified.

### Deleting a Role

To delete a role:

1. Navigate to the Roles section.
2. Find the role you want to delete and click the "Delete" button.
3. A confirmation dialog will appear asking you to confirm the deletion.
4. Click "Yes, I'm sure" to proceed with deletion or "No, cancel" to cancel the operation.

**Warning**: You cannot delete a role that is currently assigned to users. You must first reassign those users to different roles.

---

## Permission Management

Permission management allows you to create and manage individual permissions that can be assigned to roles.

### Viewing Permissions

To view all permissions in the system:

1. Log in to your emsWorx account with appropriate permissions.
2. Navigate to the Configuration menu in the sidebar.
3. Click on "Permissions" to access the permissions management page.
4. The permissions page displays a list of all permissions with the following information:
   - Permission name
   - Roles that use this permission
   - Action buttons (Edit, Delete)

### Creating a New Permission

To create a new permission:

1. Navigate to the Permissions section as described above.
2. Click the "Add New Permission" button in the top-right corner.
3. Enter a name for the permission following the naming guidelines:
   - Use verb-noun format (e.g., 'create-posts', 'edit-users')
   - Use lowercase with hyphens between words
   - Be specific about the resource and action
4. Click the "Create Permission" button to save the new permission.

### Editing Permissions

To modify an existing permission:

1. Navigate to the Permissions section.
2. Find the permission you want to edit and click the "Edit" button.
3. Update the permission name as needed.
4. Click the "Update Permission" button to save the changes.

**Warning**: Changing a permission name may affect existing roles that use this permission.

### Deleting a Permission

To delete a permission:

1. Navigate to the Permissions section.
2. Find the permission you want to delete and click the "Delete" button.
3. A confirmation dialog will appear asking you to confirm the deletion.
4. Click "Yes, I'm sure" to proceed with deletion or "No, cancel" to cancel the operation.

**Warning**: You cannot delete a permission that is currently assigned to roles. You must first remove it from all roles.

---

For additional assistance, please contact the system administrator at support@emsworx.com or refer to the complete documentation available in the Help section.
