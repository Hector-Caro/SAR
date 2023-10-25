<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

class GenerarRecibo
{

    public function enviarRecibo($identificacion)
    {

        $f = null;

        $objConexion = new Conexion;
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT 
        U.nombres,
        U.apellidos,
        R.fecha,
        U.telefono,
        U.email,
        U.identificacion,
        S.direccion_sede,
        S.identificacion_admin,
        S.telefono_sede,
        MAX(R.id) as id
    FROM users as U  
    INNER JOIN recibo as R ON U.identificacion = R.encargado 
    INNER JOIN sedes as S ON U.identificacion = S.identificacion_admin 
    WHERE U.identificacion = S.identificacion_admin AND U.identificacion = :id";
    
    

    $result = $conexion->prepare($consultar);
        $result->bindParam(":id", $identificacion);

        $result->execute();

        $f = $result->fetchAll(PDO::FETCH_ASSOC);

        print_r($f);
        $arr = $f[0];


        if ($arr) {
           

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

                $emailFor = $arr['email'];
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
                $mail->Subject = 'Generación de recibo';
                $mail->Body = '
                   
                    <div class="es-wrapper-color" style="background-color:#FFFFFF"><!--<[if gte mso 9]>
                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                    <v:fill type="tile" color="#ffffff" ></v:fill>
                    </v:background>
                    <![endif]-->
                            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-color:#FFFFFF">
                                <tr>
                                    <td valign="top" style="padding:0;Margin:0">
                                        <table cellpadding="0" cellspacing="0" class="es-header" align="center"
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:transparent;background-repeat:repeat;background-position:center top">
                                            <tr>
                                                <td align="center" style="padding:0;Margin:0">
                                                    <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0"
                                                        cellspacing="0"
                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                                        <tr>
                                                            <td class="esdev-adapt-off" align="left" bgcolor="#EB9119"
                                                                style="padding:0;Margin:0;background-color:#EB9119">
                                                                <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                                    <tr>
                                                                        <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                            <table cellpadding="0" cellspacing="0" class="es-left"
                                                                                align="left"
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                                <tr>
                                                                                    <td class="es-m-p0r" valign="top" align="center"
                                                                                        style="padding:0;Margin:0;width:489px">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                                                            role="presentation"
                                                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                            <tr>
                                                                                                <td align="right"
                                                                                                    style="padding:0;Margin:0;padding-top:40px">
                                                                                                    <h1
                                                                                                        style="Margin:0;font-family: monospace;mso-line-height-rule:exactly;letter-spacing:0;font-size:30px;font-style:normal;font-weight:bold;line-height:36px;color:#000000;margin-left:80px">
                                                                                                        La Salchipapería D.C</h1>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td style="padding:0;Margin:0;width:20px"></td>
                                                                        <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                            <table cellpadding="0" cellspacing="0" align="right"
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                <tr>
                                                                                    <td align="left" style="padding:0;Margin:0;width:91px">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                                                            role="presentation"
                                                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                            <tr>
                                                                                                <td style="padding:0;Margin:0">
                                                                                                    <table cellpadding="0" cellspacing="0"
                                                                                                        width="100%" class="es-menu"
                                                                                                        role="presentation"
                                                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                                        <tr class="images">
                                                                                                            <td align="center" valign="top"
                                                                                                                width="100.00%"
                                                                                                                id="esd-menu-id-0"
                                                                                                                style="Margin:0;border:0;padding-top:10px;padding-right:5px;padding-bottom:10px;padding-left:5px">
                                                                                                                <a target="_blank"
                                                                                                                    href="https://linktr.ee/lasalchipaperiadc"
                                                                                                                    style="mso-line-height-rule:exactly;text-decoration:none;font-family:arial, helvetica, sans-serif;display:block;color:#926B4A;font-size:14px"><img
                                                                                                                        src="https://fbcmxhp.stripocdn.email/content/guids/CABINET_6c55c1ecff0c37b4ca9fce312714cb361aec5337f3d60947426b3d69b4a6e922/images/salchi.jpg"
                                                                                                                        alt="Пункт1"
                                                                                                                        title="Пункт1"
                                                                                                                        height="91"
                                                                                                                        style="display:inline !important;font-size:14px;border:0;outline:none;text-decoration:none;vertical-align:middle"></a>
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
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-top:15px;padding-right:20px;padding-left:20px">
                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr>
                                                                        <td align="center" valign="top"
                                                                            style="padding:0;Margin:0;width:560px">
                                                                            <table cellpadding="0" cellspacing="0" width="100%"
                                                                                role="presentation"
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                <tr>
                                                                                    <td align="center" bgcolor="transparent"
                                                                                        style="padding:0;Margin:0">
                                                                                        <h4
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:24px;font-style:normal;font-weight:normal;line-height:29px;color:#333333">
                                                                                            <b>Recibo de pago</b></h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        style="padding:0;Margin:0;padding-top:10px;padding-bottom:5px">
                                                                                        <h6
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#000000">
                                                                                            Su pedido fue realizado con éxito ;)</h6>
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
                                                            <td class="esdev-adapt-off es-m-p10" align="left"
                                                                background="https://fbcmxhp.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png"
                                                                style="padding:20px;Margin:0;background-image:url(https://fbcmxhp.stripocdn.email/content/guids/CABINET_455a2507bd277c27cf7436f66c6b427c/images/66551620375036465.png);background-repeat:no-repeat;background-position:center;background-color:#FDC623"
                                                                bgcolor="#FDC623">
                                                                <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                                    <tr>
                                                                        <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                            <table cellpadding="0" cellspacing="0" class="es-right"
                                                                                align="right"
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                                                <tr>
                                                                                    <td align="left" style="padding:0;Margin:0;width:560px">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                                                            bgcolor="#f6e6cb"
                                                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#f6e6cb"
                                                                                            role="presentation">
                                                                                            <tr>
                                                                                                <td align="center"
                                                                                                    style="padding:0;Margin:0;padding-right:15px;padding-left:15px;font-size:0px">
                                                                                                    <img
                                                                                                            src="https://fbcmxhp.stripocdn.email/content/guids/CABINET_6c55c1ecff0c37b4ca9fce312714cb361aec5337f3d60947426b3d69b4a6e922/images/orden.jpg"
                                                                                                            alt=""
                                                                                                            style="display:block;font-size:14px;border:0;outline:none;text-decoration:none;border-radius:0"
                                                                                                            height="55"></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" bgcolor="#ffffff"
                                                                                                    style="Margin:0;padding-bottom:10px;padding-top:5px;padding-right:10px;padding-left:10px">
                                                                                                    <h6
                                                                                                        style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#333333">
                                                                                                        <strong>Día de la
                                                                                                            orden;<br>' . $arr['fecha'] . '</strong>
                                                                                                    </h6>
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
                                                        <tr>
                                                            <td align="left"
                                                                style="padding:0;Margin:0;padding-top:15px;padding-right:20px;padding-left:20px">
                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr>
                                                                        <td align="center" valign="top"
                                                                            style="padding:0;Margin:0;width:560px">
                                                                            <table cellpadding="0" cellspacing="0" width="100%"
                                                                                role="presentation"
                                                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                <tr>
                                                                                    <td align="left" style="padding:0;Margin:0">
                                                                                        <h6
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:24px;color:#333333;margin-left:40px">
                                                                                            <strong>Encargado&nbsp;</strong>' . $arr['nombres'] . ' ' . $arr['apellidos'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Factura
                                                                                                #<b>' . $arr['id'] . '</b></strong></h6>
                                                                                        <h6
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:24px;color:#333333;margin-left:40px">
                                                                                            <strong><b>Emisión
                                                                                                    Factura:</b></strong> ' . $arr['fecha'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sede:&nbsp;</strong>' . $arr['direccion_sede'] . '&nbsp;&nbsp;
                                                                                        </h6>
                                                                                        <h6
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#333333;margin-left:40px">
                                                                                            <strong>Teléfono:&nbsp;</strong>' . $arr['telefono_sede'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        </h6>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="es-m-txt-c"
                                                                                        style="padding:0;Margin:0;padding-top:15px">
                                                                                        <h6
                                                                                            style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#000000">
                                                                                            <strong>Su orden fue:</strong></h6>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        style="padding:0;Margin:0;padding-bottom:5px;padding-top:5px;font-size:0">
                                                                                        <table border="0" width="100%" height="100%"
                                                                                            cellpadding="0" cellspacing="0"
                                                                                            role="presentation"
                                                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="padding:0;Margin:0;border-bottom:2px solid #EB9119;background:none;height:1px;width:100%;margin:0px">
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
                                                        <tr>
                                                        <td class="esdev-adapt-off" align="left" bgcolor="#FDC623"
                                                        style="padding:0;Margin:0;padding-right:20px;padding-left:20px;background-color:#FDC623">
                                                        <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                            <tr>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:270px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center" class="es-m-txt-l"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px !important;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                <strong class="p_name">Salchipapa
                                                                                                    PAPICOSTEÑA</strong></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:176px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px;padding-left:115px">
                                                                                            <p style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px"
                                                                                                class="p_description">x1</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-right"
                                                                        align="right"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:74px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center" class="es-m-p0t es-m-p0b"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p class="p_price"
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                $33.000</p>
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
                                                <tr>
                                                    <td class="esdev-adapt-off" align="left" bgcolor="#FDC623"
                                                        style="padding:0;Margin:0;background-color:#FDC623">
                                                        <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                            <tr>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:285px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="es-m-p0t es-m-p0b es-m-txt-l"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                <strong class="p_name">Perro
                                                                                                    Méxicano</strong></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:189px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right" class="es-m-p0t es-m-p0b"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px"
                                                                                                class="p_description">x3</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-right"
                                                                        align="right"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:86px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right" class="es-m-p0t es-m-p0b"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p class="p_price"
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                $60.000</p>
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
                                                <tr>
                                                    <td class="esdev-adapt-off" align="left" bgcolor="#FDC623"
                                                        style="padding:0;Margin:0;background-color:#FDC623">
                                                        <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                            <tr>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:285px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="es-m-p0t es-m-p0b es-m-txt-l"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                <strong class="p_name">Gaseosa
                                                                                                    CocaCola</strong></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:189px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right" class="es-m-p0t es-m-p0b"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px"
                                                                                                class="p_description">x3</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-right"
                                                                        align="right"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:86px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right" class="es-m-p0t es-m-p0b"
                                                                                            style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                                                                                            <p class="p_price"
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                $13.500</p>
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
                                                <tr>
                                                    <td align="left"
                                                        style="padding:0;Margin:0;padding-right:20px;padding-left:20px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:560px">
                                                                    
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esdev-adapt-off" align="left" bgcolor="#FDC623"
                                                        style="padding:18px;Margin:0;padding-right:20px;padding-left:10px;background-color:#FDC623">
                                                        <table cellpadding="0" cellspacing="0" class="esdev-mso-table"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px">
                                                            <tr>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-left"
                                                                        align="left"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:472px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right"
                                                                                            style="padding:0;Margin:0">
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                Subtotal<br>IVA</p>
                                                                                            <h6
                                                                                                style="Margin:0;font-family:arial, helvetica neue, helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#000000">
                                                                                                <br><b>Total</b></h6>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="padding:0;Margin:0;width:20px"></td>
                                                                <td class="esdev-mso-td" valign="top" style="padding:0;Margin:0">
                                                                    <table cellpadding="0" cellspacing="0" class="es-right"
                                                                        align="right"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                                                        <tr>
                                                                            <td align="left" style="padding:0;Margin:0;width:78px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="right"
                                                                                            style="padding:0;Margin:0">
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                                $106.500<br>$15.000<br></p>
                                                                                            <p
                                                                                                style="Margin:0;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;letter-spacing:0;color:#000000;font-size:14px">
                                                                                            </p>
                                                                                            <h6
                                                                                                style="margin: 0;  font-family:arial, helvetica neue, helvetica, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:19px;color:#000000">
                                                                                                <br><strong>$121.500</strong><br></h6>
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
                                                <tr>
                                                    <td align="left" bgcolor="#ffffff"
                                                        style="padding:0;Margin:0;padding-right:20px;padding-left:20px;padding-top:5px;background-color:#ffffff">
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
                                                                                style="padding:0;Margin:0;padding-bottom:5px;padding-top:5px;font-size:0">
                                                                                <table border="0" width="100%" height="100%"
                                                                                    cellpadding="0" cellspacing="0"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td
                                                                                            style="padding: 10px;Margin:0;border-bottom:5px solid #A16017;background:none;height:1px;width:100%;margin:0px">
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
                                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
                                    <tr>
                                        <td align="center" style="padding:0;Margin:0">
                                            <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0"
                                                cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                                <tr>
                                                    <td align="left" bgcolor="#fdc623"
                                                        style="padding:0;Margin:0;padding-right:15px;padding-left:15px;background-color:#fdc623">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:570px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-bottom:5px;padding-top:5px;font-size:0">
                                                                                <table border="0" width="100%" height="100%"
                                                                                    cellpadding="0" cellspacing="0"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td
                                                                                            style="padding:0;Margin:0;border-bottom:3px solid #EB9119;background:none;height:1px;width:100%;margin:0px">
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="padding:0;Margin:0">
                                                                                <h6
                                                                                    style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:29px !important;color:#000000">
                                                                                    ¿Alguna inquietud, queja o pregunta?
                                                                                    Escríbenos...</h6>
                                                                                <h6
                                                                                    style="Margin:0;font-family:comic sans ms, marker felt-thin, arial, sans-serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:16px;font-style:normal;font-weight:normal;line-height:29px !important;color:#000000;  text-decoration: none;">
                                                                                    lasalchipaperiadc@gmail.com</h6>
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
                                        <td align="center" bgcolor="transparent"
                                            style="padding:0;Margin:0;background-color:transparent">
                                            <table bgcolor="#fdc623" class="es-content-body" align="center" cellpadding="0"
                                                cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#fdc623;width:600px">
                                                <tr>
                                                    <td align="left"
                                                        style="padding:0;Margin:0;padding-right:10px;padding-left:10px;padding-bottom:15px">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="center" valign="top"
                                                                    style="padding:0;Margin:0;width:580px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td style="padding:0;Margin:0;padding-right:5px">
                                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                                    class="es-menu" role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr class="links-images-top">
                                                                                        <td align="center" valign="top"
                                                                                            width="50.00%"
                                                                                            style="padding:0;Margin:0;border:0;padding-top:15px;padding-bottom:15px;border-left:1px solid #000000"
                                                                                            id="esd-menu-id-1"><a target="_blank"
                                                                                                style="mso-line-height-rule:exactly;text-decoration:none;font-family:arial, helvetica neue, helvetica, sans-serif;display:block;color:#000000;font-size:14px;font-weight:bold"><img
                                                                                                    src="https://fbcmxhp.stripocdn.email/content/guids/CABINET_6c55c1ecff0c37b4ca9fce312714cb361aec5337f3d60947426b3d69b4a6e922/images/alta.png"
                                                                                                    title="ALTA CALIDAD"
                                                                                                    alt="ALTA CALIDAD" height="38"
                                                                                                    style="display:inline !important;font-size:14px;border:0;outline:none;text-decoration:none;vertical-align:middle;padding-bottom:5px"><br>ALTA
                                                                                                CALIDAD</a></td>
                                                                                        <td align="center" valign="top"
                                                                                            width="50.00%"
                                                                                            style="padding:0;Margin:0;border:0;padding-top:15px;padding-bottom:15px;border-left:6px solid #EB9119"
                                                                                            id="esd-menu-id-2"><a target="_blank"
                                                                                                style="mso-line-height-rule:exactly;text-decoration:none;font-family:arial, helvetica neue, helvetica, sans-serif;display:block;color:#000000;font-size:14px;font-weight:bold"><img
                                                                                                    src="https://fbcmxhp.stripocdn.email/content/guids/CABINET_6c55c1ecff0c37b4ca9fce312714cb361aec5337f3d60947426b3d69b4a6e922/images/mejor.png"
                                                                                                    title="MEJOR ELECCIÓN"
                                                                                                    alt="MEJOR ELECCIÓN" height="46"
                                                                                                    style="display:inline !important;font-size:14px;border:0;outline:none;text-decoration:none;vertical-align:middle;padding-bottom:5px"><br>MEJOR
                                                                                                ELECCIÓN</a></td>
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
                                <table cellpadding="0" cellspacing="0" class="es-footer" align="center"
                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important;background-color:#E3CDC1;background-repeat:repeat;background-position:center top">
                                    <tr>
                                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
                                            <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0"
                                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                                <tr>
                                                    <td align="left" bgcolor="#FDC623"
                                                        style="padding:0;Margin:0;padding-right:20px;padding-left:20px;padding-top:5px;background-color:#FDC623">
                                                        <table cellpadding="0" cellspacing="0" width="100%"
                                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                            <tr>
                                                                <td align="left" style="padding:0;Margin:0;width:560px">
                                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                                        role="presentation"
                                                                        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0">
                                                                                <table cellpadding="0" cellspacing="0"
                                                                                    class="es-table-not-adapt es-social"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                                    <tr>
                                                                                        <td align="center" valign="top"
                                                                                            style="padding:0;Margin:0;padding-right:20px">
                                                                                            <a target="_blank"
                                                                                                href="https://www.facebook.com/p/La-Salchipaperia-DC-100063539682621/"
                                                                                                style="mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img
                                                                                                    title="Facebook"
                                                                                                    src="https://fbcmxhp.stripocdn.email/content/assets/img/social-icons/rounded-black/facebook-rounded-black.png"
                                                                                                    alt="Fb" width="32"
                                                                                                    style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></a>
                                                                                        </td>
                                                                                        <td align="center" valign="top"
                                                                                            style="padding:0;Margin:0"><a
                                                                                                target="_blank"
                                                                                                href="https://www.instagram.com/lasalchipaperiadc/?hl=es"
                                                                                                style="mso-line-height-rule:exactly;text-decoration:underline;color:#926B4A;font-size:14px"><img
                                                                                                    title="Instagram"
                                                                                                    src="https://fbcmxhp.stripocdn.email/content/assets/img/social-icons/rounded-black/instagram-rounded-black.png"
                                                                                                    alt="Inst" width="32"
                                                                                                    style="display:block;font-size:14px;border:0;outline:none;text-decoration:none"></a>
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
                echo '<script>
                        alert("Recibo enviado correctamente ;)");
                        window.location.href = "../Views/client-site/recibo.html";
                        </script>';
                    
            } catch (Exception $e) {
                echo "No fue posible enviar el recibo ;( {$mail->ErrorInfo}";
            }
        }

    }
}



?>