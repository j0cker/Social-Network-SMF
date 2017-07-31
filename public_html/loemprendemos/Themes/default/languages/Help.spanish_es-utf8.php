<?php
// Version: 2.0; Help

global $helptxt;

$txt['close_window'] = 'Cerrar ventana';

$helptxt['manage_boards'] = '	<strong>Editar foros</strong><br />
	En este menú puedes crear/reordenar/eliminar foros, y las categorías
	arriba de ellos. Por ejemplo, si tienes un amplio sitio web
	que ofrece información acerca de &quot;Anime&quot;, &quot;Carros&quot; y &quot;Música&quot;,
	éstos deben ser las categorías a mayor nivel que debes crear. Debajo de esas
	categorías probablemente desees crear &quot;sub-categorías&quot; jerárquicas,
	o &quot;Foros&quot; para contener temas dentro de cada uno. Es una jerarquía simple, con esta estructura: <br />
	<ul class="normallist">
		<li>
			<b>Deportes</b>
			 - Una &quot;categoría&quot;
		</li>
		<ul class="normallist">
			<li>
				<b>Béisbol</b>
				 - Un foro en la categoría de &quot;Deportes&quot;
			</li>
			<ul class="normallist">
				<li>
					<b>Estadísticas</b>
					 - Un subforo dentro del foro de &quot;Baseball&quot;
				</li>
			</ul>
			<li><b>Fútbol</b>
			 - Un foro dentro de la categoría de &quot;Deportes&quot;</li>
		</ul>
	</ul>
	Las Categorías te permiten organizar el foro de mensajes en temas (&quot;Deportes, Coches&quot;),
	y los &quot;Foros&quot; dentro de ellas son los temas en los cuales los usuarios pueden
	publicar mensajes. En el ejemplo anterior, un usuario interesado en un Audi,
	publicaría un mensaje en el foro &quot;Coches->Audi&quot;. Las Categorías permiten
	encontrar rápidamente cuales son sus intereses: En vez de &quot;Tienda&quot; se tienen
	tiendas de &quot;Hardware&quot; y &quot;Electrodomésticos&quot; a las que puedes ir.
	Esto simplifica tu búsqueda por &quot;Pantalla&quot;, ya que puedes ir a la &quot;categoría&quot; de
	tienda de Hardware en vez de la tienda de Electrodomésticos (donde encontrarías televisiones de pantalla
	plana en vez de, probablemente, protectores de pantalla para la computadora).<br />
	Como se puede percibir arriba, un foro engloba un tema específico dentro de la categoría más amplia.
	Si quieres discutir acerca de &quot;Audi&quot;, debes ir a la categoría &quot;Coches&quot; e ir al foro
	&quot;Audi&quot; para publicar tus mensajes acerca de lo que opinas en ese foro.<br />
	Las funciones administrativas en este menú son para crear nuevos foros en cada
	categoría, reordenarlas (poner &quot;Audi&quot; abajo de &quot;Ferrari&quot;), o borrar un
	foro completamente.';

$helptxt['edit_news'] = '	<ul class="normallist">
		<li>
			<strong>Editar Noticias del foro</strong><br />
			Esto te permite especificar el texto para los elementos de las noticias mostradas en la página índice del foro.
			Agrega cualquier elemento que desees (ej., &quot;Nueva versión del portal http://HablaJapones.org&quot;). Cada elemento de las noticias se separa por un <enter>
		</li>
		<li>
			<strong>Boletines</strong><br />
			Esta sección te permite enviar boletines a los miembros del foro vía mensaje personal o email. Primero selecciona los grupos que quieres que reciban el boletín, y los que nos quieres que lo reciban. Si quieres, puedes añadir miembros y direcciones de email adicionales que recibirán el boletín. Por último, introduce el mensaje que quieres enviar y selecciona si quieres que sea enviado a los usuarios como un mensaje personal o como un email.
		</li>
		<li>
			<strong>Configuración</strong><br />
				Esta sección contiene algunas opciones de configuración relativas a a las noticias y boletines, incluyendo la selección de qué grupos pueden editar las noticias del foro o enviar boletines. También hay una opción para configurar si quieres que los feeds de noticias estén activados en el foro, así como una opción para configurar su longitud (cuántos caracteres serán mostrados) para cada noticia en el feed.
		</li>
	</ul>';

$helptxt['view_members'] = '	<ul class="normallist">
		<li>
			<strong>Ver todos los usuarios</strong><br />
			Ver todos los usuarios en el foro de mensajes. Se te presenta una lista con hipervínculo, de todos los nombres de los usuarios. Puedes hacer clic
			en cualquiera de los nombres para obtener mayores detalles de un usuario en especial (sitio web, edad, sexo, etc), y como Administrador,
			puedes modificar cualquiera de esos datos. Tienes un total control sobre los usuarios, incluyendo la posibilidad de
			borrarlos del foro de mensajes.<br /><br />
		</li>
		<li>
			<strong>Esperando aprobación</strong><br />
			Esta sección se muestra solamente si tienes activado que los administradores aprueben todos los nuevos registros de usuarios. Cualquiera que se registre para unirse a tu
			foro se volverá un usuario completo cuando haya sido aprobado por un administrador. La sección muestra todos aquellos usuarios que
			estén esperando aprobación, junto con su email y dirección IP. Tu puedes escoger ya sea aceptar y rechazar (borrar)
			cualquier usuario en la lista al seleccionar el cuadro al lado del usuario, y seleccionando la acción del cuadro colapsable al final
			de la pantalla. Cuando rechaces un usuario, puedes escoger borrar el usuario con o sin notificarle de tu decisión.<br /><br />
		</li>
		<li>
			<strong>Esperando activación</strong><br />
			Esta sección será visible solamente si tienes activado en el foro el que los usuarios activen sus cuentas. Esta sección listará todos los
			usuarios que no han activado sus nuevas cuentas. Desde esta pantalla puedes escoger aceptar, rechazar o recordarles a los
			usuarios con registros pendientes. Como en la opción anterior, puedes escoger enviarle email al usuario para informarle de la
			acción que hayas tomado.<br /><br />
		</li>
	</ul>';

$helptxt['ban_members'] = '<strong>Usuarios con acceso prohibido</strong><br />
	SMF permite &quot;banear&quot; o &quot;restringir el acceso&quot; a usuarios, para prevenir el acceso a personas que han violado la confianza del foro de mensajes,
	al hacer spam, ser groseros, etc. Esto te permite restringirles el acceso a los usuarios que no desees más en tu foro de mensajes. Como administrador,
	cuando ves los mensajes puedes ver la IP que cada usuario utilizó al publicar su mensaje. En la lista de accesos prohibidos,
	simplemente introduce la dirección IP, guarda los cambios, y ningún usuario no podrá acceder al foro desde esa IP.<br />
	También puedes restringir el acceso de usuarios usando su dirección de email, o su nombre de usuario.';

$helptxt['featuresettings'] = '<strong>Editar características y opciones</strong><br />
	Hay numerosas características en esta sección que pueden ser cambiadas según tus preferencias.';

$helptxt['securitysettings'] = '<strong>Seguridad y moderación</strong><br />
	Esta sección contiene opciones relativas a la seguridad y moderación de tu foro.';

$helptxt['modsettings'] = '<strong>Opciones de Modificaciones (mods)</strong><br />
	Esta sección debería contener cualquier opción de configuración añadida por las modificaciones (mods) instaladas en tu foro.';

$helptxt['number_format'] = '<strong>Formato de Números</strong><br />
	Puedes ajustar cómo los números serán mostrados al usuario.  El formato es:<br />
	<div style="margin-left: 2ex;">1,234.00</div><br />
	Donde \',\' es el carácter utilizado para dividir los grupos de miles, \'.\' es el carácter utilizado como el punto decimal y el número de ceros indica la exactitud de los redondeos.';

$helptxt['time_format'] = '<b>Formato de Hora</b><br />
	Puedes ajustar como visualizarás la hora y la fecha. Hay mucha &quot;letra pequeña&quot;, pero es relativamente fácil.
	El formato sigue las especificaciones de la función strftime de PHP, y se describen a continuación (más detalles pueden encontrarse en <a href="http://www.php.net/manual/function.strftime.php" target="_blank" class="new_win">php.net</a>).<br />
	<br />
	Los siguientes caracteres se reconocen en la cadena del formato:<br />
	<span class="smalltext">
	&nbsp;&nbsp;%a - nombre abreviado del día de la semana <br />
	&nbsp;&nbsp;%A - nombre completo del día de la semana <br />
	&nbsp;&nbsp;%b - nombre abreviado del mes <br />
	&nbsp;&nbsp;%B - nombre completo del mes <br />
	&nbsp;&nbsp;%d - día del mes (01 a 31) <br />
	&nbsp;&nbsp;%D<strong>*</strong> - lo mismo que %m/%d/%y <br />
	&nbsp;&nbsp;%e<strong>*</strong> - día del mes (1 a 31) <br />
	&nbsp;&nbsp;%H - hora usando formato de 24 horas (rango 00 a 23) <br />
	&nbsp;&nbsp;%I - hora usando formato de 12 horas (rango 01 a 12) <br />
	&nbsp;&nbsp;%m - mes como número (01 a 12) <br />
	&nbsp;&nbsp;%M - minuto como número <br />
	&nbsp;&nbsp;%p - &quot;am&quot; o &quot;pm&quot; de acuerdo a la hora actual<br />
	&nbsp;&nbsp;%R<strong>*</strong> - hora en formato de 24 horas <br />
	&nbsp;&nbsp;%S - segundos como número decimal <br />
	&nbsp;&nbsp;%T<strong>*</strong> - hora actual, de la misma manera que %H:%M:%S <br />
	&nbsp;&nbsp;%y - año en formato de 2 dígitos (00 a 99) <br />
	&nbsp;&nbsp;%Y - año en formato de 4 dígitos <br />
	&nbsp;&nbsp;%% - carácter \'%\'  <br />
	<br />
	<em>* No funciona en servidores Windows.</em></span>';

$helptxt['live_news'] = '<strong>Anuncios en vivo</strong><br />
	Este cuadro muestra los anuncios recientemente actualizados desde <a href="http://www.simplemachines.org/" target="_blank" class="new_win">www.simplemachines.org</a>.
	Debes revisar esta página de vez en cuando por si hay actualizaciones, nuevas versiones, o información importante del equipo de Simple Machines.';

$helptxt['registrations'] = '<strong>Manejo del Registro de Usuarios</strong><br />
	Esta sección contiene todas las funciones que pueden ser necesarias para manejar nuevos registros de usuarios en el foro. Contiene hasta tres
	secciones que son visibles dependiendo de la configuración de tu foro. Éstas son:<br /><br />
	<ul class="normallist">
		<li>
			<strong>Registrar Nuevo usuario</strong><br />
			Desde esta pantalla puedes escoger registrar nuevas cuentas en nombre de los nuevos usuarios. Esto puede ser útil en foros donde el registro está cerrado
			para nuevos usuarios, o en casos donde el administrador desea crear una cuenta de prueba. Si la opción de requerir activación de la cuenta
			está seleccionada, se le enviará un email al usuario, con un enlace al que se le deberá hacer clic antes de que puedan usar la cuenta. Asimismo, puedes
			seleccionar el enviar por email al usuario una nueva contraseña a su dirección de email.<br /><br />
		</li>
		<li>
			<strong>Editar Carta de Aceptación al registrarse</strong><br />
			Esto te permite establecer el texto para la carta de aceptación mostrada a los usuarios cuando están en el proceso de registro para obtener una cuenta en tu foro de mensajes.
			Puedes cambiar cualquier texto de la carta de aceptación original que se incluye en SMF.
		</li>
		<li>
			<strong>Establecer nombres reservados</strong><br />
			Usando esta interfaz puedes especificar palabras o nombres que no pueden ser usados por tus usuarios.<br /><br />
		</li>
		<li>
			<strong>Configuración</strong><br />
			Esta sección será visible solamente si tienes permisos para administrar el foro. Desde esta pantalla puedes decidir el método de registro
			que será usado en tu foro, así como algunas otras configuraciones.
		</li>
	</ul>';

$helptxt['modlog'] = '<strong>Log de Moderación</strong><br />
	Esta sección le permite a los administradores mantenerse al tanto de todas las acciones de moderación que los moderadores del foro han realizado. Para asegurar que
	los moderadores no puedan eliminar las referencias a las acciones que ellos han realizado, las entradas no pueden eliminarse hasta 24 horas después de que la acción tuviera lugar.';
$helptxt['adminlog'] = '<strong>Registro de administración</strong><br />
	Esta sección permite a los miembros del equipo de administración seguir algunas de las acciones administrativas que han tenido lugar en el foro. Para asegurar que
	los admins no pueden eliminar referencias a las acciones que han llevado a cabo, las entradas no podrán ser borradas hasta transcurridas 24 horas desde que la acción tuvo lugar.';
$helptxt['warning_enable'] = '<strong>Sistema de Advertencias a Usuarios</strong><br />
	Permite a los usuarios moderadores y administradores advertir a usuarios y establecer un nivel de utilización de avisos para determinar las
	acciones que están disponibles para ellos en el foro. Al activar esta característica, dentro de la sección de permisos se activará una opción para definir 
	a qué grupos se pueden asignar advertencias a usuarios. Los niveles de advertencia se pueden ajustar en el perfil del usuario. Están disponibles las siguientes opciones adicionales:
	<ul class="normallist">
		<li>
			<strong>Nivel de Advertencia para Usuarios Vigilados</strong><br />
			Esta opción define el porcentaje de advertencia que debe alcanzar un usuario para que automáticamente se le asigne la etiqueta &quot;Vigilado&quot;.
			Cualquier usuario que esté siendo &quot;vigilado&quot; aparecerá en la zona principal del centro de moderación.
		</li>
		<li>
			<strong>Nivel de Advertencia para Moderación de Mensajes</strong><br />
			Cualquier mensaje publicado por un usuario que supere el valor establecido aquí no aparecerá en el foro hasta que sea aprobado por un 
			moderador. Esto prevalece sobre cualquier permiso local que pueda existir relacionado con moderación de temas.
		</li>
		<li>
			<strong>Nivel de Advertencia para Enmudecer</strong><br />
			Si un usuario supera este nivel, no tendrán permiso para publicar nada en el foro. El usuario perderá todos sus derechos relacionados con la escritura de mensajes/temas.
		</li>
		<li>
			<strong>Número Máximo de Puntos de Advertencia por Día</strong><br />
			Esta opción limita la cantidad de puntos que un moderador puede añadir/quitar a cualquier usuario en un periodo de veinticuatro horas. Puede 
			utilizarse para limitar lo que puede hacer un moderador en un periodo corto de tiempo. Esta opción puede desactivarse introduciendo cero. Los 
			usuarios con permisos de administrador no están afectados por este valor.
		</li>
	</ul>';
$helptxt['error_log'] = '<strong>Log de Errores</strong><br />
	El log de errores rastrea cualquier error grave encontrado por usuarios al usar tu foro. Lista todos esos errores por fecha, que puede ser usada para ordenar
	al hacer clic en la flecha negra al lado de cada fecha. Asimismo, puedes filtrar los errores al hacer clic en la imagen al lado de cada estadística de error. Esto
	te permite filtrar, por ejemplo, por usuario. Cuando un filtro está activo, solamente los resultados que concuerden con el filtro serán mostrados.';
$helptxt['theme_settings'] = '<strong>Configuración del Tema</strong><br />
	La pantalla de configuración te permite cambiar las configuración específica de un tema. Esta configuración incluye opciones tales como el directorio de los temas e información de URLs pero también
	opciones que afectan al diseño de un tema en tu foro. La mayoría de los temas tendrán una variedad de opciones configurables por el usuario, permitiéndote adaptar un tema
	para satisfacer las necesidades individuales de tu foro.';
$helptxt['smileys'] = '<strong>Centro de Smileys</strong><br />
	Aquí puedes agregar y eliminar smileys (emoticonos) así como conjuntos de smileys. Es importante mencionar que si un smiley está en un conjunto, debe estar en todos los conjuntos - de otra manera, podría
	ser confuso para tus usuarios cuando utilicen diferentes conjuntos.<br /><br />

	También puedes editar los iconos de mensaje desde aquí, si los tienes activados en la página de configuración.';
$helptxt['calendar'] = '<strong>Administrar Calendario</strong><br />
	Aquí puedes modificar la configuración del calendario actual, así como agregar y eliminar los días festivos que aparecen en él.';

$helptxt['serversettings'] = '<strong>Configuración del Servidor</strong><br />
	Aquí puedes realizar la configuración principal de tu foro. Esta sección incluye la configuración de la base de datos y URLs, así como otros 
	elementos importantes de la configuración como la configuración del correo y el caché. Sé cuidadoso al editar estas configuraciones porque un error podría dejar 
	inaccesible el foro';
$helptxt['manage_files'] = '	<ul class="normallist">
		<li>
			<strong>Navegar archivos</strong><br />
			Navegar a través de los adjuntos, avatares y miniaturas almacenados por SMF.<br /><br />
		</li><li>
			<strong>Configuración de adjuntos</strong><br />
			Configura dónde son almacenados los adjuntos y establece restricciones sobre los tipos de archivos que pueden ser adjuntados.<br /><br />
		</li><li>
			<b>Configuración de avatares</b><br />
			Configura dónde son almacenados los avatares y gestiona su redimensionamiento.<br /><br />
		</li><li>
			<strong>Mantenimiento de archivos</strong><br />
			Comprueba y repara cualquier error en el directorio de adjuntos y elimina los adjuntos seleccionados.<br /><br />
		</li>
	</ul>';

$helptxt['topicSummaryPosts'] = 'Esto te permite especificar el número de mensajes anteriores mostrados en el sumario de temas, en la pantalla de responder.';
$helptxt['enableAllMessages'] = 'Establece esto al número <em>máximo</em> de mensajes que un tema puede tener para mostrar el enlace <i>todos</i>.  Si estableces este valor menor al de &quot;Máximo número de mensajes a mostrar en una página de Tema&quot; lo unico que conseguirás es que nunca se muestre, y si lo estableces muy alto, puede alentar tu foro.';
$helptxt['enableStickyTopics'] = 'Mensajes fijados son temas que permanecen en la parte superior de la lista de mensajes.
	Son usados generalmente para mensajes importantes. Solamente moderadores y administradores pueden fijar un tema.';
$helptxt['allow_guestAccess'] = 'El desseleccionar esta opción limitará a los visitantes a hacer solamente las funciones mas básicas - ingresar, registrarse, recordar contraseña, etc - en tu foro.  Esto NO es lo mismo que deshabilitar el acceso de los visitantes a los foros.';
$helptxt['userLanguage'] = 'Al activar esta opción, los usuarios pueden seleccionar el archivo de idioma que usarán.
	Esto no afectará la selección predeterminada.';
$helptxt['trackStats'] = 'Estadísticas:<br />Esto permite a los usuarios ver los últimos mensajes, y los temas mas populares de tu foro de mensajes.
	También muestra varias estadísticas, como el máximo de usuarios conectados al mismo tiempo, nuevos usuarios, y nuevos temas.<hr />
	Páginas vistas:<br />Agrega otra columna a la página de estadísticas con el numero de páginas vistas en tu foro.';
$helptxt['titlesEnable'] = 'Activar los Títulos Personalizados permitirá a los usuarios que cuenten con el permiso respectivo crear un título especial para ellos mismos. Dicho título se mostrará debajo del nombre.<br /><em>Por ejemplo:</em><br />Omar<br />Maestro Jedi';
$helptxt['topbottomEnable'] = 'Esto agregará los botones ir arriba y abajo, para que los usuarios puedan ir a la parte superior e inferior de la página sin
	hacer scroll.';
$helptxt['onlineEnable'] = 'Esto mostrará una imagen indicando si el usuario está conectado o no.';
$helptxt['todayMod'] = 'Esto mostrará &quot;Hoy&quot; o &quot;Ayer&quot; en vez de la fecha.<br /><br /> <strong>Ejemplos:</strong><br /><br /> <dt> <dt>Desactivado</dt> <dd>Octubre 3, 2009 a las 12:59:18 am</dd> <dt>Sólo Hoy</dt> <dd>Hoy a las 12:59:18 am</dd> <dt>Hoy &amp; Ayer</dt> <dd>Ayer a las 09:36:55 pm</dd> </dt> ';
$helptxt['disableCustomPerPage'] = 'Marca esta opción para impedir a los usuarios que personalicen el número de mensajes e hilos que pueden mostrar por página en el Indice de Mensajes y en la página de Mensaje respectivamente.';
$helptxt['enablePreviousNext'] = 'Esto mostrará un enlace al tema anterior y al siguiente.';
$helptxt['pollMode'] = 'Esto especifica si las encuestas están activadas o no: Si las encuestas están desactivadas, cualquier encuesta ya existente será oculta
		del listado de temas. Puedes escoger el continuar mostrando los temas sin su encuesta asociada a ellos seleccionando
		&quot;Mostrar Encuestas existentes como Temas&quot;.Para seleccionar quién puede publicar encuestas, ver encuestas, y otras cosas, puedes
		permitir o restringir sus permisos. Recuerda esto si las encuestas no están funcionando.';
$helptxt['enableVBStyleLogin'] = 'Esto mostrará un cuadro para ingresar tu usuario/contraseña en la parte inferior del foro de mensajes.';
$helptxt['enableCompressedOutput'] = 'Esta opción compactará la salida para reducir el consumo de ancho de banda,
	pero necesita que zlib esté instalado en el servidor.';
$helptxt['disableTemplateEval'] = 'Por defecto, las plantillas son evaluadas en lugar de simplemente incluidas. Esto ayuda a mostrar información de depuración más útil en caso de que la plantilla contenga algún error.<br /><br /> Sin embargo, en foros grandes este proceso personalizado de inclusión puede ser significativamente más lento. Por tanto, los usuarios avanzados pueden querer desactivarlo.';
$helptxt['databaseSession_enable'] = 'Esta opción hace uso de la base de datos para guardar información de sesiones - es mejor para servidores con la carga balanceada, pero ayuda con todos los problemas de timeout y puede hacer más rápido al foro.  No funciona si session.auto_start está activado.';
$helptxt['databaseSession_loose'] = 'Activando esta opción disminuirá el ancho de banda que consume tu foro, y hace que al hacer <i>clic</i> en atrás no recargue la página - lo malo de esto es que los (nuevos) iconos no se actualizarán, entre otras cosas. (a menos que hagas <i>clic</i> en esa página en vez de regresar a ella.)';
$helptxt['databaseSession_lifetime'] = 'Este es el número de segundos que durarán las sesiones después que no hayan sido accesadas.  Si una sesión no es accesada por mucho tiempo, se dice que ha &quot;expirado&quot;.  Se recomienda cualquier valor arriba de 2400.';
$helptxt['enableErrorLogging'] = 'Esto registrará (log) cualquier error, como un ingreso de usuario inválido, para que puedas ver que salió mal.';
$helptxt['enableErrorQueryLogging'] = 'Esto incluirá la consulta completa enviada a la base de datos en el log de errores.  Requiere que el registro de errores esté activado.<br /><br /><strong>Nota:  Esto afectará a la capacidad de filtrar el registro de errores por mensaje de error.</strong>';
$helptxt['allow_disableAnnounce'] = 'Permite a los usuarios desactivar la notificación de temas que anuncies marcando &quot;anunciar tema&quot; al publicar.';
$helptxt['disallow_sendBody'] = 'Esta opción elimina la posibilidad de recibir el texto de las respuestas y los mensajes en los emails de notificación.<br /><br />Es común que los usuarios, por error, respondan a los emails de notificación, lo que significa en la mayoría de las veces que el webmaster recibe la respuesta.';
$helptxt['compactTopicPagesEnable'] = 'Esto mostrará como se mostrará la selección de las páginas.<br /><em>Ej.:</em>
		&quot;3&quot; para mostrar: 1 ... 4 [5] 6 ... 9 <br />
		&quot;5&quot; para mostrar: 1 ... 3 4 [5] 6 7 ... 9';
$helptxt['timeLoadPageEnable'] = 'Esto mostrará en la parte inferior del foro, el tiempo en segundos que SMF necesitó para crear la página.';
$helptxt['removeNestedQuotes'] = 'Esto eliminará las citas anidadas de un mensaje cuando dicho mensaje sea citado a través del enlace de cita.';
$helptxt['simpleSearch'] = 'Esto mostrará una forma de búsqueda simple, con un enlace a una forma para búsquedas avanzadas.';
$helptxt['max_image_width'] = 'Esto te permitirá establecer el máximo de una imagen publicada. Imágenes mas pequeñas que el máximo no son afectadas.';
$helptxt['mail_type'] = 'Esta opción te permite escoger entre usar las opciones por defecto de PHP, o sobreescribirlas con SMTP.  PHP no soporta el usar autentificación con SMTP (que en la actualidad, muchos servidores lo requieren) asi que, de necesitarlo, selecciona SMTP.  Recuerda que SMTP puede ser más lento, y algunos servidores no toman nombres de usuarios y contraseñas.<br /><br />No necesitas llenar los valores de SMTP, si esta opción está utilizando los valores por defecto de PHP.';
$helptxt['attachment_manager_settings'] = 'Los adjuntos son archivos que los usuarios pueden subir, y añadir a un mensaje.<br /><br />
		<strong>Comprobar extensión de los adjuntos</strong>:<br /> ¿Quieres comprobar la extensión de los adjuntos?<br />
		<strong>Extensiones de adjuntos permitidas</strong>:<br /> Puedes establecer las extensiones permitidas para los archivos adjuntos.<br />
		<strong>Directorio de adjuntos</strong>:<br /> La ruta a tu directorio de adjuntos<br />(ejemplo: /home/sitios/tusitio/www/forum/adjuntos)<br />
		<strong>Espacio Máximo del directorio de adjuntos</strong> (en KB):<br /> Selecciona el tamaño máximo que puede tener el directorio de adjuntos, incluyendo todos los archivos que hay en él.<br />
		<strong>Tamaño máximo de adjuntos por mensaje</strong> (en KB):<br /> Selecciona el tamaño máximo que pueden tener todos los adjuntos de un mismo mensaje. Si es menor que el límite por adjunto, éste será el límite.<br />
		<strong>Tamaño máximo por adjunto</strong> (en KB):<br /> Selecciona el tamaño máximo de cada adjunto por separado.<br />
		<strong>Número máximo de adjuntos por mensaje</strong>:<br /> Selecciona el número de adjuntos que una persona puede añadir a un mensaje.<br />
		<strong>Mostrar adjuntos como imagen en mensajes</strong>:<br /> Si el archivo subido es una imagen, la mostrará directamente dentro del mensaje.<br />
		<strong>Redimensionar imágenes al mostrarlas en mensajes</strong>:<br /> Si se selecciona esta opción, se guardará un adjunto (más pequeño) por separado para mejorar el uso del ancho de banda.<br />
		<strong>Ancho y largo máximo de la imagen reducida</strong>:<br /> Sólo se utiliza en la opción &quot;Redimensionar imágenes al mostrarlas en mensajes&quot; según el ancho y largo máximo establecido. Se redimensionarán proporcionalmente.';
$helptxt['attachment_image_paranoid'] = 'Seleccionar esta opción activará comprobaciones de seguridad muy estrictas en las imágenes adjuntas. ¡Advertencia! Estas comprobaciones de seguridad pueden fallar en imágenes válidas. Se recomienda encarecidamente usar esta opción junto con la recodificación de imágenes, de modo que SMF pueda reconstruir las imágenes en las que las comprobaciones de seguridad fallen: si tiene éxito, serán saneadas y subidas. En caso contrario, si la recodificación de imágenes no está activada, todos los adjuntos que fallen las comprobaciones de seguridad serán rechazados.';
$helptxt['attachment_image_reencode'] = 'Seleccionar esta opción hará que se traten de recodificar las imágenes adjuntas subidas. La recodificación de imágenes ofrece mejor seguridad. Sin embargo, ten en cuenta que la recodificación de imágenes también hace que todas las imágenes animadas sean convertidas en estáticas. <br /> Esta funcionalidad sólo es posible si el módulo GD está activado en tu servidor.';
$helptxt['avatar_paranoid'] = 'Seleccionar esta opción activará comprobaciones de seguridad muy estrictas en los avatares. ¡Advertencia! Estas comprobaciones de seguridad pueden fallar en imágenes válidas. Se recomienda encarecidamente usar esta opción junto con la recodificación de avatares, de modo que SMF pueda reconstruir las imágenes en las que las comprobaciones de seguridad fallen: si tiene éxito, serán saneadas y subidas. En caso contrario, si la recodificación de avatares no está activada, todos los avatares que fallen las comprobaciones de seguridad serán rechazados.';
$helptxt['avatar_reencode'] = 'Seleccionar esta opción hará que se traten de recodificar los avatares subidos. La recodificación de imágenes ofrece mejor seguridad. Sin embargo, ten en cuenta que la recodificación de imágenes también hace que todas las imágenes animadas sean convertidas en estáticas. <br /> Esta funcionalidad sólo es posible si el módulo GD está activado en tu servidor.';
$helptxt['karmaMode'] = 'Karma es una función que muestra la popularidad de un usuario Los usuarios, si tienen el permiso correspondiente, pueden
		\'aplaudir\' or \'castigar\' a otros usuarios, que es como su popularidad es calculada. Puedes cambiar el
		número de mensajes necesarios para tener &quot;karma&quot;, el tiempo entre castigos o aplausos, y si los administradores
		tienen que esperar este tiempo también.<br /><br />El que grupos de usuarios puedan castigar a otros se contola a través
		de un permiso. Si tienes problemas al tratar de hacer funcionar esta opción para todo mundo, deberías revisar nuevamente tus permisos.';
$helptxt['cal_enabled'] = 'El calendario puede ser usado para mostrar cumpleaños, o momentos importantes en tu foro.<br /><br />
		<strong>Mostrar días como enlaces a \'Publicar evento\'</strong>:<br />Esto permite a los usuarios publicar eventos para ese día cuando hagan clic en esa fecha<br />
		<strong>Mostrar números de semana</strong>:<br />Mostrar qué semana del año es.<br />
		<strong>Máximo de días adelantados en el índice del foro</strong>:<br />Si se establece en 7, se mostrarán todos los eventos de la próxima semana.<br />
		<strong>Mostrar días festivos en el índice del foro</strong>:<br />Muestra los días festivos del día de hoy en una barra del calendario en el índice del foro.<br />
		<strong>Mostrar cumpleaños en el índice del foro</strong>:<br />Muestra los cumpleaños del día de hoy en una barra del calendario en el índice del foro.<br />
		<strong>Mostrar eventos en el índice del foro</strong>:<br />Muestra los eventos del día de hoy en una barra del calendario en el índice del foro.<br />
		<strong>Foro default donde se publicarán</strong>:<br />¿Cuál es el foro predeterminado en el que se publicarán los eventos?<br />
		<strong>Permitir eventos no enlazado a posts</strong>:<br />Permite a los usuarios publicar eventos sin necesidad de que estén enlazados a un post en un foro.<br />
		<strong>Año mínimo</strong>:<br />Selecciona el &quot;primer&quot; año en la lista del calendario.<br />
		<strong>Año máximo</strong>:<br />Selecciona el &quot;último&quot; año en la lista del calendario<br />
		<strong>Color para los cumpleaños</strong>:<br />Selecciona el color del texto cuando se muestren cumpleaños<br />
		<strong>Color para los eventos</strong>:<br />Selecciona el color del texto cuando se muestren eventos<br />
		<strong>Color para días festivos</strong>:<br />Selecciona el color del texto cuando se muestren días festivos<br />
		<strong>Permitir que los eventos se extiendan varios días</strong>:<br />Selecciónalo para permitir que los eventos se expandan múltiples días.<br />
		<strong>Número máximo de días que un evento puede expandirse</strong>:<br />Selecciona el máximo número de días que un evento puede expandirse.<br /><br />
		Recuerda que el uso del calendario (publicar eventos, ver eventos, etc.) está controlado por los permisos especificados en la pantalla de permisos.';
$helptxt['localCookies'] = 'SMF usa cookies para guardar información al ingresar, en la computadora del usuario.
	Las cookies pueden guardarse globalmente (<i>tusitio.com</i>) o localmente (<i>tusitio.com/ruta/al/foro</i>).<br />
	Selecciona esta opción si estas teniendo problemas con usarios que están siento sacados de tu foro de mensajes automaticamente.<hr />
	Cookies almacenadas globalmente son menos seguras cuando se usan en un servidor web compartido (como Tripod).<hr />
	Cookies locales no funcionan afuera del directorio del foro, asi que si tu foro está almacenado en <i>www.tusitio.com/foro</i>, páginas como <i>www.tusitio.com/index.php</i> no pueden accesar la información de la cuenta.
	Especialmente cuando se usa SSI.php, se recomienda el uso de cookies globales.';
$helptxt['enableBBC'] = 'El seleccionar esta opción le permitirá a tus usuarios el poder utilizar Bulletin Board Code (BBC) en el foro, permitiendoles darle formato a sus mensajes con imágenes, estilos de texto, y más.';
$helptxt['time_offset'] = 'No todos los administradores de los foros necesitan que el foro use la misma zona horaria que el servidor en el que está hospedado. Usa esta opción para especificar una diferencia horaria (en horas) en la que el foro debe operar, comparada con la hora del servidor. Son permitidos valores negativos y decimales.';
$helptxt['default_timezone'] = 'La zona horaria del servidor le dice a PHP dónde está localizado dicho servidor. Deberías asegurarte de que está establecida correctamente, preferentemente en el país en el que la ciudad está situada. Puedes encontrar más información en el <a href="http://www.php.net/manual/en/timezones.php" target="_blank">sitio de PHP</a>.';
$helptxt['spamWaitTime'] = 'Aquí puedes seleccionar el tiempo que debe transcurrir entre publicación de mensajes. Esto puede utilizarse para evitar que las personas hagan spam en tu foro, al limitarles qué tan seguido pueden publicar mensajes.';

$helptxt['enablePostHTML'] = 'Esto permitirá el publicar mensajes tags básicos de HTML:
	<ul class="normallist" style="margin-bottom: 0;">
		<li>&lt;b&gt;, &lt;u&gt;, &lt;i&gt;, &lt;s&gt;, &lt;em&gt;, &lt;ins&gt;, &lt;del&gt;</li>
		<li>&lt;a href=&quot;&quot;&gt;</li>
		<li>&lt;img src=&quot;&quot; alt=&quot;&quot; /&gt;</li>
		<li>&lt;br /&gt;, &lt;hr /&gt;</li>
		<li>&lt;pre&gt;, &lt;blockquote&gt;</li>
	</ul>';

$helptxt['themes'] = 'Aquí puedes escoger si el usuario puede seleccionar temas, qué tema será usado por los invitados,
	entre varias opciones. Haz <i>clic</i> en cualquiera de los temas de la derecha para cambiar su configuración.';
$helptxt['theme_install'] = 'Esto te permite instalar nuevos temas.  Puedes hacerlo desde un directorio previamente creado, subiendo el archivo para el tema, o copiando el tema de default.<br /><br />Toma en cuenta que el archivo o directorio debe tener el archivo de definición <tt>theme_info.xml</tt>.';
$helptxt['enableEmbeddedFlash'] = 'Esta opción le permitirá a tus usuarios usar Flash dentro de sus mensajes,
	como si fueran imágenes.  Esto es un posible riesgo de seguridad, aunque pocos han podido explorarlo.
	¡USALO BAJO TU PROPIO RIESGO!';
// !!! Add more information about how to use them here.
$helptxt['xmlnews_enable'] = 'Permite crear un enlace a las <a href="%s?action=.xml;sa=news">Noticas Recientes</a>
	y datos similares.  Se recomienda que limites el tamaño de los mensajes/noticias porque cuando los datos rss se muestran
	en algunos clientes como Trillian, se trunca la información.';
$helptxt['hotTopicPosts'] = 'Cambia el número de mensajes en un tema necesarios para alcanzar el estado de &quot;caliente&quot; o
	&quot;muy caliente&quot;.';
$helptxt['globalCookies'] = 'Permite el uso de cookies independientes de subdominio.  Por ejemplo, si...<br />
	Tu sitio está en http://www.simplemachines.org/,<br />
	Y tu foro está en http://foro.simplemachines.org/,<br />
	Usando esta modificación, te permitirá accesar las cookies del foro en tu sitio.';
$helptxt['secureCookies'] = 'Activar esta opción forzará a las cookies creadas por los usuarios en tu foro a ser marcadas como seguras. Activa esta opción sólo si estás usando HTTPS a través de tu sitio, ya que romperá el manejo de cookies de otra manera';
$helptxt['securityDisable'] = 'Esto <em>desactiva</em> la revisión adicional de contraseña para acceder a la sección de administración. ¡NO es recomendable!';
$helptxt['securityDisable_why'] = 'Esta es tu contraseña actual. (la misma que usas para ingresar.)<br /><br />El que tengas que escribirla ayuda a asegurarnos que realmente desees realizar la tarea administrativa que estés realizando, y que eres <strong>tú</strong> el que la realiza.';
$helptxt['emailmembers'] = 'En este mensaje puedes usar algunas &quot;variables&quot;.  éstas son:<br />
	{\\$board_url} - El URL de tu foro.<br />
	{\\$current_time} - La hora actual.<br />
	{\\$member.email} - El correo electronico del usuario destino.<br />
	{\\$member.link} - El enlace del usuario destino.<br />
	{\\$member.id} - El ID del usuario destino.<br />
	{\\$member.name} - El nombre del usuario destino.  (mayor personalización)<br />
	{\\$latest_member.link} - El enlace al último usuario registrado.<br />
	{\\$latest_member.id} - El ID del último usuario registrado.<br />
	{\\$latest_member.name} - El nombre del último usuario registrado.';
$helptxt['attachmentEncryptFilenames'] = 'Encriptar los nombres de los attachments te permite tener más de un archivo subido como attachment
	con el mismo nombre. Para mayor seguridad usa archivos .php para bajar los archivos adjuntos.  Sin embargo, hace más difícil reconstruir
	la base de datos si algo drástico sucede.';

$helptxt['failed_login_threshold'] = 'Especifica el número de intentos fallidos de ingreso, antes de redireccionarlos a la pantalla de recordatorio de contraseñas.';
$helptxt['oldTopicDays'] = 'Si esta opción está activada se le mostrará al usuario una advertencia cuando intente responder a un tema que no ha tenido nuevas respuestas por el tiempo especificado, en días, en esta opción. Pon 0 para desactivar esta función.';
$helptxt['edit_wait_time'] = 'Número de segundos que deben transcurrir después de la publicación de un mensaje, para que se registre la fecha de la última modificación.';
$helptxt['edit_disable_time'] = 'Número de minutos transcurridos permitidos antes de que un usuario no pueda continuar editando un mensaje que ha publicado. Pon 0 para desactivarlo. <br /><br /><em>Nota: Esto no tendrá efecto en los usuarios que tengan el permiso para editar los mensajes de otros usuarios.</em>';
$helptxt['posts_require_captcha'] = 'Esta opción obligará a los usuarios a introducir un código mostrado en una imagen de verificación cada vez que creen un mensaje en el foro. Sólo usuarios con un número de mensajes menor que el valor establecido necesitarán introducir el código (debería ayudar a combatir scripts automáticos de spam).';
$helptxt['enableSpellChecking'] = 'Activar la revisión de ortografía. DEBES tener la librería pspell instalada en tu servidor y configurado PHP para la utilice. Tu servidor ' . (function_exists('pspell_new') == 1 ? 'SI' : 'NO') . ' parece que tenga esta opción configurada.';
$helptxt['disable_wysiwyg'] = 'Esta opción desactiva a los usuarios el uso del editor WYSIWYG (&quot;What You See Is What You Get&quot;: Lo que Ves es lo que Obtienes) en la página de edición del mensaje.';
$helptxt['lastActive'] = 'Especifica el número de minutos en los que, antes de ese tiempo, un usuario se sigue mostrando activo en el índice del foro. El default son 15 minutos.';

$helptxt['customoptions'] = 'Esta sección define las opciones que un usuario puede elegir de un cuadro desplegable. Hay varios puntos claves a tener en cuenta en esta sección:
	<ul class="normallist">
		<li><strong>Opción por defecto:</strong> Aquella opción que tenga un &quot;radio button&quot; seleccionado será la selección por defecto para el usuario cuando éste introduzca su perfil.</li>
		<li><strong>Eliminar Opciones:</strong> Para eliminar una opción simplemente limpia el cuadro de texto de esa opción (todos los usuarios que la seleccionaron tendrán su opción eliminada.</li>
		<li><strong>Reordenar Opciones:</strong> Puedes reordenar opciones moviendo texto entre los cuadros de texto. Sin embargo (importante), debes asegurarte de <strong>no</strong> cambiar el texto al reordenar opciones o bien los datos del usuario se perderán.</li>
	</ul>';

$helptxt['autoOptDatabase'] = 'Esta opción optimiza automaticamente la base de datos cada X días.  Especifica 1 para realizar una optimización diaria.  Asimismo, puedes especificar un máximo número de usuarios en línea, para que no sobrecargues tu servidor o incomodes a muchos usuarios.';
$helptxt['autoFixDatabase'] = 'Esto arreglará automáticamente tablas en la base de datos con problemas, y continuará como si nada hubiera sucedido.  Esto puede ser útil, ya que la única manera de arreglar este tipo de problemas, es REPARANDO la tabla, y tu foro no estará caído hasta que te des cuenta.  Se te enviará un email cuando esto suceda.';

$helptxt['enableParticipation'] = 'Esto muestra un pequeño icono en los temas en que el usuario ha publicado mensajes.';

$helptxt['db_persist'] = 'Mantiene la conexión activa para incrementar el rendimiento.  Si tu NO estás en un servidor dedicado, esto puede causarte problemas con tu proveedor de hospedaje.';
$helptxt['ssi_db_user'] = 'Opcionalmente se puede utilizar un usuario y contraseña diferentes para la base de datos al utilizar SSI.php.';

$helptxt['queryless_urls'] = 'Esto cambia el formato de los URLs un poco, para que sean más agradables para los servicios de búsqueda (google, por ejemplo).  Estos URLs se verán como, por ejemplo: index.php/topic,1.0.html.

Esta característica ' . (isset($_SERVER['SERVER_SOFTWARE']) && (strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false || strpos($_SERVER['SERVER_SOFTWARE'], 'lighttpd') !== false) ? '' : 'no') . ' funcionará en tu servidor.';
$helptxt['countChildPosts'] = 'Al marcar esta opción, todos los mensajes y temas de un foro hijo contarán en los totales del foro.<br /><br />Esto hará los procesos notablemente más lentos, pero hará que los foros padres que no tengan mensajes no se muestren como \'0\'.';
$helptxt['fixLongWords'] = 'Esta opción divide las palabras que sean más largas de cierta longitud en partes, para que no destruyan la apariencia del foro (en lo posible...). Esta opción no debería establecerse a un valor por debajo de 40. Esta opción no funcionará en foros que usen UTF-8 y una versión de PHP inferior a la 4.4.0. Esta opción ' . (empty($GLOBALS['context']['utf8']) || version_compare(PHP_VERSION, '4.4.0') != -1 ? '' : 'NO') . ' funcionará en tu servidor.';
$helptxt['allow_ignore_boards'] = 'Al marcar esta opción permitiras a los usuarios seleccionar foros que quieran ignorar.';

$helptxt['who_enabled'] = 'Esta opción te permite activar o desactivar la posibilidad de que los usuarios vean quién está en linea navegando el foro, así como lo que están haciendo.';

$helptxt['recycle_enable'] = '&quot;Recicla&quot; temas y mensajes eliminados al foro especificado.';

$helptxt['enableReportPM'] = 'Esta opción permite a tus usuarios informar a los administradores sobre mensajes privados que hayan recibido. Puede ser útil para controlar cualquier abuso de los mensajes privados.';
$helptxt['max_pm_recipients'] = 'Esta opción te permite establecer el número máximo de destinatarios permitidos en un mensaje privado enviado por un usuario del foro. Puede utilizarse para facilitar el bloqueo de abuso de spam en el sistema de Mensajes Privados. Observa que los usuarios con permiso para enviar boletines de noticias están exentos de esta restricción. Introduce cero para ilimitado.';
$helptxt['pm_posts_verification'] = 'Esta opción obligará a los usuarios a introducir un código mostrado en una imagen de verificación cada vez que manden un mensaje privado. Solamente usuarios con un número de mensajes inferior al establecido necesitarán introducir el código - esto deberia ayudar contra los scripts automatizados de spam.';
$helptxt['pm_posts_per_hour'] = 'Esto limitará el número de mensajes privados, los cuales hayan sido enviados por un usuario en el periodo de una hora. Esto no afecta a los administradores o moderadores.';

$helptxt['default_personal_text'] = 'Establece el texto por defecto que un usuario tendrá como &quot;texto personal.&quot;';

$helptxt['modlog_enabled'] = 'Guardar logs de todas las acciones de los moderadores.';

$helptxt['guest_hideContacts'] = 'Si esta opción está seleccionada las direcciones de email y los detalles de los mensajeros (ICQ, Y!, MSN)
	de todos tus usuarios se le ocultarán a los visitantes de tu foro';

$helptxt['registration_method'] = 'Esta opción determina que método de registro es usado para las personas que deseen unirse a tu foro. Puedes seleccionarlo entre:<br /><br />
	<ul class="normallist">
		<li>
			<strong>Registro Desactivado:</strong><br />
				Desactiva el proceso de registro, con este método nadie puede registrarse en tu foro.<br />
		</li><li>
			<strong>Registro Inmediato</strong><br />
				Los nuevos usuarios pueden ingresar y publicar inmediatamente después de registrarse en tu foro.<br />
		</li><li>
			<strong>Activación de Usuario</strong><br />
				Cuando esta opción está activada cualquier usuario que se registre en tu foro tendrá un enlace de activación que se le enviará por email, y que tendrá que visitar antes de poder convertirse en usuario válido<br />
		</li><li>
			<strong>Aprobación de Usuarios</strong><br />
				Esta opción hará que todos los nuevos usuarios que se registren en tu foro necesiten ser aprobados por un administrador para que se puedan volver usuarios válidos.
		</li>
	</ul>';
$helptxt['register_openid'] = '<strong>Autenticar con OpenID</strong><br />
	OpenID es una plataforma que permite usar un nombre usuario en múltiples sitios de internet, para simplificar la experiencia online. Para usar OpenID, primero necesitas crear una cuenta OpenID - puedes encontrar una lista de proveedores del servicio en <a href="http://openid.net/" target="_blank">El sitio oficial de OpenID</a><br /><br /> Cuando hayas conseguido un cuenta en OpenID, simplemente escribe tu URL de identificación única en el cuadro de texto de OpenID y envíala. Tras esto serás llevado a tu proveedor para verificar tu identidad antes de ser devuelto a este sitio.<br /><br /> En tu primera visita a este, deberás confirmar varios detalles antes de ser reconocido. Una vez hecho esto, podrás iniciar sesión en este sitio y cambiar las opciones OpenID en tu perfil.<br /><br /> Para más información visita <a href="http://openid.net/" target="_blank">El sitio oficial de OpenID</a>.';

$helptxt['send_validation_onChange'] = 'Cuando esta opción está seleccionada todos los usuarios que cambien su dirección de email en su perfil tendrán que reactivar sus cuentas desde el email enviado a la nueva dirección';
$helptxt['send_welcomeEmail'] = 'Cuando esta opción está seleccionada a todos los nuevos usuarios se les enviará un email de bienvenida a tu foro';
$helptxt['password_strength'] = 'Esta opción determina el grado de robustez requerido para las contraseñas seleccionadas por los usuarios de tu foro. Cuanto más &quot;robusta&quot; sea la contraseña, más difícil es comprometer las cuentas de los usuarios.
	Las posibles opciones son:
	<ul class="normallist">
		<li><strong>Baja:</strong> La contraseña debe contener al menos cuatro caracteres.</li>
		<li><strong>Media:</strong> La contraseña debe contener al menos ocho caracteres, y no puede ser parte del nombre o dirección email del usuario.</li>
		<li><strong>Alta:</strong> Como la Media, excepto que la contraseña debe contener también una mezcla de mayúsculas, minúsculas y al menos un número.</li>
	</ul>';

$helptxt['coppaAge'] = 'El valor especificado en este cuadro determinará la edad mínima que los nuevos usuarios deben tener para que se les conceda acceso inmediato a los foros.
	Durante el proceso de registro se les pedirá que confirmen si son mayores a esa edad, y de no serlo, puede o negársele su solicitud, o suspendarla esperando por la aprobación de los padres - dependiendo del tipo de restricción escogida.
	Si se pone 0 en este valor, entonces todas las restricciones de edad se ignorarán.';
$helptxt['coppaType'] = 'Si las restricciones de edad están activas, entonces este valor determinará qué pasará cuando un usuario más jóven de la edad mínima intenta registrarse en tu foro. Hay dos posibilidades:
	<ul class="normallist">
		<li>
			<strong>Rechazar su solicitud de registro:</strong><br />
				A cualquier nuevo usuario que no cumpla con la edad mínima se le rechazará su solicitud de registro inmediatamente.<br />
		</li><li>
			<strong>Requerir aprobación del Padre o Tutor</strong><br />
				La cuenta de cualquier nuevo usuario que no cumpla con la edad mínima marcará como pendiente de autorización, y se le mostrará un formulario en la que sus padres o tutores deben dar el permiso expreso para que se convierta en un usuario del foro.
				También se les mostrarán los datos de contacto que se especificaron en la pantalla de configuración, para que puedan enviar el formulario al administrador por correo o fax.
		</li>
	</ul>';
$helptxt['coppaPost'] = 'Los cuadros de contacto son requeridos para que las formas que otorgan el permiso a los usuarios por debajo de la edad mínima pueda ser enviada al administador del foro. Estos detalles serán mostrados a todos los usuarios por debajo de la edad mínima, y son necesarios para la aprobación del padre o tutor. Por lo menos se debe proveer una dirección postal o un número de fax.';

$helptxt['allow_hideOnline'] = 'Cuando esta opción está seleccionada todos los usuarios podrían ocultarle a los demás usuarios si están conectados (excepto a los administradores). Si está desactivado, solamente los usuarios que pueden moderar el foro pueden ocultar su presencia. Es importante mencionar que deshabilitando esta opción no cambia el estado de ningún usuario existente - simplemente les impide ocultarse en el futuro.';
$helptxt['make_email_viewable'] = 'Si se activa esta opción, en vez de tener las direcciones email ocultas para usuarios normales e invitados, serán públicamente visibles para todos en el foro. Activar esto pondrá a tus usuarios en grave riesgo de ser víctimas de spam debido a los spambots que a buen seguro visitarán tu foro. Esta opción no sobreescribe la opción de usuario para ocultar su propia dirección de email a los usuarios. <strong>No</strong> se recomienda activar esta opción.';
$helptxt['meta_keywords'] = 'Estas palabras clave son enviadas en la salida de cada página para indicar a los motores de búsqueda (y demás) el contenido clave de tu sitio. Una coma deberá separar cada palabra de la lista, y no debes utilizar HTML.';

$helptxt['latest_support'] = 'Este panel te muestra algunos de problemas y preguntas más comunes de la configuración de tu servidor. No te preocupes, esta información no se registra en ningún momento.<br /><br />Si permanece como &quot;Obteniendo información de soporte...&quot;, tu computadora muy probablemente no se puede conectar a <a href="http://www.simplemachines.org/" target="_blank">www.simplemachines.org</a>.';
$helptxt['latest_packages'] = 'Aquí puedes ver algunos de los más populares mods, así como algunos paquetes o mods aleatorios, con instalaciones rápidas y sencillas.<br /><br />Si esta sección no se puede mostrar, probablemente tu computadora no se puede conectar a <a href="http://www.simplemachines.org/" target="_blank">www.simplemachines.org</a>.';
$helptxt['latest_themes'] = 'Esta área muestra algunos de los últimos y más populares temas de <a href="http://www.simplemachines.org/" target="_blank">www.simplemachines.org</a>.  Puede que no se muestre correctamente si tu computadora no puede encontrar <a href="http://www.simplemachines.org/" target="_blank">www.simplemachines.org</a>.';

$helptxt['secret_why_blank'] = 'Por tu seguridad, la respuesta a tu pregunta (así como tu contraseña) está encriptada de una manera en la que SMF puede decirte solamente si está correcta, así, jamás podrá decirte (¡o a alguien más, que es lo importante!) cual es tu respuesta o tu contraseña.';
$helptxt['moderator_why_missing'] = 'Debido a que la moderación se realiza en cada foro, debes hacer a un usuario moderador desde la <a href="javascript:window.open(\'%s?action=manageboards\'); self.close();">interface de manejo de foros</a>.';

$helptxt['permissions'] = 'A través de los permisos les permites o impides a los grupos hacer cosas específicas.<br /><br />Puedes modificar varios foros al mismo tiempo usando las casillas, o busca en los permisos por un grupo específico al hacer clic en \'Modificar.\'';
$helptxt['permissions_board'] = 'Si un foro se especifica como \'Global,\' significa que el foro no tendrá permisos especiales.  \'Local\' significa que tendrá sus propios permisos - separados de los globales.  Esto te permite tener un foro que tiene más (o menos) permisos que otro, sin que sea necesario que los especifiques para cada uno de los foros.';
$helptxt['permissions_quickgroups'] = 'Estos te permiten usar la configuración &quot;default&quot; de permisos - estándar significa \'nada especial\', restrictivo significa \'como visitante\', moderador significa \'que un moderador tiene\', y por último \'mantenimiento\' significa permisos muy cercanos a los de un administrador.';
$helptxt['permissions_deny'] = 'Denegar permisos puede ser útil cuando quieres quitar permisos de algunos usuarios. Puedes añadir un grupo con permiso \'denegado\' a los miembros que deseas denegar un permiso.<br /><br />Utilízalos con cuidado, un permiso denegado prevalece, no importa a que otros grupos pertenezca el usuario.';
$helptxt['permissions_postgroups'] = 'Al activar permisos para grupos basados en el número de mensajes podrás asignar permisos a usuarios que han publicado una cierta cantidad de mensajes. Los permisos de grupos basados en el número de mensajes se <em>añaden</em> a los permisos de los grupos convencionales.';
$helptxt['membergroup_guests'] = 'El grupo de invitados son todos los usuarios que no están conectados.';
$helptxt['membergroup_regular_members'] = 'Los usuarios regulares son todos aquellos que están conectados, pero que no tienen asignado un grupo primario.';
$helptxt['membergroup_administrator'] = 'El administrador puede, por definición, ver y realizar cualquier cosa en el foro. No se establecen permisos para el administrador.';
$helptxt['membergroup_moderator'] = 'El grupo Moderador es un grupo especial. Los permisos y opciones asignadas a este grupo son aplicables a los moderadores pero solamente <em>en los foros que moderan</em>. Fuera de ellos son como cualquier otro usuario.';
$helptxt['membergroups'] = 'En SMF hay dos tipos de grupos a los que tus usuarios pueden pertenecer. Estos son:
	<ul class="normallist">
		<li><strong>Grupos Regulares:</strong> Un grupo regular es un grupo en el que los usuarios no son automáticamente añadidos. Para añadir a un usuario al grupo simplemente ve a su perfil y haz clic en &quot;Configuración de la cuenta&quot;. Ahí puedes asignarle todos los grupos regulares a los que deseas que pertenezca.</li>
		<li><strong>Grupos de Mensajes:</strong> A diferencia de los grupos regulares, este tipo de grupos no pueden ser asignados manualmente. En vez de eso, los usuarios son asignados automáticamente a un grupo de este tipo cuando alcanzan el mínimo de mensajes publicados necesarios para pertenecer a dicho grupo.</li>
	</ul>';

$helptxt['calendar_how_edit'] = 'Puedes editar esos eventos haciendo clic en el asterisco rojo (*) al lado de sus nombres.';

$helptxt['maintenance_backup'] = 'Esta área te permite guardar una copia de todos los mensajes, configuraciones, usuarios, y otra información de tu foro en un archivo muy grande.<br /><br />Es recomendado hacerlo a menudo, probablemente semanalmete, por seguridad.';
$helptxt['maintenance_rot'] = 'Esto te permite <strong>completa</strong> e <strong>irrevocablemente</strong> borrar temas viejos. Es recomendable que intentes hacer un respaldo primero, en caso que accidentalmente borres algo que no deseabas.<br /><br />Usa esta opción con cuidado.';
$helptxt['maintenance_members'] = 'Te permite <strong>completa</strong> e <strong>irrevocablemente</strong> eliminar cuentas de usuario de tu foro. Se recomienda <strong>encarecidamente</strong> que se realice una copia de seguridad antes, para casos en los que puedas eliminar algo que realmente no querías.<br /><br />Utiliza esta opción con cuidado.';

$helptxt['avatar_server_stored'] = 'Permite a los usuarios utilizar avatares guardados en tu servidor. Generalmente, están en el mismo directorio que SMF, en el directorio de avatares.<br />Como consejo, si creas subdirectorios en él, puedes crear &quot;categorías&quot; de avatares.';
$helptxt['avatar_external'] = 'Al activarlo, los usuarios pueden teclear una URL que enlace con su propio avatar. El inconveniente es que, en algunos casos, pueden utilizar avatares que son muy grandes o retratos que no quieres en tu foro.';
$helptxt['avatar_download_external'] = 'Con esta opción activada, se descargará el avatar del URL especificado por el usuario. Si el proceso fue realizado con éxito, el avatar se tratará como un avatar subido por el usuario.';
$helptxt['avatar_upload'] = 'Esta opción es similar a &quot;Permitir a los usuarios seleccionar un avatar externo&quot;, excepto que tienes un mejor control sobre los avatares, una mejor manera de redimensionarlos y los usuarios no tienen que tener un sitio donde poner sus avatares.<br /><br />Sin embargo, el inconveniente es que puede utilizar mucho espacio de tu servidor.';
$helptxt['avatar_download_png'] = 'Los PNG son más grandes, pero ofrecen una mejor calidad de compresión. De no estar seleccionado, se usará en su lugar JPEG - que generalmente es de menor tamaño, pero con menor calidad.';

$helptxt['disableHostnameLookup'] = 'Esto desactiva la búsqueda de nombres de servidores, que en algunos servidores es muy lento.  Es importante mencionar que ésto hará la restricción de accesos menos eficaz.';

$helptxt['search_weight_frequency'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes especificamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos.<br /><br />Este factor cuenta la cantidad de mensajes que coincidieron y los divide por el número total de mensajes dentro del tema.';
$helptxt['search_weight_age'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes especificamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos.<br /><br />Este factor califica la antigüedad del último mensaje dentro de un tema. Entre más reciente es, mayor su puntuación.';
$helptxt['search_weight_length'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes especificamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos.<br /><br />Este factor está basado en el tamaño del tema. Entre más mensajes tenga un tema, mayor su puntuación.';
$helptxt['search_weight_subject'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes especificamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos.<br /><br />Este factor revisa si se encuentran coincidencias en el asunto del tema.';
$helptxt['search_weight_first_message'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes especificamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos.<br /><br />Este factor revisa si se encuentran coincidencias en el primer mensaje del tema.';
$helptxt['search_weight_sticky'] = 'Los factores de peso se usan para determinar la relevancia de los resultados de la búsqueda. Cambia estos factores de peso para que coincida con las cosas que son importantes específicamente para tu foro. Por ejemplo, un foro de un sitio de noticias, puede necesitar un valor relativamente alto para \'antigüedad del último mensaje que coincidió\'. Todos los valores son relativos, relacionados entre sí, y deben ser enteros positivos<br /><br />Este factor revisa cuando un tema está fijado e incrementa su relevancia si lo está.';
$helptxt['search'] = 'Aquí puedes ajustar la configuración de la función de búsqueda. Es importante mencionar que aquí no puedes especificar quien tiene acceso a la función de búsqueda. Usa la pantalla de \'manejar permisos\' en el panel administrativo para eso.';
$helptxt['search_why_use_index'] = 'Un índice de búsqueda puede mejorar enormemente la ejecución de las búsquedas en tu foro. Especialmente cuando el número de mensajes de un foro aumenta, buscar sin un índice puede llevar bastante tiempo e incrementa la presión sobre tu base de datos. Si tu foro tiene más de 50.000 mensajes, deberías considerar el crear un índice de búsqueda para asegurar un funcionamiento óptimo del tu foro.<br /><br />Ten en cuenta que un índice de búsqueda puede ocupar espacio. Un índice fulltext es un índice incorporado a MySQL. Es relativamente compacto (aproximadamente el mismo tamaño que la tabla de mensajes), pero muchas de las palabras no son indexadas y puede ralentizar algunas de las consultas. El índice personalizado es a menudo mayor (dependiendo de tu configuración puede triplicar el tamaño de la tabla de mensajes) pero su funcionamiento es mejor que fulltext y relativamente estable.';

$helptxt['see_admin_ip'] = 'A los administradores y moderadores se les muestran las IPs para facilitar la moderación y para hacer más fácil el rastreo de personas indeseables. Recuerda que las direcciones IP no siempre son identificatorias, y que las IPs cambian periódicamente.<br /><br />También se les permite a los usuarios ver su propia IP.';
$helptxt['see_member_ip'] = 'Tu dirección IP es mostrada solamente a tí y a los moderadores. Recuerda que esta información no es identificatoria y muchas IPs cambian periódicamente.<br /><br />No puedes ver las IPs de otros usuarios y ellos no pueden ver la tuya.';
$helptxt['whytwoip'] = 'SMF utiliza varios métodos para detectar direcciones IP. Usualmente estos dos métodos obtienen la misma dirección pero en algunos casos puede detectarse más de una dirección. En este caso SMF registrará ambas, y las utilizará para bloqueos (etc). Puedes marcar en cualquiera de ellas para vigilar esa IP y bloquearla si es necesario.';

$helptxt['ban_cannot_post'] = 'La restricción \'no puede publicar\' establece el modo sólo-lectura para el usuario restringido. El usuario no puede crear nuevos temas, ni responder a temas ya existentes, ni enviar mensajes privados ni votar en encuestas. Los usuarios restringidos, sin embargo, pueden leer mensajes privados y temas.<br /><br />Se muestra un mensaje de advertencia a usuarios que tiene restringido el acceso de esta manera.';

$helptxt['posts_and_topics'] = '	<ul class="normallist">
		<li>
			<strong>Configuración de Mensajes</strong><br />
			Modifica la configuración relacionada con la publicación de mensajes y la manera en la que se muestran. Puedes también activar la comprobación ortográfica aquí.
		</li><li>
			<strong>Códigos BBC</strong><br />
			Activa los códigos que permiten dar formato a los mensajes del foro. También se ajusta qué códigos se permiten y cuáles no.
		</li><li>
			<strong>Palabras Censuradas</strong>
			Para controlar el lenguaje de tu foro, puedes censurar ciertas palabras. Esta función te permite convertir palabras prohibidas en versiones adecuadas.
		</li><li>
			<strong>Configuración de Temas</strong>
			Modifica la configuración relacionada con temas. El número de temas por página, dónde están activados o no los mensajes pegados, el número de mensajes necesarios para ser un tema candente, etc.
		</li>
	</ul>';
$helptxt['spider_group'] = 'Seleccionando un grupo restrictivo, cuando un invitado es detectado como un rastreador de búsquedas (search crawler) le será automáticamente asignado cualquier permiso de &quot;denegar&quot; de este grupo, además de los permisos normales de los invitados. Puedes usar esto para proporcionar menor acceso a un motor de búsqueda que el que le proporcionarías a un invitado normal. Puedes por ejemplo querer crear un nuevo grupo llamado &quot;Arañas&quot; y seleccionar esto aquí. Entonces podrías denegarle a ese grupo el permiso para ver los perfiles, para evitar que las arañas indexen los perfiles de tus usuarios.<br />Nota: La detección de arañas no es perfecta y puede ser simulada por usuarios, así que esta característica no garantiza que se restringirá el contenido sólo a aquellos motores de búsqueda que hayas añadido.';
$helptxt['show_spider_online'] = 'Esta opción te permite seleccionar si las arañas deberán ser listadas en la lista de usuarios en línea en el índice del foro y en la página &quot;Quién está en línea&quot; page. Las opciones son:
	<ul class="normallist">
		<li>
			<strong>No, en absoluto</strong><br />
			Las arañas simplemente aparecerán como invitados para todos los usuarios.
		</li><li>
			<strong>Mostrar la cantidad de arañas</strong><br />
			El índice del foro mostrará el número de arañas que están visitando el foro en ese momento.
		</li><li>
			<strong>Mostrar los nombres de las arañas</strong><br />
			Será mostrado el nombre de cada araña, de manera que los usuarios podrán ver cuántas arañas de cada tipo están visitando el foro en ese momento - esto tiene efecto tanto en el índice del foro como en la página de quién está en línea.
		</li><li>
			<strong>Mostrar los nombres de las arañas - Sólo admins</strong><br />
			Como arriba, excepto que sólo los administradores pueden ver el estado de las arañas - para el resto de usuarios las arañas aparecen como invitados.
		</li>
	</ul>';

$helptxt['birthday_email'] = 'Elegir el índice del email de cumpleaños que se usará.  Una vista previa será mostrada en los campos Asunto del email y Cuerpo del email.<br /><strong>Nota:</strong> Establecer esta opción no activa automáticamente los emails de cumpleaños.  Para activarlos usa la página de <a href="%1$s?action=admin;area=scheduledtasks;%3$s=%2$s" target="_blank" class="new_win">Tareas Programadas</a> y activa la tarea de email de cumpleaños.';
$helptxt['pm_bcc'] = 'Al enviar un mensaje personal puedes elegir añadir un receptor como BCC o &quot;Blind Carbon Copy&quot; (remitente oculto). La identidad de los receptores BCC no es revelada al resto de receptores del mensaje.';

$helptxt['move_topics_maintenance'] = 'Esto permitirá mover todos los posts de un foro a otro.';
$helptxt['maintain_reattribute_posts'] = 'Puedes usar esta función para atribuir posts de invitado de tu foro a un usuario registrado. Esto es útil si, por ejemplo, un usuario borró su cuenta y cambió de idea después, decidiendo volver a registrarse; con esta función se le podrían reasignar sus posts antiguos a la nueva cuenta.';
$helptxt['chmod_flags'] = 'Puedes establecer manualmente los permisos a los que quieres establecer los archivos seleccionados. Para hacer esto introduce el valor de chmod como un valor numérico (octeto). Nota - estas banderas no tienen efecto en los sistemas operativos de Microsoft Windows.';

$helptxt['postmod'] = 'Esta sección permite a los miembros del equipo de moderación (aquellos con los permisos suficientes) aprobar cualquier mensaje o tema antes de que sea mostrado.';

$helptxt['field_show_enclosed'] = 'Enciarra la entrada de usuario dentro de cierto texto o html. Esto te permitirá añadir más proveedores de mensajería instantánea, imágenes, etc. Por ejemplo:<br /><br /> &lt;a href="http://website.com/{INPUT}"&gt;&lt;img src="{DEFAULT_IMAGES_URL}/icon.gif" alt="{INPUT}" /&gt;&lt;/a&gt;<br /><br /> Ten en cuenta que puedes usar las siguientes variables:<br /> <ul class="normallist"> <li>{INPUT} - Entrada especificada por el usuario.</li> <li>{SCRIPTURL} - Sitio web del foro.</li> <li>{IMAGES_URL} - Url al directorio de imágenes en el tema de usuario actual.</li> <li>{DEFAULT_IMAGES_URL} - Url al directorio de imágenes del tema por defecto.</li> </ul> ';

$helptxt['custom_mask'] = 'La máscara de entrada es importante para la segurodad de tu foro. Validar la entrada de un usuario puede ayudar asegurar que no es usada de una forma que tú no esperas. Proporcionamos varias expresiones regulares simples como muestra.<br /><br /> <div class="smalltext" style="margin: 0 2em"> &quot;[A-Za-z]+&quot; - Coincidencia con todas las letras mayúsculas y minúsculas del alfabeto.<br /> &quot;[0-9]+&quot; - Coincidencia con todos los caracteres numéricos.<br /> &quot;[A-Za-z0-9]{7}&quot; -Coincidencia con todas las letras mayúsculas y minúsculas del alfabeto y con todos los caracteres numéricos siete veces.<br /> &quot;[^0-9]?&quot; - Prohibir la coincidencia con cualquier número.<br /> &quot;^([A-Fa-f0-9]{3}|[A-Fa-f0-9]{6})$&quot; - Permitir únicamente códigos hexadecimales de 3 o 6 caracteres.<br /> </div><br /><br /> Adicionalmente, los metacaracteres especiales ?+*^$ y {xx} pueden ser definidos. <div class="smalltext" style="margin: 0 2em"> ? - Ninguna o una coincidencia con la expresión previa.<br /> + - Una o más la expresión previa.<br /> * - Ninguna o más de la expresión previa.<br /> {xx} - Un número exacto de la expresión previa.<br /> {xx,} - Un número exacto o más de la expresión previa.<br /> {,xx} - Un número exacto o menos de la expresión previa.<br /> {xx,yy} - Una coincidencia exacta entre los dos números de la expresión previa.<br /> ^ - Comienzo de una cadena.<br /> $ - Final de una cadena.<br /> \\ - Escapa el siguiente carácter.<br /> </div><br /><br /> Más información y técnicas avanzadas pueden ser encontradas en internet.';
$helptxt['image_proxy_enabled'] = 'Whether to enable the image proxy';
$helptxt['image_proxy_secret'] = 'Keep this a secret, protects your forum from hotlinking images. Change it in order to render current hotlinked images useless';
$helptxt['image_proxy_maxsize'] = 'Maximum image size that the image proxy will cache: bigger images will be not be cached. Cached images are stored in your SMF cache folder, so make sure you have enough free space.';

?>