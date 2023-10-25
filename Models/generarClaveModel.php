<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    class GenerarClave{

        public function enviarNuevaClave($identificacion, $email){

            $f=null;

            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar = "SELECT * FROM users WHERE identificacion=:identificacion AND email=:email";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                // Generamos la nueva clave apartir de un codigo aletorio

                $caracteres = "0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ";
                $longitud = 8;
                $newPass = substr(str_shuffle($caracteres),0,$longitud);

                $claveMd = md5($newPass);

                $actualizarClave = "UPDATE users SET clave=:claveMd WHERE identificacion=:identificacion";
                $result = $conexion->prepare($actualizarClave);

                $result->bindParam(":identificacion", $identificacion);
                $result->bindParam(":claveMd", $claveMd);

                $result->execute();


                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0; //Enable verbose debug output
                    $mail->isSMTP(); //Send using SMTP
                    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
                    $mail->SMTPAuth = true; //Enable SMTP authentication
                    $mail->Username = 'sar.soporte28@gmail.com'; //SMTP username
                    $mail->Password = 'qamowfdymsokzjtr'; //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    // Emisor
                    $mail->setFrom('sar.soporte28@gmail.com', 'Soporte SAR');
                    // Receptor

                    $emailFor = $f['email'];
                    $mail->addAddress($emailFor); //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8'; //Set email format to HTML
                    $mail->Subject = 'REASIGNACION DE CONTRASEÑA';
                    $mail->Body = '
                    <div class="es-wrapper-color" style="background-color:#FAFAFA">
                    <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#fafafa"></v:fill> </v:background><![endif]-->
                    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA">
                        <tr>
                            <td valign="top" style="padding:0;Margin:0">
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
                                    <tr>
                                        <td class="es-info-area" align="center" style="padding:0;Margin:0">
                                            <table class="es-content-body" align="center" cellpadding="0" cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                                bgcolor="#FFFFFF">
                                                <tr>
                                                    <td align="left" style="padding:20px;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center" class="es-infoblock"
                                                                                style="padding:0;Margin:0">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:18px;letter-spacing:0;color:#CCCCCC;font-size:12px">
                                                                                    <a target="_blank" href=""
                                                                                        style="mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-header" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0">
                                            <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0"
                                                cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                <tr>
                                                    <td align="left" style="padding:20px;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td class="es-m-p0r" valign="top" align="center"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;font-size:0"><img
                                                                                    class="adapt-img"
                                                                                    src="https://xmdzrb.stripocdn.email/content/guids/CABINET_da362a7ebedd4c021abea45aea09f614917ad886317b92b15d1bf2b04458f6b1/images/sar.png"
                                                                                    alt="" width="150"
                                                                                    style="display:block;font-size:14px;border:0;outline:none;text-decoration:none">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0">
                                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                                cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                                <tr>
                                                    <td align="left" bgcolor="transparent"
                                                        style="padding:0;Margin:0;padding-top:15px;padding-right:20px;padding-left:20px;background-color:transparent">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-top:10px;padding-bottom:15px;font-size:0">
                                                                                <img class="adapt-img"
                                                                                    src="https://github.com/Hector-Caro/logo/blob/main/Anotaci%C3%B3n%202023-09-19%20155711.png?raw=true"
                                                                                    alt=""
                                                                                    style="display:block;font-size:14px;border:0;outline:none;text-decoration:none;border-radius:30px"
                                                                                    width="402"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" class="es-m-txt-c"
                                                                                style="padding:0;Margin:0;padding-bottom:10px">
                                                                                <h1
                                                                                    style="Margin:0;font-family:arial, helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:46px;font-style:normal;font-weight:bold;line-height:69px !important;color:#333333">
                                                                                    <strong>RECUPERACIÓN DE
                                                                                        CONTRASEÑA&nbsp;</strong></h1>
                                                                                <h1
                                                                                    style="Margin:0;font-family:arial, helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:46px;font-style:normal;font-weight:bold;line-height:69px !important;color:#333333">
                                                                                    <strong style="color:#fdc623">SAR</strong></h1>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
                                    <tr class="es-visible-simple-html-only">
                                        <td class="es-stripe-html" align="center" style="padding:0;Margin:0">
                                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                                cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                                <tr>
                                                    <td align="left" style="padding:20px;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center" class="es-m-txt-c es-text-8934"
                                                                                style="padding:0;Margin:0;font-size:16px !important">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:32px !important;letter-spacing:0;color:#333333;font-size:16px !important">
                                                                                    Estimado usuario: '.$f['nombres'].', tu nueva clave de acceso
                                                                                    temporal es:</p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-bottom:15px;padding-top:25px">
                                                                                <span class="es-button-border"
                                                                                    style="border-style:solid;border-color:#eb9119;background:#eb9119;border-width:2px;display:inline-block;border-radius:6px;width:auto"><a
                                                                                        href="" class="es-button es-button-1010"
                                                                                        target="_blank"
                                                                                        style="mso-style-priority:100 !important;text-decoration:none !important;mso-line-height-rule:exactly;color:#333333;font-size:20px;padding:10px 30px 10px 30px;display:inline-block;background:#eb9119;border-radius:6px;font-family:arial, helvetica, sans-serif;font-weight:bold;font-style:normal;line-height:24px !important;width:auto;text-align:center;letter-spacing:0;mso-padding-alt:0;mso-border-alt:10px solid #eb9119;border-left-width:30px;border-right-width:30px">'.$newPass.'</a></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" class="es-text-5073"
                                                                                style="padding:0;Margin:0;padding-bottom:20px;font-size:16px !important">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:roboto, helvetica, arial, sans-serif;line-height:32px !important;letter-spacing:0;color:#333333;font-size:16px !important">
                                                                                    Por razones de seguridad, te recomendamos
                                                                                    cambiar esta contraseña temporal por una
                                                                                    contraseña segura tan pronto como inicies
                                                                                    sesión. Puedes hacerlo desde la sección de
                                                                                    configuración de tu cuenta en nuestro sitio web.
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left"
                                                        style="Margin:0;padding-top:15px;padding-right:20px;padding-left:20px;padding-bottom:10px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#333333;font-size:14px">
                                                                                    Gracias por confiar en&nbsp;<strong
                                                                                        style="color:#333333">SAR</strong>.</p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-footer" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
                                    <tr>
                                        <td align="center" bgcolor="transparent"
                                            style="padding:0;Margin:0;background-color:transparent">
                                            <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:640px">
                                                <tr>
                                                    <td align="left"
                                                        style="Margin:0;padding-right:20px;padding-left:20px;padding-bottom:20px;padding-top:20px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;width:600px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0">
                                                                                <table cellpadding="0" cellspacing="0"
                                                                                    class="es-table-not-adapt es-social"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center" valign="top"
                                                                                            style="padding:0;Margin:0"><img
                                                                                                title="Gmail"
                                                                                                src="https://xmdzrb.stripocdn.email/content/assets/img/other-icons/logo-black/gmail-logo-black.png"
                                                                                                alt="gm" width="32"
                                                                                                style="display:block;font-size:14px;border:0;outline:none;text-decoration:none">
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-bottom:35px">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:18px;letter-spacing:0;color:#666666;font-size:12px">
                                                                                    © SAR 2023</p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
                                    <tr>
                                        <td class="es-info-area" align="center" style="padding:0;Margin:0">
                                            <table class="es-content-body" align="center" cellpadding="0" cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                                bgcolor="#FFFFFF">
                                                <tr>
                                                    <td align="left" style="padding:20px;Margin:0">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center" class="es-infoblock"
                                                                                style="padding:0;Margin:0">
                                                                                <p
                                                                                    style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:18px;letter-spacing:0;color:#CCCCCC;font-size:12px">
                                                                                    <a target="_blank" href=""
                                                                                        style="mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a>No
                                                                                    longer want to receive these emails?&nbsp;<a
                                                                                        href="" target="_blank"
                                                                                        style="mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px">Unsubscribe</a>.<a
                                                                                        target="_blank" href=""
                                                                                        style="mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px"></a>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                        
                        ';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo '
                        <script>
                            alert(Mensaje Enviado);
                        </script>
                    ';
                    echo "
                        <script>
                            location.href='../Views/client-site/login.html'
                        </script>
                    ";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            else{
                echo '
                    <script>
                        alert("Los datos ingresados no se encuentra en el sistema.");
                    </script>
                ';
                echo "
                <script>
                    location.href='../Views/client-site/Contraseña.html'
                    </script>
                ";
            }
        }
    }


?>