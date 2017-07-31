<?php

return [
    //'title' => '101Errors', no es necesaria ya que se declara en config -> app.php -> name

    //index
    'UVPTitle' => 'Te ayudamos a controlar tu inventario inteligentemente - '.Config::get('app.name').'',
    'UVP-A' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> te ayuda a controlar tu inventario inteligentemente.',
    'UVP-B' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> la mejor forma de ordenar y controllar tu inventario.',
    'UVP-C' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> controla tu inventario ordenadamente.',

    //form's' login, register, sendLinkPass, Reset Password
    'user' => 'User Name',
    'login' => 'Login',
    'register' => 'Register',
    'userormail' => 'User or Mail',
    'password' => 'Password',
    'confPassword' => 'Confirm Password',
    'logfacebook' => 'Login with Facebook',
    'signfacebook' => 'Sign up with Facebook',
    'permisosredes' => "Don't Worry. We don't publish anything without your permission and we don't save passwords.",
    'nameForm' => "Please enter your username",
    'passwordFormRequired' => "Please provide a password",
    'passwordFormMinLength' => "Your password must be at least 5 characters long",
    'mailForm' => "Please enter a valid email address",
    'ResetPassword' => "Reset your Password",
    'ResetPasswordButton' => "Send Password Reset Link",
    'RememberMe' => "Remember Me",
    'Forgot' => "Forgot Your Password?",
    'keyPass' => 134343,

    //footer
    'Copyright' => "Copyright &copy; ".date('Y')." ".Config::get('app.name').". All Rights Reserved.",

    //Subscribe
    'Subscribe' => "Notify me",
    'SubscribeTxt' => "Subscribe to our newsletter to receive the latest news.",
    'privacy' => "We respect your email privacy.",
    'subscribeSuccess' => "An email to confirm your subscription has been sent.",
    'subscribersNot' => "clic on Notify Me",

    //verification
    'notVerified' => "The verification number doesn't exist",
    'verified' => "Your account has been verified",
    'wasVerified' => "Your account has already been verified previously",

    //emails
    'emailVerification' => "Email Verification requiered",
    'emailReset' => "Password reset Successfully",
    'emailWelcome' => "Welcome to ".Config::get('app.name')."",
    'selectFormRequired' => "Please enter a valid value",
    'emailSubscribeSubject' => "You have new subscriber.",
    'emailSubscribeBody' => "You have new subscriber. Correo: ",

    //email reset password
    'emailResetText1' => "You are receiving this email because we received a password reset request for your account.",
    'emailResetText2' => "Reset Password",
    'emailResetText3' => "If you did not request a password reset, no further action is required.",
    'emailResetText4' => "If you’re having trouble clicking the button, copy and paste the URL below into your web browser:",

    //email Administration
    'emailAdminTitle' => "Custom Email's",
    'emailAdminTarget' => "Scope target",
    'emailAdminSelect' => "Select your scope target",
    'emailPrioritySelect' => "Select your priority",
    'emailAdminAllUsers' => "All Users",
    'emailAdminSubscribers' => "All Subscribers",
    'emailAdminSubject' => "Subject",
    'emailAdminBody' => "Body (includes header, footer, regards and farewell)",
    'emailAdminPrioridad' => "Priority",
    'emailAdminIdioma' => "Language",
    'emailAdminAllTipo1' => "All",
    'emailAdminAllTipo2' => "users",
    'subjectFormRequired' => "Please enter a valid subject",
    'bodyFormRequired' => "Please enter a valid body",
    'emailPrioridad1' => "High",
    'emailPrioridad3' => "Medium",
    'emailPrioridad5' => "Low",

    //system titles
    'homeTitle' => "Home",
    'profileTitle' => "Profile",
    'adminTitle' => "Administration Panel",
    'helpTitle' => "¿Need Help?",

    //system
    'welcome' => "Welcome ",

    //configuration modal
    'confTitle' => "Fill in all the missing information in order to configure your profile and start using ".Config::get('app.name')."",
    'selectTimezone' => "Select your Timezone",
    'selectTimezoneSpan' => "Please select your Timezone",
    'selectLanguage' => "Select your Language",
    'selectLanguageSpan' => "Please select your Language",
    'continue' => "Continue",

    //configuration forms
    'timezoneForm' => "Please enter a valid Timezone",
    'languageForm' => "Please enter a valid Language",

    //system header menu
    'help' => "¿Need Help?",
    'profile' => "My profile",
    'home' => "Home",

    //System profile
    'headTitleProfile' => "My profile",
    'headTitleProfile2' => "Modify your profile characteristics",
    'changePicture' => "Change your photo",
    'changePicture2' => "of profile",
    'examinar' => "Examine&hellip;",
    'nameProfile' => "Name",
    'emailProfile' => "Email",
    'zonaHorarioProfile' => "Time zone",
    'idiomaProfile' => "Language",
    'contraseñaActualProfile' => "Current password",
    'olvidasteProfile' => "Did you forget your password?",
    'nuevaContraseñaProfile' => "New Password",
    'confirmarProfile' => "Confirm Password",
    'saveChangesProfile' => "Save changes",

    //System administrator
    'headTitleAdmin' => 'As a admin user you can edit the general configuration of the platform',
    'homeTab' => 'Home',
    'mailsTab' => 'Mails',
    'rolesTab' => 'Roles',
    'plansTab' => 'Plans',
    'homeDescription' => 'Welcome to the administration panel, here you are going to see the relevant information about the platform.',

    //libraries general configuration
    'successTrue' => "TRUE",
    'successFalse' => "FALSE",
    'admin' => "ADMIN",
    'prioridadWelcome' => '3',
    'prioridadReset' => '1',
    'prioridadVerificationCompare' => '3',
    'prioridadPswd' => '3',
    'prioridadCustom' => '5',

    //BD Messages and Errors
    'BDsuccess' => "The information was updated successfully",
    'errorsBD' => "There was an error, please contact your administrator",
    'errorsBDRepeat' => "This data already exists",
    'errorFormat' => "The file that you want to upload has a not valid format.",
];