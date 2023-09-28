<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('ui/backend/assets/css') }}/categoryReport.css">
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Sel No.</th>
                    <th>Name</th>
                    <th>Description</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! $category->name !!}</td>
                        <td>{!! $category->description !!}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
