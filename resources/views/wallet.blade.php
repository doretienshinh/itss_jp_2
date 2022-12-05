<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <style>
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 300px;
          margin: auto;
          text-align: center;
          font-family: arial;
          border: 1px solid black;
          background-color:powderblue;
        }
        tr {
            text-align: left;
            margin: auto;
        }

        p {
            text-align: left;
            margin: auto;
        }

        </style>

</head>
<body>
    <div class="card">
        <h3 style="text-align:center">Product Card</h3>
        <hr>
        <table>
            <tr>
                <td>ウォレット:</td>
                <td>ABC</td>
                <td>口座残高:</td>
                <td>$$$</td>
            </tr>
            <tr>
                <td style="flex-basis:20%; margin-top:-10%">タイプ:</td>
                <td>
                    <div class="select" style="flex-basis: 79%; text-align:left; ">
                        <select>
                            <option value="0">option 1</option>
                        </select>
                    </div>
                </td>

            </tr>
        </table>
        <hr>
        <p>ノート:</p>
        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
    </div>

</body>


