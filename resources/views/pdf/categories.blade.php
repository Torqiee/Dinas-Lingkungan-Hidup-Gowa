<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <style>
        /* Reset styles for consistency */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 10px;
            margin: 0;
        }

        .table-container {
            width: 90%;
            max-width: 1000px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
            margin: 0 auto;
            page-break-inside: avoid; /* Prevent page break inside the table */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px; /* Small font size */
        }

        th, td {
            padding: 6px 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #800008;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Page settings for print */
        @page {
            size: A4 landscape; /* A4 Landscape size */
            margin: 20mm;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }

        /* Signature line below the table, aligned with the right edge of the table */
        .signature-line {
            text-align: center;
            border-top: 2px solid #000; /* Signature line */
            width: 200px;
            padding-top: 5px;
            font-size: 12px;
            margin-top: 100px; /* Increased margin-top for more space */
            margin-left: auto; /* Align right */
            margin-right: 30; /* Align right */
            /* Align the signature line with the right edge of the table */
            position: relative;
            left: 0; /* Align with the table's left side */
        }

        /* Ensure signature line appears after the table */
        @media print {
            /* No page-breaks before or after the table */
            .table-container {
                page-break-inside: avoid;
            }

            /* Signature line should be visible in print */
            .signature-line {
                visibility: visible; /* Make signature line visible when printing */
            }
        }

    </style>
</head>
<body>

    <div class="table-container">
        <h1>Data Perusahaan Telkom Indonesia</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Penanggung Perusahaan</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>NPWP</th>
                    <th>NIB</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->penanggung_perusahaan }}</td>
                        <td>{{ $category->no_telp }}</td>
                        <td>{{ $category->alamat_perusahaan }}</td>
                        <td>{{ $category->npwp }}</td>
                        <td>{{ $category->nib }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Signature Line placed directly under the table -->
    <div class="signature-line"></div>

</body>
</html>
