<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            text-align: left;
        }

        .container {
            max-width: 100%; /* Ensure the content fits within the page */
            margin: 0 auto; /* Centers the content */
            padding: 20px;
        }

        h1 {
            font-size: 24px; /* Increased font size for the title */
            margin-bottom: 20px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensures the columns are evenly distributed */
            margin-top: 10px;
        }

        th, td {
            padding: 6px 8px; /* Reduced padding for compact table */
            text-align: left;
            border: 1px solid #880000;
            font-size: 12px; /* Smaller font size */
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Optional: Ensure the page content is nicely aligned */
        .page-content {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Data perusahaan : {{ $category->name }}</h1>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Penanggung Perusahaan</th>
                    <th>No. Telepon</th>
                    <th>Alamat Perusahaan</th>
                    <th>Nomor NPWP</th>
                    <th>Nomor NIB</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->penanggung_perusahaan }}</td>
                    <td>{{ $category->no_telp }}</td>
                    <td>{{ $category->alamat_perusahaan }}</td>
                    <td>{{ $category->npwp }}</td>
                    <td>{{ $category->nib }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
