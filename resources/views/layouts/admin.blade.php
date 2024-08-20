<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terra Nostra</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px 20px;
        }

        main {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .products-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .products-header h2 {
            display: inline-block;
            margin: 0;
            font-size: 1.5em;
        }

        .products-header a {
            margin-left: 20px;
            font-size: 1.5em;
            text-decoration: none;
            color: #007BFF;
        }

        .products-header a:hover {
            color: #0056b3;
        }

        /* Estilos para o container de cards usando Flexbox */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Alinha os cards ao centro */
        }

        /* Estilos para os cards individuais */
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1 1 250px; /* Flex-grow, flex-shrink, flex-basis */
            max-width: 300px;
        }

        .card img {
            max-width: 100%;
            border-radius: 8px 8px 0 0;
        }

        .card h3 {
            margin: 15px 0 10px;
            font-size: 1.25em;
        }

        .card p {
            font-size: 0.95em;
            color: #666;
            margin: 10px 0;
        }

        .card .price {
            font-size: 1.1em;
            color: #333;
            font-weight: bold;
            margin-top: 15px;
        }

        .card .details-button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .card .details-button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>

    
</head>
<body>

    <header>
        <h1>Terra Nostra</h1>
    </header>
    
    @yield('content')


    <footer>
        <p>&copy; 2024 Meu Site. Todos os direitos reservados.</p>
    </footer>

</body>
</html>