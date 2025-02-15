<?php
http_response_code(404); // Set HTTP status to 404
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        @font-face {
            font-family: 'PixelFont';
            src: url('../../asset/Pixelfy\ Variable.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            display: flex;
            width: 100vw;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
            background: #FCF0C8;
            color: #630A10;
            font-size: 72px;
            font-family: 'PixelFont';
            letter-spacing: -7px;
        }

        div {
            animation: glitch 1s linear infinite;
            text-align: center;
        }

        @keyframes glitch {

            2%,
            64% {
                transform: translate(2px, 0) skew(0deg);
            }

            4%,
            60% {
                transform: translate(-2px, 0) skew(0deg);
            }

            62% {
                transform: translate(0, 0) skew(5deg);
            }
        }

        div:before,
        div:after {
            content: attr(title);
            position: absolute;
            left: 0;
            color: #911F27;
        }

        div:before {
            animation: glitchTop 1s linear infinite;
            clip-path: polygon(0 0, 100% 0, 100% 33%, 0 33%);
        }

        @keyframes glitchTop {

            2%,
            64% {
                transform: translate(2px, -2px);
            }

            4%,
            60% {
                transform: translate(-2px, 2px);
            }

            62% {
                transform: translate(13px, -1px) skew(-13deg);
            }
        }

        div:after {
            animation: glitchBottom 1.5s linear infinite;
            clip-path: polygon(0 67%, 100% 67%, 100% 100%, 0 100%);
        }

        @keyframes glitchBottom {

            2%,
            64% {
                transform: translate(-2px, 0);
            }

            4%,
            60% {
                transform: translate(-2px, 0);
            }

            62% {
                transform: translate(-22px, 5px) skew(21deg);
            }
        }

        button {
            background: transparent;
            outline: none;
            position: relative;
            border: 2px solid #911F27;
            padding: 15px 50px;
            overflow: hidden;
            color: #911F27;
        }

        button:hover {
            cursor: pointer;
            background: #F7D098;
        }

        button:before {
            content: attr(data-hover);
            position: absolute;
            top: 1.1em;
            left: 0;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 800;
            font-size: .8em;
            opacity: 0;
            transform: translate(-100%, 0);
            transition: all .3s ease-in-out;
            color: #630A10;
        }

        button:hover:before {
            opacity: 1;
            transform: translate(0, 0);
        }

        button div {
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 800;
            font-size: .8em;
            transition: all .3s ease-in-out;
        }

        button:hover div {
            opacity: 0;
            transform: translate(100%, 0);
        }

        a {
            text-decoration: none;
            color: #630A10;
        }
    </style>
</head>

<body>
    <div>404 - Page Not Found <br>
        The page you are looking for does not exist. <br>
        <a href="/malikas-drink/admin">
            <button data-hover="Click Now">
                <div>
                    Go Home
                </div>
            </button>
        </a>
    </div>
</body>

</html>