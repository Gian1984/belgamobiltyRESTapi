<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        /* FONTS */
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* RESET STYLES */
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#ffffff" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <a href="http://litmus.com" target="_blank">
                            <img alt="Logo" src="https://www.belgamobility.be/wp-content/uploads/2017/11/BELGA-MOBILITY.png" width="100" height="100" style="display: block;  font-family: 'Lato', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#d4ac6c" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td bgcolor="#d4ac6c" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 32px; font-weight: 400; margin: 0;">Nouvel ordre</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td bgcolor="#4c0414" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <!-- COPY -->
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <p style="margin: 0;">Récapitulatif de la commande:<br><br></p>


                        <p style="margin: 0; color: black">Bonjour {{ $success->name1 }} {{$success->name2}} ! <br>
                            <span style="color: #6b7280">Nous avons reçu avec succès votre réservation de l'adresse e-mail {{$success->email}}.</span><br><br>
                        </p>
                        <p style="margin: 0; color: black">Départ:<br>
                           <span style="color: #6b7280">{{ $success->pickupaddress }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Destination:<br>
                            <span style="color: #6b7280">{{ $success->dropoffaddress }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Durée:<br>
                            <span style="color: #6b7280">{{ $success->duration }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Distance:<br>
                            <span style="color: #6b7280">{{ $success->distance }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Heure et date de départ:<br>
                            <span style="color: #6b7280">{{ $success->date }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Panneau d'accueil:<br>
                            <span style="color: #6b7280">{{ $success->pickupsign }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Votre code de référence:<br>
                            <span style="color: #6b7280">{{ $success->referencecode }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Numéro de vol:<br>
                            <span style="color: #6b7280">{{ $success->flight }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Commentaire pour le chauffeur :<br>
                            <span style="color: #6b7280">{{ $success->notes }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Prenom passager supplémentaire:<br>
                            <span style="color: #6b7280">{{ $success->lastname }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black"> Prenom passager supplémentaire:<br>
                            <span style="color: #6b7280">{{ $success->firstname }}</span><br><br>
                        </p>
                        <p style="margin: 0; color: black">Téléphone passager supplémentaire:<br>
                            <span style="color: #6b7280">{{ $success->phone }}</span><br><br>
                        </p>

                        <p style="margin: 0; color: black"> Total:<br>
                            <span style="color: #6b7280">€ {{ $success->amount / 100}}</span><br><br>
                        </p>

                        <p style="margin: 0; color: black">Merci !<br><br></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- FOOTER -->
    <tr>
        <td bgcolor="#4c0414" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >

                <!-- ADDRESS -->
                <tr>
                    <td bgcolor="#4c0414" align="left" style="padding: 0px 30px 30px 30px; color: #d4ac6c; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                        <p style="margin: 0;">© 2021 Belga Mobility. All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
