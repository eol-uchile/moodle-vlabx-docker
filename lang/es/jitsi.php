<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Strings for component 'jitsi', language 'es', version '4.2'.
 *
 * @package     jitsi
 * @category    string
 * @copyright   1999 Martin Dougiamas and contributors
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['access'] = 'Acceder';
$string['accessto'] = 'Acceder a {$a}. Introduzca el nombre a mostrar';
$string['accesstotitle'] = 'Acceder a {$a}';
$string['accesstowithlogin'] = 'Acceder a {$a}.';
$string['account'] = 'Cuenta';
$string['accountconnected'] = 'Cuenta conectada con éxito y puesta <b>en uso</b>.';
$string['accountinsufficientprivileges'] = 'La configuración de la cuenta de transmisión no tiene privilegios suficientes. Póngase en contacto con su administrador.';
$string['accounts'] = 'Cuentas de transmisión/grabación';
$string['activatetooltip'] = 'Clic para poner en uso';
$string['addaccount'] = 'Añadir cuenta';
$string['adminaccountex'] = 'Se requiere al menos una cuenta para transmitir/grabar sesiones con el método de transmisión "Integrado a Moodle".
  </br>Solo una cuenta puede estar "<b>en uso</b>" y se usará para transmitir/grabar todas las sesiones de su maestro.
  </br>Al agregar nuevas cuentas, se recomienda <b>nombrarlas con nombres de cuenta reales</b> porque en el futuro se le podría solicitar que vuelva a iniciar sesión para volver a autorizar la cuenta.
  </br>Solo las cuentas sin grabaciones relacionadas con las actividades de Jitsi del profesor y sin grabaciones pendientes de eliminar de los servidores de transmisión se pueden eliminar aquí usando el icono de la papelera.
  </br>Pueden aparecer nuevas cuentas sin credenciales aquí cuando las copias de seguridad de actividades de Jitsi de otro servidor se restauran en este con cuentas que no estaban presentes aquí.';
$string['alias'] = 'Alias';
$string['allow'] = 'Comienzo de la videoconferencia';
$string['appaccessinfo'] = 'Si desea unirse a la reunión utilizando un dispositivo móvil, necesitará la aplicación móvil Jitsi Meet.';
$string['appid'] = 'ID de la App';
$string['appidex'] = 'ID de la App para la configuración del token';
$string['appinstalledtext'] = 'Si ya tiene la aplicación:';
$string['appnotinstalledtext'] = 'Si aún no tiene la aplicación:';
$string['attendeesreport'] = 'Informe de asistentes';
$string['authq'] = '¿Iniciar sesión con esta cuenta para obtener credenciales y poner "en uso"?';
$string['blurbutton'] = 'Opciones de fondo';
$string['blurbuttonex'] = 'Mostrar la opción de fondos';
$string['buttondownloadapp'] = 'Descargar aplicación';
$string['buttonopeninbrowser'] = 'Abrir en navegador web';
$string['buttonopenwithapp'] = 'Unete a esta sesión usando la app';
$string['calendarstart'] = 'La videoconferencia \'{$a}\' comienza';
$string['close'] = 'Fin de la videoconferencia';
$string['completiondetail:minutes'] = 'Asistir {$a} minutos';
$string['completionminutes'] = 'El estudiante debe participar';
$string['completionminutes_help'] = 'Número de minutos que el estudiante debe participar para dar por finalizada la actividad';
$string['completionminutesex'] = 'Minutos de participación';
$string['confirmdeleterecordinactivity'] = 'Confirme que desea eliminar esta grabación. Esta operación no se puede deshacer.';
$string['connectedattendeesnow'] = 'Asistentes conectados ahora';
$string['copied'] = 'Copiado al portapapeles';
$string['deeplinkex'] = 'Permite la transferencia de la sesión a la aplicación jitsi.';
$string['deleteq'] = '¿Eliminar y desconectar esta cuenta?';
$string['deletesourceq'] = '¿Está seguro/ a? La grabación se eliminará permanentemente del servidor de video y no se podrá recuperar';
$string['deletesources'] = 'Grabaciones disponibles para eliminar';
$string['deletetooltip'] = 'Eliminar';
$string['deprecated'] = 'Obsoleto';
$string['deprecatedex'] = 'Parámetros obsoletos que probablemente no funcionarán porque Jitsi Meet cambió su implementación';
$string['desktopaccessinfo'] = 'Si desea unirse a la reunión, haga clic en el botón de abajo para abrir Jitsi en su navegador.';
$string['domain'] = 'Servidor';
$string['domainex'] = 'Servidor Jitsi a utilizar. Puedes buscar en Google servidores Jitsi públicos alternativos que puedan estar más cerca de tus usuarios y con menos latencia.
Si tienes tu Jitsi Server privado, infórmanos aquí sin "https://".';
$string['editrecordname'] = 'Editar nombre grabación';
$string['entersession'] = 'Entrar a la sesión';
$string['errordeleting'] = 'Error eliminando';
$string['experimental'] = 'Experimental';
$string['experimentalex'] = 'Son opciones con las que estamos experimentando y que pueden desaparecer en futuras versiones.';
$string['finish'] = 'La sesión ha finalizado';
$string['finishandreturn'] = 'Finalizar y volver';
$string['finishandreturnex'] = 'Volver al curso cuando termine la sesión';
$string['finishinvitation'] = 'El enlace de invitación caducará el';
$string['guestform'] = 'Entrar al formulario de invitado';
$string['hasentered'] = 'ha entrado en tu sesión privada de Jitsi';
$string['help'] = 'Ayuda';
$string['helpex'] = 'Texto instructivo para mostrar en la actividad Jitsi';
$string['here'] = 'aquí';
$string['identification'] = 'ID de usuario';
$string['identificationex'] = 'ID a mostrar en la sesión';
$string['instruction'] = 'Clic en el botón para acceder';
$string['integrated'] = 'Integrado a Moodle';
$string['inuse'] = '<b>(en uso)</b>';
$string['invitations'] = 'Invitaciones';
$string['invitationsnotactivated'] = 'Las invitaciones no están activadas.';
$string['invitebutton'] = 'Opciones de invitación';
$string['invitebuttonex'] = 'Opciones de invitación';
$string['jitsi'] = 'Jitsi';
$string['jitsi:addinstance'] = 'Añadir nuevo Jitsi';
$string['jitsi:createlink'] = 'Crear link para invitar a la sesión';
$string['jitsi:hide'] = 'Ocultar grabaciones';
$string['jitsi:moderation'] = 'Moderación de Jitsi';
$string['jitsi:record'] = 'Grabar sesión';
$string['jitsi:sharedesktop'] = 'Compartir escritorio';
$string['jitsi:view'] = 'Ver Jitsi';
$string['jitsi:viewusersonsession'] = 'Acceso a los informes de asistentes';
$string['jitsiinterface'] = 'Interfaz Jitsi';
$string['jitsiname'] = 'Nombre de la sesión';
$string['linkexpiredon'] = 'Este enlace expiró el {$a}';
$string['loginq'] = '¿Quieres poner en uso esta cuenta?';
$string['logintooltip'] = 'Se requieren credenciales para esta cuenta';
$string['messageprovider:onprivatesession'] = 'Usuario en sesión privada';
$string['minpretime'] = 'Minutos para acceder';
$string['minpretime_help'] = 'Los usuarios con permisos de moderación podrán acceder a estos minutos antes del inicio';
$string['minutesconnected'] = 'Ha estado conectado durante {$a} minutos';
$string['modulename'] = 'Jitsi';
$string['modulename_help'] = 'Utilice el módulo Jitsi para videoconferencia. Estas videoconferencias utilizarán su nombre de usuario de Moodle mostrando su nombre de usuario y avatar en las videoconferencias.

Jitsi-meet es una solución de videoconferencia de código abierto que le permite crear e implementar fácilmente soluciones de videoconferencia seguras.';
$string['modulenameplural'] = 'Jitsis';
$string['myprivatesession'] = 'Mi sesión privada';
$string['nameandsurname'] = 'Nombre + Apellido';
$string['newvaluefor'] = 'Nuevo valor para';
$string['noinviteaccess'] = 'Actualmente no se permite el acceso de invitados.';
$string['nostart'] = 'La sesión no ha comenzado. Puede acceder {$a} minutos antes del comienzo';
$string['notloggedin'] = 'Se requieren credenciales de cuenta';
$string['noviewpermission'] = 'No tiene permisos para ver esta sesión Jitsi';
$string['oauthidex'] = 'Oauth2 id cuenta Google';
$string['oauthsecretex'] = 'Oauth2 Secret cuenta Google';
$string['participantspane'] = 'Panel de participantes';
$string['participantspaneex'] = 'Mostrar el panel de participantes a todos los usuarios. Cuando se desmarca, solo los usuarios con capacidad de moderación de Jitsi (mod/jitsi:moderation), generalmente profesores, pueden ver el panel.';
$string['participatingsession'] = 'Participantes en la sesión';
$string['password'] = 'Contraseña';
$string['passwordex'] = 'Contraseña para proteger sus sesiones. Recomendado si usa un servidor público';
$string['pluginadministration'] = 'Administración de Jitsi';
$string['pluginname'] = 'Jitsi';
$string['privacy:metadata:jitsi'] = 'Para poder integrarse con una sesión jitsi, los datos del usuario deben intercambiarse con ese servicio.';
$string['privacy:metadata:jitsi:avatar'] = 'El avatar se envía desde moodle para mostrarlo a los demás usuarios de la sesión jitsi.';
$string['privacy:metadata:jitsi:username'] = 'El nombre de usuario se envía desde moodle para mostrarlo a los demás usuarios de la sesión jitsi.';
$string['privatesession'] = 'Sesión privada de {$a}';
$string['privatesessiondisabled'] = 'Las sesiones privadas están desabilitadas';
$string['privatesessions'] = 'Sesiones privadas';
$string['privatesessionsex'] = 'Agregar sesiones privadas a los perfiles de usuario';
$string['raisehand'] = 'Botón de levantar la mano';
$string['raisehandex'] = 'Muestre el botón de levantar la mano a todos los usuarios. Cuando los usuarios levantan la mano pueden acceder al panel de participantes. Si oculta los paneles de participantes, es posible que deba ocultar este botón.';
$string['reactions'] = 'Reacciones';
$string['reactionsex'] = 'Muestra emoticonos sonoros de aplausos, sorpresa, etc... Se requiere "Botón de levantar la mano" habilitado';
$string['record'] = 'Opción de grabación';
$string['recordex'] = 'Habilitar opción de grabación';
$string['records'] = 'Grabaciones';
$string['secret'] = 'Secreto';
$string['secretex'] = 'Secreto para la configuración de token';
$string['securitybutton'] = 'Botón seguridad';
$string['securitybuttonex'] = 'Mostrar botón de seguridad en la sesión';
$string['separator'] = 'Separador';
$string['separatorex'] = 'Definir el campo separador para el nombre de la sesión';
$string['sessionnamefields'] = 'Campos de nombre de la sesión';
$string['sessionnamefieldsex'] = 'Campos que definen el nombre de la sesión';
$string['sharetoinvite'] = 'Comparte este enlace para invitar a alguien a la sesión';
$string['showavatars'] = 'Mostrar avatares en Jitsi';
$string['showavatarsex'] = 'Muestra el avatar del usuario en Jitsi. Si el usuario no tiene una imagen de perfil, se cargará la imagen de perfil predeterminada de Moodle en lugar de las iniciales que mostrará Jitsi cuando no se establezca ninguna imagen.';
$string['simultaneouscameras'] = 'Cámaras simultáneas';
$string['simultaneouscamerasex'] = 'Número de cámaras simultáneas';
$string['streamingandrecording'] = 'Stream y grabación';
$string['streamingbutton'] = 'Streaming de Youtube';
$string['streamingbuttonex'] = 'Mostrar la opción de streaming. (sólo para moderadores)';
$string['streamingconfig'] = 'Configuración streaming';
$string['streamingconfigex'] = 'Transmisión de Youtube. Para el método de integración, debe agregar la siguiente URL a los URI de redireccionamiento autorizados en la consola de API de Google: \'{$ a}\'';
$string['streamingoption'] = 'Método';
$string['streamingoptionex'] = 'Elija si desea una integración automática con el streaming de YouTube o usar la opción de streaming de la interfaz Jitsi';
$string['tablelistjitsis'] = 'Lista todos los videos en sus proveedores de transmisión/grabación que están disponibles para ser eliminados porque ya no están vinculados en las actividades de Jitsi en esta instancia de Moodle. Puede eliminarlos de forma segura para liberar espacio en el servidor de transmisión. La lista podría incluir videos que ahora están en la \'Papelera de reciclaje\' en algún curso. Se recomienda eliminar solo las grabaciones antiguas que sepa que no serán necesarias. </br></br> <b>¡¡¡ ATENCIÓN!!! </b>Si tiene instancias de copia de seguridad de moodle, NO debe eliminar estos videos si están vinculados en otras instancias.';
$string['toenter'] = 'para entrar';
$string['tokenconfigurationex'] = 'Vacío para servidores sin token';
$string['tokennconfig'] = 'Configuración de token';
$string['updated'] = 'Actualizado';
$string['userenter'] = '{$a} está en Jitsi';
$string['username'] = 'Nombre de usuario';
$string['warningprivate'] = 'Si accede, {$a} será advertido con una notificación.';
$string['watermarklink'] = 'Enlace de marca de agua';
$string['watermarklinkex'] = 'Enlace de marca de agua';
$string['youtubebutton'] = 'Opción para compartir desde Youtube';
$string['youtubebuttonex'] = 'Opción para compartir desde Youtube';
