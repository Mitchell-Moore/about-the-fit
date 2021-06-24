<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @extends('shopify-app::layouts.default')

    @section('content')
        <p>Welcom {{ Auth::user()->name }}</p>
    @endsection

    @section('scripts')
        @parent
        <script>
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var titleBarOptions = {
                title: 'Welcome',
            };

            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endsection

    <main>
        <section>
            <div class="card">
                <?php
                    $shop = Auth::user();

                    $product = $shop->api()->rest('GET', '/admin/api/2021-01/products.json', ['limits' => 4]);
                    // $product = $product['body']['container']['prodcuts'];

                    echo print_r($product);

                ?>
            </div>
        </section>
    </main>
</body>
</html>


