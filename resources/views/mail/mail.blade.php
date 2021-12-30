<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor Mail </title>

    <style>
        * {
            box-sizing: border-box !important;
        }
        .btn {
            background: #D63426;
            border-radius: 100px;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 700;
            font-size: 16px;
            line-height: 12px;
            padding: 14px ;
            display: inline-block;
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body style="color: #000000; padding: 0px; border:0px; margin: 0;" class="body">

    <div class="container" style="max-width: 800px; width: 100%; margin: auto;border:1px solid">
        <table cellspacing="0" cellpadding="0" class="header" style="width: 100%; background: red; border: 0;">
            <tr>
                <td style="text-align: center;
                background: #ffffff;
                padding: 10px;">
                    <img alt="logo" src="{{ url('web/assets/logo.png') }}" style="border: 0; max-width: 18%;">
                </td>
            </tr>
        </table>
        <hr>
        <table cellspacing="0" cellpadding="0" class="inner" style="max-width: 90%; margin: auto; width: 100%; border: 0;">
            <tr>
                <td style="padding: 60px 0;">
                    <h1 style=" 
                    font-style: normal;
                    font-weight: 700;   
                    font-size: 36px;
                    line-height: 1.2;
                    color: #2D2926;
                    margin: 0 0 20px 0;
                    ">
                        <!--Name of Customer enter here -->
                        <b>مرحبا , ( Name )</b>
                    </h1>
                   
                    <p style="margin: 0 0 20px 0; 
                        font-style: normal;
                        font-weight: 400;
                        font-size: 22px;
                        line-height: 140%;
                        color: #2D2926;">
                            لقد تلقينا طلبًا بموعدك ، والذي يمكن تحديده
                           <br>( Time / Date)</p>
                    <p style="margin: 0 0 20px 0; 
                        font-style: normal !important;
                        font-weight: bold !important;">
                            <!-- Message -->
                            <span class="btn" style="background: #6562f0;
                            border-radius: 100px;
                            color: white;
                            border: none;
                            cursor: pointer;
                            font-weight: 700;
                            font-size: 16px;
                            line-height: 10px;
                            padding: 14px ;
                            display: inline-block; ">
                            <a href="" style="text-decoration: none !important; color: white; font-weight: 700;
                            font-size: 16px;">
                                 Video Link</a></span>
                    </p>
                    <p style="margin: 0 0 20px 0; 
                        font-style: normal;
                        font-weight: 400;
                        font-size: 22px;
                        line-height: 140%;
                        color: #2D2926;">
                        اسم الطبيب
                    (Doctor Name)</p>

                </td>
            </tr>
        </table>
        <table class="footer" cellspacing="0" cellpadding="0" style="background: #F9F9F9; width: 100%; border: 0;">
            <tr>
                <td style="padding: 30px 15px;">
                    <p style="margin: 0 0 15px 0;
                    font-style: normal;
                    font-weight: 400;
                    font-size: 16px;
                    line-height: 18px;
                    color: #535455;">دكتورك | طبيب نفسي | استشارات نفسية : هي عبارة عن عيادة نفسية إلكترونية خاصة، تقدم جلسات نفسية عبر الانترنت، فبعد الان لن تحتاج للذهاب الى عيادة دكتور نفسي ، تحدث مع دكتور نفسي اونلاين صوت وصورة اون لاين.

.</p>

                
                <p style="margin: 0;
                font-style: normal;
                font-weight: 400;
                font-size: 16px;
                line-height: 18px;
                color: #535455;">© 2021 جميع الحقوق محفوظة لدكتورك .</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>