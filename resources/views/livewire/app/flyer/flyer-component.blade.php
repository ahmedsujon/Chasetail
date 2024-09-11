<div>
    <style>
        html,
        body {
            padding: 0;
            background: #ffffff;
            font-family: 'Nunito', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            color: rgb(0, 0, 0);
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            margin: 0 auto !important;
        }

        a {
            text-decoration: none;
            color: red;
        }

        .logo h1 {
            font-size: 50px;
            font-weight: 700;
            text-transform: uppercase;
            color: #0082f0;
            margin-bottom: 15px;
        }

        .email-section {
            text-align: center;
            padding: 0 30px;
        }

        .heading-section h2 {
            font-size: 28px;
            text-transform: uppercase;
            color: #000000;
        }

        .img {
            width: 100%;
            height: auto;
        }

        .btn {
            padding: 10px 15px;
            background: #0082f0;
            color: #ffffff;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            margin-top: 50px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #0072d1;
            color: #ffffff;
        }

        @media screen and (max-width: 500px) {
            .text-services {
                padding-left: 0;
                padding-right: 20px;
                text-align: left;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printableArea,
            #printableArea * {
                visibility: visible;
            }

            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .btn {
                display: none;
            }
        }
    </style>

    <script>
        function printEmail() {
            window.print();
        }
    </script>

    <center id="printableArea" style="width: 100%; background-color: #ffffff; margin: 20px auto;">
        <div style="max-width: 700px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" width="100%">
                <tr>
                    <td class="bg_white logo" style="padding: 0; text-align: center">
                        <h1><a href="#">LOST PET</a></h1>
                    </td>
                </tr>
                <tr>
                    <td class="bg_white" style="text-align: center;">
                        <div class="heading-section">
                            <h2>{{ $lost_dog->name }}</h2>
                            <p>Gender: {{ $lost_dog->gender }}, Color: {{ $lost_dog->color }},
                                Breed: {{ $lost_dog->breed }}
                            </p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <img src="http://chasetail.test/{{ $lost_dog->images }}" width="600" alt="Fido"
                            style="max-width: 600px;">
                        <div>
                            <p style="font-weight: 400; font-size: 17px; margin-top: 10px;">Description:
                                {{ $lost_dog->description }}</p>
                        </div>
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: left;">
                                    <img src="{{ asset('assets/images/logo.png') }}" width="250" alt="Logo"
                                        style="max-width: 250px;">
                                </td>
                                <td style="text-align: center; padding-top: 20px;">
                                    {{-- <div class="qr-code-style">
                                        <img src="data:image/png;base64,{{ base64_encode(
                                            QrCode::format('png')->size(80)->generate(
                                                    'Name: ' .
                                                        $lost_dog->name .
                                                        "\n" .
                                                        'Gender: ' .
                                                        $lost_dog->gender .
                                                        "\n" .
                                                        'Color: ' .
                                                        $lost_dog->color .
                                                        "\n" .
                                                        'Breed: ' .
                                                        $lost_dog->breed .
                                                        "\n" .
                                                        'https://chasetail.com/lostdogs/flyer/' .
                                                        $lost_dog->id,
                                                ),
                                        ) }}"
                                            alt="QRCode">
                                    </div> --}}
                                    <p style="font-size: 15px; font-weight: 600; color: #0082f0;">
                                        SCAN CODE W/ SMARTPHONE<br>
                                        <a style="color: #0082f0 !important;" href="https://chasetail.com/"
                                            target="_blank">https://chasetail.com/</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <button class="btn" onclick="printEmail()">Print Flyer</button>
        </div>
    </center>
</div>
