<?php

return [
    //'title' => '101Errors', no es necesaria ya que se declara en config -> app.php -> name

    //index
    'UVPTitle' => 'Te ayudamos a controlar tu inventario inteligentemente - '.Config::get('app.name').'',
    'UVP-A' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> te ayuda a controlar tu inventario inteligentemente.',
    'UVP-B' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> la mejor forma de ordenar y controllar tu inventario.',
    'UVP-C' => '<font style="color: #FFFFFF;">Work</font><font style="color: #f9c922;">invent</font> controla tu inventario ordenadamente.',

    //form's' login and register
    'user' => 'Nombre de Usuario',
    'login' => 'Ingresar',
    'register' => 'Registrarse',
    'userormail' => 'Usuario o Mail',
    'password' => 'Contraseña',
    'confPassword' => 'Confirmar Password',
    'logfacebook' => 'Ingresar con Facebook',
    'signfacebook' => 'Iniciar con Facebook',
    'permisosredes' => 'No te preocupes. Nosotros no publicamos nada sin tu permiso y no almacenamos contraseñas.',
    'nameForm' => "Por favor proporcione un nombre de usuario",
    'passwordFormRequired' => "Por favor proporcione una contraseña",
    'passwordFormMinLength' => "La contrasña debe contener al menos 5 caracteres",
    'mailForm' => "Por favor proporcione una dirección de correo válida",
    'ResetPassword' => "Recuperar Contraseña",
    'ResetPasswordButton' => "Enviar link de reseteo de password",
    'RememberMe' => "Recordar",
    'Forgot' => "Olvidaste tu contraseña?",
    'keyPass' => 134343,

    //footer
    'Copyright' => "Copyright &copy; ".date('Y')." ".Config::get('app.name').". All Rights Reserved.",

    //Subscribe
    'Subscribe' => "Notifícame",
    //'Subscribe' => "Suscríbete",
    'SubscribeTxt' => "Suscríbete a nuestro boletín para recibir las últimas noticias.",
    'privacy' => "Respetamos su privacidad de correo electrónico.",
    'subscribeSuccess' => "Se ha enviado un correo electrónico para confirmar su suscripción.",
    'subscribersNot' => "da clic en Notifícame!",

    //verification
    'notVerified' => "El número de verificación no existe",
    'verified' => "Tu cuenta ha sido verificada",
    'wasVerified' => "Tu cuenta ya ha sido verificada con anterioridad",

    //emails
    'emailVerification' => "Se requiere verificación de correo electrónico",
    'emailReset' => "Nueva Contraseña",
    'emailWelcome' => "Bienvenido a ".Config::get('app.name')."",
    'selectFormRequired' => "Por favor ingresa un valor correcto",
    'emailSubscribeSubject' => "Tiene un nuevo subscriptor.",
    'emailSubscribeBody' => "Tienes un nuevo subscriptor. Correo: ",

    //email reset password
    'emailResetText1' => "You are receiving this email because we received a password reset request for your account.",
    'emailResetText2' => "Reset Password",
    'emailResetText3' => "If you did not request a password reset, no further action is required.",
    'emailResetText4' => "If you’re having trouble clicking the button, copy and paste the URL below into your web browser:",

    //email Administration
    'emailAdminTitle' => "Email's Personalizados",
    'emailAdminTarget' => "Objetivo de alcance",
    'emailAdminSelect' => "Selecciona tu objetivo",
    'emailPrioritySelect' => "Selecciona tu prioridad",
    'emailAdminAllUsers' => "Todos los usuarios",
    'emailAdminSubscribers' => "Todos los suscriptores",
    'emailAdminSubject' => "Asunto",
    'emailAdminPrioridad' => "Prioridad",
    'emailAdminIdioma' => "Idioma",
    'emailAdminBody' => "Cuerpo del mensaje (incluye cabezera, pie, saludos y despedida)",
    'emailAdminAllTipo1' => "Todos los usuarios",
    'emailAdminAllTipo2' => "",
    'subjectFormRequired' => "Por favor ingresa un correcto asunto",
    'bodyFormRequired' => "Por favor ingresa un correcto cuerpo de mensaje",
    'emailPrioridad1' => "Alta",
    'emailPrioridad3' => "Media",
    'emailPrioridad5' => "Baja",

    //system titles
    'homeTitle' => "Inicio",
    'profileTitle' => "Perfil",
    'adminTitle' => "Panel de Administración",
    'helpTitle' => "¿Necesitas ayuda?",

    //system
    'welcome' => "Bienvenido ",

    //configuration modal
    'confTitle' => "Complete toda la información faltante, para poder configurar su perfil y empezar a utilizar ".Config::get('app.name')."",
    'selectTimezone' => "Seleccione su zona horaria",
    'selectTimezoneSpan' => "Por favor seleccione su zona horaria",
    'selectLanguage' => "Seleccione su idioma",
    'selectLanguageSpan' => "Por favor seleccione su idioma",
    'continue' => "Continuar",
    
    //configuration forms
    'timezoneForm' => "Por favor proporcione una Zona Horaria",
    'languageForm' => "Por favor proporcione un Idioma",

    //system header menu
    'help' => "¿Necesitas ayuda?",
    'profile' => "Mi perfil",
    'home' => "Inicio",

    //System profile
    'headTitleProfile' => "Mi perfil",
    'headTitleProfile2' => "Modifica las características de tu perfil",
    'changePicture' => "Cambia tu foto",
    'changePicture2' => "de perfil",
    'examinar' => "Examinar&hellip;",
    'nameProfile' => "Nombre",
    'emailProfile' => "Correo electrónico",
    'zonaHorarioProfile' => "Zona Horaria",
    'idiomaProfile' => "Idioma",
    'contraseñaActualProfile' => "Contraseña actual",
    'olvidasteProfile' => "¿Olvidaste tu contraseña?",
    'nuevaContraseñaProfile' => "Nueva contraseña",
    'confirmarProfile' => "Confirmar contraseña",
    'saveChangesProfile' => "Guardar cambios",

    //System administrator
    'headTitleAdmin' => 'Como usuario administrador puede editar la configuración general de la plataforma',
    'homeTab' => 'Inicio',
    'mailsTab' => 'Mails',
    'rolesTab' => 'Roles',
    'plansTab' => 'Plans',
    'homeDescription' => 'Bienvenido al panel de administración, aquí vas a ver información relevante sobre la plataforma.',

    //libraries
    'successTrue' => "TRUE",
    'successFalse' => "FALSE",
    'admin' => "ADMIN",
    'prioridadWelcome' => '3',
    'prioridadReset' => '1',
    'prioridadVerificationCompare' => '3',
    'prioridadPswd' => '3',
    'prioridadCustom' => '5',

    //BD Messages and Errors
    'BDsuccess' => "La información se actualizó correctamente",
    'errorsBD' => "Hubo un error por favor contacte al administrador",
    'errorsBDRepeat' => "Estos datos ya existen",
    'errorFormat' => "El archivo que desea cargar tiene un formato no válido.",
];