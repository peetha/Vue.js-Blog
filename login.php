<?php

/**
 * @file
 * The login functionality.
 */

require_once 'session.php';
require_once 'db.php';
require_once 'functions.php';
require_once 'header.php';

$errors=array();
// Check if there is a token in the URL.
if (!empty($_GET['token'])){
  //  Grab the token data from the database by token value.
  $token_data = check_token($_GET['token']);
  if (!empty($token_data->created)) {
    $timetoken = $token_data->created;
    $time = date('Y-m-d H:i:s');

    // Check if there is more than 2 hours since the user clicked the link
    if (round(strtotime($time) - (strtotime($timetoken))) / 60 <= 120) {
      // If there is less than 2 hours then the status changes in active
      update_user_status($token_data->user_id);
      $errors['messages'][] = 'The account has beeen activated';
    }
    else {
      // Otherwise, we inform the user that his token has expired and give
      // the option to get a new one.
      $errors['messages'][] = 'Your token has expired. Click <a href="newtoken.php?token=' . $token_data->token . '">here</a> ' . 'to get a new token.';
    }
  }
}
// Check if the submit button was pressed.
if (!empty($_POST['submit'])) {
  // Check if the username and the password exist in the database.
  $user = get_users_by_login_credentials($_POST['username'], md5($_POST['password']));
  if (!empty($user)) {
    // Check if the user's status is active or not.
    if (empty($user->Status)) {
      $contact_page_url = get_url_by_path('/contact.php');
      $errors['messages'][] = 'Your account has beeen blocked!';
      $errors['messages'][] = 'Please <a href="' . $contact_page_url . '"><strong>contact</strong></a> the administrator in order to restore your account.';
    }
    else {
      // Get the last visited page.
      $last_page = get_last_visited_page();
      $get_role = get_user_role($user->id);
      set_session_value('admin',array('role'=>$get_role->rid));
      // Set the session for the current user with his info.
      set_session_value('user', array('username' => $user->Username, 'password' => $user->Password, 'id' => $user->id, 'email' => $user->Email));
      // Redirect to the user to the last visited page.
      header("Location: $last_page");
    }
  }
  else {
    $errors['messages'][] = 'The password or the username is invalid';
  }
}

?>
  <div id="content-wrap">
    <?php if (!empty($errors['messages'])): ?>
      <div class="messages">
        <?php foreach ($errors['messages'] as $message): ?>
          <div class="error-message"><?php print $message; ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form method="post" action="login.php">
      <?php echo (!empty($errors['logincredentials']) ? $errors['logincredentials'] : '') ;?>
      <label>Email/Username :  <input type="text" name="username"></label> <br>
      <label>Password : <input type="password" name="password"></label> <br>
      <input type="submit" name="submit"><br><br>
    </form>
    <a href="<?php echo get_url_by_path('/register.php'); ?>"><strong>Register</strong></a><br>
    <a href="<?php echo get_url_by_path('/forgotpassword.php'); ?>"><strong>Forgot your password</strong></a>
  </div>
<?php require_once 'footer.php';?>
